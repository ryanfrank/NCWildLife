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
        //$data['species']    = $this->db->query("SELECT * from species ");
        //$data['ages']       = $this->db->query("SELECT * from ages");
        $data['states']     =   $this->db->get('states');
        $this->load->view('intake_add_good_samaritan', $data);
    }
    public function addSamaritan()
    {
        $data = array(
            'firstName'         =>  $this->input->post('first'),
            'lastName'          =>  $this->input->post('last'),
            'streetAddress'     =>  $this->input->post('street'),
            'cityName'          =>  $this->input->post('city'),
            'stateName'         =>  $this->input->post('state'),
            'zipCode'           =>  $this->input->post('zip'),
            'phoneNumber'       =>  preg_replace('/\D+/','',$this->input->post('phone')),
            'emailAddress'      =>  $this->input->post('email'),
            'reference'         =>  $this->input->post('referral'),
            'donationReceived'  =>  $this->input->post('donation'),
            'donationAmount'    =>  $this->input->post('amount'),
            'emailList'         =>  $this->input->post('emailList')
        );
        $where = array('good_samaritan_first_name' => $data['firstName'], 'good_samaritan_last_name' => $data['lastName']);
        $query = $this->db->get_where('good_samaritan', $where);
        if ( $query->num_rows() == 0 ) {
            /*$myData = array(
                'good_samaritan_first_name'         => $data['firstName'],
                'good_samaritan_last_name'          => $data['lastName'],
                'good_samaritan_street'             => $data['streetName'],
                'good_samaritan_city'               => $data['cityName'],
                'good_samaritan_state'              => $data['stateName'],
                'good_samaritan_zip'                => $data['zipCode'],
                'good_samaritan_phone'              => $data['phoneNumber'],
                'good_samaritan_email'              => $data['emailAddress'],
                'good_samaritan_reference'          => $data['reference'],
                'good_samaritan_donation'           => $data['donationReceived'],
                'good_samaritan_donation_amount'    => $data['donationAmount'],
                'good_samaritan_list'               => $data['emailList']
            );*/
            //$value = $data['firstName'];
            //$sql = "INSERT INTO good_samaritan ('good_samaritan_first_name','good_samaritan_last_name') values ('crap','morecrap')";
            //$sql = $this->db->set($myData)->get_compiled_insert('good_samaritan');

            //$this->db->insert('good_samaritan', $myData);
            //$newQuery = $data['firstName'] . "," . $data['lastName'] . "," . $data['streetAddress'] . "," . $data['cityName'] . ","
            //    . $data['stateName'] . "," . $data['zipCode'] . "," . $data['phoneNumber'] . "," . $data['emailAddress'] . "," .
            //    $data['donationReceived'] . "," . $data['donationAmount'] . "," . $data['reference'] . "," . $data['emailList'];
            //$num_inserts = $this->db->affected_rows();
            //if ($num_inserts > 0 ) { $result = "success"; }
            //else { $result = "failure"; }
            $result = "success";
        }
        else {
            $result = "failure";
        }
        echo json_encode($result);
    }
}
?>