<?php
class Courses extends MY_Model
{
    protected $_table_name = 'courses';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    public $rules = array();

}
