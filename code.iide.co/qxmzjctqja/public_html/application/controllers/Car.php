<?php
class Car extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('cars');
	}
	public function add_view(){
		
		$this->load->view('cars_add');
	}
	public function add(){
		$name = $_GET['name'];
		$cost = $_GET['cost'];
		$avg = $_GET['avg'];
		
		$this->cars->save(['name'=>$name,'cost'=>$cost,'avg'=>$avg]);
		
		//$this->db->query('Insert into slfkjas values($name, $cost, $avg));
		
	}
	
	public function edit($id){
		$name = $_GET['name'];
		$cost = $_GET['cost'];
		$avg = $_GET['avg'];
		
		$this->cars->save(['name'=>$name,'cost'=>$cost,'avg'=>$avg],$id);
		
	}
	
	public function delete($id){
		$this->cars->delete($id);
	}
	
	public function view(){
		
		$data['cars'] = $this->cars->get();
		
		$this->load->view('cars_view', $data);
	}
}