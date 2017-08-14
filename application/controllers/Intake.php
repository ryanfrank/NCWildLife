<?php
/**
 * Created by PhpStorm.
 * User: ryan_w_frank
 * Date: 8/13/17
 * Time: 10:51 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Intake extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('intake_main');
    }
    public function add_good_samaritan()
    {
        $data['species']    = $this->db->query("SELECT * from species ");
        $data['ages']       = $this->db->query("SELECT * from ages");
        $data['states']     = $this->db->query("SELECT * from states");
        $this->load->view('intake_add_good_samaritan', $data);
    }
    public function addSamaritan()
    {
        //$data = array(
        //    'firstName' => $this->input->post('first'),
        //    'lastName'  => $this->input->post('last')
        //);
        //"first": $("input#firstName").val(),
        //"last": $("input#lastName").val(),
        //"street": $("input#streetAddress").val(),
        //"city": $("input#cityName").val(),
        //"state": $("input#stateName").val(),
        //"zip": $("input#zipCode").val(),
        //"email": $("input#emailAddress").val(),
        //"phone": $("input#phoneNumber").val(),
        //"donation": $("input#donationReceived").val(),
        //"amount": $("input#donationAmount").val(),
        //"emailList": $("input#emailList").val()

        $data = array(
            'firstName' => $this->input->post('first'),
            'lastName'  => $this->input->post('last'),
            'streetAddress' => $this->input->post('street'),
            'cityName'      => $this->input->post('city'),
            'stateName'     => $this->input->post('state'),
            'zipCode'       =>  $this->input->post('zipCode'),
            'emailAddress'  =>  $this->input->post('email'),
            'phoneNumber'   =>  $this->input->post('phone'),
            'donationReceived'  =>  $this->input->post('donation'),
            'donationAmount'    =>  $this->input->post('amount'),
            'emailList'         =>  $this->input->post('emailList')
        );

        $count = $data['emailList'];
        echo json_encode($count);
    }
}
?>