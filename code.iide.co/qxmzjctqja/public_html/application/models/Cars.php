<?php
class Cars extends MY_Model
{
    protected $_table_name = 'cars';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    public $rules = array();
	
}