<?php
class User extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
      $this->load->library('ion_auth');
		}

    public function index()
    {
      $this->load->view('home');
    }

    public function login(){
      $this->load->library('ion_auth');
      $username = $this->input->post("username");
      $password = $this->input->post("password");

      if($this->ion_auth->login($username, $password, FALSE)){
        if($this->ion_auth->in_group(2)){
          redirect(base_url() . 'Exercise/curriculum');
        }else{
          redirect(base_url() . 'Admin/');
        }

      }else{
        redirect(base_url() . 'User?error=True');
      }
    }

    public function register(){
      $this->load->library('ion_auth');
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $name = $this->input->post('name');
      $role = $this->input->post('role');
      $class = $this->input->post('batch');
      //var_dump($role);
//echo $this->ion_auth->register("", $password, $email, array(), $role)
$id = $this->ion_auth->register("", $password, $email, array("name"=>$name), array($role));
      if($id){
          $data = array("user"=>$id, "class"=>$class, "type"=> $role);
          $this->load->model('Class_Users');
          $this->Class_Users->save($data);
          redirect(base_url() . 'Admin/accounts?success=true');
      }else{
        redirect(base_url() . 'Admin/accounts?error=True');
      }
    }

    public function logout(){
      $this->ion_auth->logout();
      redirect(base_url() . 'User');
    }

    public function log(){
      $time = $this->input->post('timeSpent');
      $ex = $this->input->post('ex');

      $this->load->model('Exercise_Time');
      $this->Exercise_Time->save(array('user'=> 1, 'time'=>$time, 'exercise'=>$ex), NULL);
      echo($time);
    }

    public function design_test($id){


      $data['ex_id']= $id;
      $data['student'] = $this->ion_auth->user()->row()->id;
      $this->load->model('Exercises');
      $data['exercise'] = $this->Exercises->get_by(array('id'=>$id), TRUE);
      $data['id'] = $data['exercise']->course;
      $xp = $this->db->query("SELECT count(DISTINCT(exercise)) as xp from exercise_user where student = 5")->result_object();
      $data['xp']= $xp[0]->xp;
      $this->load->view('test', $data);
    }

    public function profile(){
      //name
      $user = $this->ion_auth->user()->row();
      $data['name'] = $user->name;
      $data['xp'] = $this->exercises_completed($user->id);

      $this->load->view('profile', $data);
    }
    private function exercises_completed($s_id){
      $count = $this->db->query("SELECT COUNT(DISTINCT(exercise)) as cnt from exercise_user where student = $s_id")->result_object();
      return $count[0]->cnt;
    }

    private function course_wise($s_id){
      $count = $this->db->query("select courses.name, COUNT(courses.id) as cnt from exercise_user LEFT JOIN exercises ON exercise_user.exercise = exercises.id LEFT JOIN courses ON exercises.course = courses.id where exercise_user.student = $s_id GROUP BY courses.name ")->result_object();
      return $count;
    }

    private function day_wise($s_id){
      $count = $this->db->query("select DATE(time), Count(exercise_user.exercise) from exercise_user where exercise_user.student = $s_id GROUP BY DATE(exercise_user.time)")->result_object();
      var_dump($count);
    }



}
