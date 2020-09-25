<?php
class Course extends CI_Controller
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

    public function index()
    {
      $this->load->model('Courses');
      $data['courses'] = $this->Courses->get();

      $this->load->view('courses',$data);
    }



}
