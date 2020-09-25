<?php
class Exercise extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      $this->load->library('ion_auth');
      if(!$this->ion_auth->logged_in())
      {
          redirect(base_url() . 'User');
      }
		}

    public function index($id)
    {
      if($this->ion_auth->in_group(2)){
      $data['ex_id']= $id;
      $data['student'] = $this->ion_auth->user()->row()->id;
      $uid = $data['student'];
      $this->load->model('Exercises');
      $data['exercise'] = $this->Exercises->get_by(array('id'=>$id), TRUE);
      $data['id'] = $data['exercise']->course;
      $xp = $this->db->query("SELECT count(DISTINCT(exercise)) as xp from exercise_user where student = $uid and correct = 1")->result_object();
      $data['xp']= $xp[0]->xp;
      $this->load->view('exercises', $data);
    }
    }

    public function curriculum(){
      if($this->ion_auth->in_group(2)){
      $uid = $this->ion_auth->user()->row()->id;
      $xp = $this->db->query("SELECT count(DISTINCT(exercise)) as xp from exercise_user where student = $uid and correct = 1")->result_object();
      $header['xp']= $xp[0];


      $count = $this->db->query("SELECT course FROM `exercise_user` RIGHT JOIN exercises ON exercise_user.exercise = exercises.id where course != 0 GROUP BY exercises.course")->result_object();
      $correct = $this->db->query("SELECT course,count(DISTINCT(exercise)) as count FROM `exercise_user` RIGHT JOIN exercises ON exercise_user.exercise = exercises.id where course != 0 and student = $uid and correct= 1 GROUP BY exercises.course")->result_object();

        foreach($count as $cn){
          $cn->count = 0;
          foreach($correct as $cr){
          if($cr->course == $cn->course){
            $cn->count = $cr->count;
          }
        }
      }
      $data['count'] = $count;


      $data['courses'] = ['HTML5', 'fab fa-html5', 'CSS3', 'fab fa-css3', 'DESIGN', 'fa fa-pencil-alt', 'BOOTSTRAP',''];
      //total
      $total = $this->db->query("SELECT count(exercises.id) as total from exercises where course != 0 GROUP BY course")->result_object();
      $data['total'] = $total;
      $this->load->view('student/header', $header);
      $this->load->view('curriculum', $data);
      $this->load->view('student/footer');
    }
    }

    public function list($c_id){
      $this->load->model('Exercises');
        $uid = $this->ion_auth->user()->row()->id;
      $exercises = $this->db->query("SELECT exercises.title, exercises.id
        FROM `exercise_user`
        RIGHT JOIN exercises
        on exercise_user.exercise = exercises.id
        where course = $c_id
        GROUP BY exercises.id")->result_object();

        $done = $this->db->query("SELECT exercise,count(*) FROM `exercise_user` where correct = 1 and student = $uid GROUP by exercise")->result_object();

        foreach($exercises as $e){
          foreach($done as $d){
            if($e->id == $d->exercise){
              $e->count = 1;
            }
          }
        }


      echo json_encode($exercises);
    }

    public function submit($exercise, $user, $correct){
      $this->load->model('Exercise_Users');
      $this->Exercise_Users->save(array('exercise'=>$exercise, 'student'=>$user, 'correct'=>$correct));
      echo 'Yes';
    }

    public function get_html(){
      $html = $this->input->post('html');

      
    }


}
