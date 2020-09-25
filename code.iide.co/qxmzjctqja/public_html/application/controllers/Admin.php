<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      $this->load->library('ion_auth');
		}

    public function index()
    {

      $id = $this->ion_auth->user()->row()->id;

      //total number of Students
      if($this->ion_auth->in_group(1)){
        $data['classes'] = $this->db->query("SELECT classes.id,classes.name,count(class_user.user) as cnt from class_user LEFT JOIN classes on class_user.class = classes.id where class_user.type = 2 GROUP by classes.id ")->result_object();
        $data['no_of_students'] = count($this->db->query("SELECT * from users_groups where group_id = 2")->result_object());

      }else{
        $teacher_classes = $this->db->query("SELECT DISTINCT(class) as cls from class_user where user = $id")->result_object();
        $x = '';
        $p = 1;
        foreach($teacher_classes as $t){
          if($p == count($teacher_classes)){
            $x = $t->cls;
          }else{
            $x = $t->cls . ',';
          }
          $p = $p + 1;
        }
        //x --> number of classes that teacher manages
        $data['classes'] = $this->db->query("SELECT classes.id,classes.name,count(class_user.user) as cnt from class_user LEFT JOIN classes on class_user.class = classes.id where class_user.type = 2 and class_user.class IN ($x) GROUP by classes.id ")->result_object();
        $data['no_of_students'] = count($this->db->query("SELECT * from class_user where class IN ($x) and type = 2")->result_object());
      }


      //total exercises Completed


      //total classes
      //$this->load->model('Classes');
      //$data['no_of_classes'] = count($this->Classes->get());

$header['home'] = 'yes';
      $this->load->view('admin/header', $header);
      $this->load->view('admin_home', $data);
      $this->load->view('admin/footer');
    }

    public function accounts(){
      if($this->ion_auth->in_group(1)){
      $this->load->model('Classes');
      $data['classes'] = $this->Classes->get();
      $header['accounts'] = 'active';
      $this->load->view('admin/header', $header);
      $this->load->view('accounts', $data);
      $this->load->view('admin/footer');
    }
    }

    public function batch($batch){

      $data['batches'] = $this->db->query("SELECT users.name as name,count(DISTINCT(exercise)) as count from users LEFT JOIN exercise_user ON users.id = exercise_user.student where batch =$batch and correct = 1 group by exercise_user.student")->result_object();
      //var_dump($data);
      $header['batch'] = 'active';
      $this->load->view('admin/header', $header);
      $this->load->view('batch', $data);
      $this->load->view('admin/footer');

    }



    public function class(){
      if($this->ion_auth->in_group(2)){
      $this->load->model('Classes');
      $data['classes'] = $this->Classes->get();
      $this->load->view('classes', $data);
    }
    }

    public function add_class(){

    }



}
