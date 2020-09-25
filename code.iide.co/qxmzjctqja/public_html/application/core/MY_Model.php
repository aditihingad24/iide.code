<?php
class MY_Model extends CI_Model
{
    protected $_table_name = '';
    protected $_primary_key = '';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    public $rules = array();
    protected $_timestamp = '';

    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
    }

	//$events = $this->Events->get(1,TRUE);
    public function get($id = NULL, $single = FALSE)
    {
        if ($id != NULL) {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->where($this->_primary_key, $id);
            $method = 'row';
        } elseif ($single == TRUE) {
            $method = 'row';
        } else {
            $method = 'result';
        }
        return $this->db->get($this->_table_name)->$method();
    }

    public function sort($order_by,$ad){
        $this->db->order_by($order_by,$ad);
        return $this->get(NULL,NULL);
    }
    public function get_by($where, $single){
        $this->db->where($where);
        return $this->get(NULL, $single);
    }

    public function save($data, $id = NULL){
        if($id == NULL){
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $id = $this->db->insert_id();
        }else{
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->_primary_key,$id);
            $this->db->update($this->_table_name);
        }
        return $id;
    }

    public function delete($id){
        $filter = $this->_primary_filter;
        $id = $filter($id);
        $this->db->where($this->_primary_key,$id);
        $this->db->limit(1);
        $this->db->delete($this->_table_name);
    }

    function getDatetimeNow() {
        $tz_object = new DateTimeZone('Asia/Kolkata');
        //date_default_timezone_set('Brazil/East');

        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y\-m\-d\ h:i:s');
    }
}