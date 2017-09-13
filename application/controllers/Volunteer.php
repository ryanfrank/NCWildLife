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
        $myArray = array();
        $query = $this->db->get('schedule_assignment')->result_array();
        foreach ( $query as $row ){
            if ( is_null($row['description']) ){
                $row['backgroundColor'] = "green";
                $row['description'] = "Available";
            }
            array_push($myArray, $row);
        }
        $json = json_encode($myArray);
        $json = str_replace('"allDay":"0"', '"allDay":false', $json);
        $json = str_replace('"allDay":"1"', '"allDay":true', $json);
        echo $json;
    }
    public function calendarEntry() {
        $this->load->view('volunteer/volunteer_calendar_update');
    }
    public function addCalendarEvent(){
        $data = array(
            'title' => $this->input->post('eventTitle'),
            'allDay' => $this->input->post('allDayEvent'),
            'start'     =>  $this->input->post('startDate'),
            'end'       =>  $this->input->post('endDate')
        );
        if ( $this->db->insert('volunteer_schedule',$data) ){
            $result = "success";
        }
        else {
            $result = "failure";
        }
        echo json_encode($result);
    }
    public function calendarRegistration(){
        $curDate =  date("Y-m-d H:i");
        $query = $this->db->get_where('volunteer_schedule', array('start >=' . $curDate));
        $data['user'] = $this->ion_auth->user()->row();
        $data['result'] = $query->result_array();
        $this->load->view('volunteer/volunteer_calendar_registration', $data);
    }


}
?>