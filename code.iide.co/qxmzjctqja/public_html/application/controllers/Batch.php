<?php
class Batch extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      $this->load->library('ion_auth');
		}

    public function index($id)
    {
      $data['name'] = $this->db->query("SELECT * from classes where id = $id")->result_object()[0]->name;
      $batches = $this->db->query("SELECT users.id as id, users.name as name,count(distinct(exercise_user.exercise)) as count from users LEFT JOIN exercise_user ON users.id = exercise_user.student where users.batch =$id and correct = 1 group by student")->result_object();
      $users = $this->db->query("SELECT users.id as id, users.name as name from users RIGHT JOIN users_groups on users.id = users_groups.user_id where batch = $id and group_id = 2")->result_object();

      foreach($users as $u){
        $u->count = 0;
        foreach($batches as $t){
          if($u->id == $t->id){
            $u->count = $t->count;
          }
        }
      }

      $data['batches'] = $users;
      //var_dump($data);
      $this->load->view('admin/header');
      $this->load->view('batch', $data);
      $this->load->view('admin/footer');
    }

    public function create(){
      $this->load->library('ion_auth');
      if(isset($_POST['submit'])){
        $name = $this->input->post('name');
        $this->load->model('Classes');
        $id = $this->Classes->save(array('name'=>$name));
        redirect(base_url() . 'Batch/create?success=True');
      }
      $header['batch'] = 'active';
      $this->load->view('admin/header',$header);
      $this->load->view('create_batch');
      $this->load->view('admin/footer');
    }

    public function student($id){
      $this->load->library('ion_auth');

      $data['name'] = $this->db->query("SELECT name from users where id = $id")->result_object()[0]->name;

      $x = $this->db->query("SELECT class_user.class as name from class_user LEFT JOIN users on class_user.user = users.id where users.id = $id")->result_object()[0]->name;
      $data['class_name'] = $this->db->query("SELECT * from classes where id = $x")->result_object()[0]->name;

      // AVG TIME FOR Exercises
      $avgs = $this->db->query("SELECT exercises.title, AVG(exercise_time.time)
      FROM `exercise_time`
      RIGHT JOIN exercises
      ON exercise_time.exercise = exercises.id
      where exercise_time.user = $id
      GROUP BY exercises.id")->result_object();

      $data['avgs'] = $avgs;

      //AVG TIME for Student
      $avg = $this->db->query("SELECT AVG(exercise_time.time) as ag FROM `exercise_time` where user = $id")->result_object();

      $data['avg'] = number_format((float)$avg[0]->ag, 2, '.','');

      //TOTAL EXERCISES Completed
      $total = $this->db->query("SELECT COUNT(DISTINCT(exercise)) as total FROM `exercise_user` where student = $id and correct = 1")->result_object();
      $data['total'] = $total[0];

      //Check the Accuracy
      $acc = $this->db->query("SELECT correct, COUNT(*) as cnt FROM `exercise_user` where student = $id GROUP BY correct")->result_object();
      if(isset($acc[0]) and isset($acc[1])){
        $data['acc'] = number_format((float)($acc[0]->cnt/($acc[0]->cnt + $acc[1]->cnt)) * 100, 2, '.', '');

      }
      else{
        $data['acc'] = 0;
      }

      //COURSE WISE EXERCISE DONE:
      $course_wise = $this->db->query("SELECT course,count(DISTINCT(exercise_user.exercise)) as count
      FROM `exercise_user`
      RIGHT OUTER JOIN exercises
      ON exercise_user.exercise = exercises.id
      where course != 0 and (student is null or student = $id)
      GROUP BY exercises.course")->result_object();

      $data['course_wise'] = $course_wise;
      $c_total = $this->db->query("SELECT count(exercises.id) as total from exercises where course != 0 GROUP BY course")->result_object();
      $data['c_total'] = $c_total;

      $this->load->view('admin/header');
      $this->load->view('admin_student', $data);
      $this->load->view('admin/footer');
      //var_dump($course_wise);
    }

  }
