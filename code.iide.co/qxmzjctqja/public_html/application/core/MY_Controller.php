<?php

/**
 * Created by PhpStorm.
 * User: sudan
 * Date: 17-08-2017
 * Time: 17:58
 */
class MY_Controller extends CI_Controller
{
    protected $id;
    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->id = $this->ion_auth->user()->row()->id;
    }
    function getDatetimeNow() {
        $tz_object = new DateTimeZone('Asia/Kolkata');
        //date_default_timezone_set('Brazil/East');

        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y\-m\-d\ h:i:s');
    }
}

class User_Controller extends MY_Controller
{

protected $id;
    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        if(!$this->ion_auth->in_group(3)){
            redirect(base_url() . 'index.php/Alumni');
        }

        $this->id = $this->ion_auth->user()->row()->id;

    }
}