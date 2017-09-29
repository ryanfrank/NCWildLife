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
        if ($this->input->is_ajax_request()) {
            $type = $this->uri->segment(3);
            $this->load->view($type . '/' . $type . '_calendar');
        }
        else { show_404(); }
    }
    public function calendar() {
        if ($this->input->is_ajax_request()) {
            $myArray = array();
            $this->load->model('Calendar');
            $type = $this->uri->segment(3);
            $result = $this->Calendar->get_calendar_events($type);
            echo $result;
        }
        else { show_404(); }
    }
    public function calendarEntry() {
        if ($this->input->is_ajax_request()) {
            $this->load->view('volunteer/volunteer_calendar_update');
        }
        else { show_404(); }
    }
    public function addCalendarEvent(){
        if ($this->input->is_ajax_request()) {
            $this->load->model('Calendar');
            $data = array(
                'title' => $this->input->post('eventTitle'),
                'allDay' => $this->input->post('allDayEvent'),
                'start' => $this->input->post('startDate'),
                'end' => $this->input->post('endDate')
            );
            $result = $this->Calendar->add_calendar_event('Volunteer', $data);

            echo $result;
        }
        else { show_404(); }
    }
    public function calendarRegistration(){
        if ($this->input->is_ajax_request()) {
            $this->load->model('Calendar');
            $curDate = date("Y-m-d H:i");
            $query = $this->Calendar->get_calendar_events('Volunteer', $curDate, $JSON = false);
            $data['date'] = $curDate;
            $data['user'] = $this->ion_auth->user()->row();
            $data['result'] = $query;
            $this->load->view('volunteer/volunteer_calendar_registration', $data);
        }
        else { show_404(); }
    }
    public function updateCalendarEvent() {
        if ($this->input->is_ajax_request()) {
            $this->load->model('Calendar');
            $userID = $this->input->post('userID');
            $user = $this->ion_auth->user($userID)->row();
            $rehabberInfo = $this->db->get_where('rehabber', array('rehabber_email' => $user->email))->row();
            $data = array(
                'calendar_event' => $this->input->post('event'),
                'volunteer' => $rehabberInfo->rehabber_id
            );
            $result = $this->Calendar->update_calendar_registration($data);

            echo $result;
        }
        else { show_404(); }
    }


}
?>