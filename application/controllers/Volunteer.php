<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 9/4/17
 * Time: 11:24 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Volunteer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function schedule(){
        $this->load->view('volunteer/volunteer_calendar');
    }
    public function getCalendar() {
        $query = $this->db->get('volunteer_schedule');
        $result = $query->result_array();
        $json = json_encode($result);
        $json = str_replace('"allDay":"0"', '"allDay":false', $json);
        $json = str_replace('"allDay":"1"', '"allDay":true', $json);
        echo $json;
    }


}
?>