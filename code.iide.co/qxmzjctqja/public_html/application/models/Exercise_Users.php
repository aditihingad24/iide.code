<?php
class Exercise_Users extends MY_Model
{
    protected $_table_name = 'exercise_user';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    public $rules = array();

}
