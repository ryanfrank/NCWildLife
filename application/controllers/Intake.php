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
        $data['states']     =   $this->db->get('states');
        $this->load->view('intake_add_good_samaritan', $data);
    }
    public function addSamaritan()
    {
        $formData = array(
            'good_samaritan_first_name'         => $this->input->post('first'),
            'good_samaritan_last_name'          => $this->input->post('last'),
            'good_samaritan_street'             => $this->input->post('street'),
            'good_samaritan_city'               => $this->input->post('city'),
            'good_samaritan_state'              => $this->input->post('state'),
            'good_samaritan_zip'                => $this->input->post('zip'),
            'good_samaritan_phone'              => preg_replace('/\D+/','',$this->input->post('phone')),
            'good_samaritan_email'              => $this->input->post('email'),
            'good_samaritan_reference'          => $this->input->post('referral'),
            'good_samaritan_donation'           => $this->input->post('donation'),
            'good_samaritan_donation_amount'    => $this->input->post('amount'),
            'good_samaritan_list'               => $this->input->post('emailList'),
            'created_date'                      => date("Y-m-d H:i:s")
        );
        $where = array('good_samaritan_first_name' => $formData['good_samaritan_first_name'], 'good_samaritan_last_name' => $formData['good_samaritan_last_name']);
        $query = $this->db->get_where('good_samaritan', $where);
        if ( $query->num_rows() == 0 ) {

            $sql = $this->db->set($formData)->get_compiled_insert('good_samaritan');

            //$this->db->insert('good_samaritan', $formData);
            //$newQuery = $data['firstName'] . "," . $data['lastName'] . "," . $data['streetAddress'] . "," . $data['cityName'] . ","
            //    . $data['stateName'] . "," . $data['zipCode'] . "," . $data['phoneNumber'] . "," . $data['emailAddress'] . "," .
            //    $data['donationReceived'] . "," . $data['donationAmount'] . "," . $data['reference'] . "," . $data['emailList'];
            //$num_inserts = $this->db->affected_rows();
            //if ($num_inserts > 0 ) { $result = "success"; }
            //else { $result = "failure"; }
            //$result = "success";
            $result = $sql;
        }
        else {
            $result = "failure";
        }
        echo json_encode($result);
    }
}
?>