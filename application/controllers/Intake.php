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
        //$data['states']     = $this->db->query("SELECT * from states");
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
            'phoneNumber'       =>  $this->input->post('phone'),
            'emailAddress'      =>  $this->input->post('email'),
            'donationReceived'  =>  $this->input->post('donation'),
            'donationAmount'    =>  $this->input->post('amount'),
            'reference'         =>  $this->input->post('referral'),
            'emailList'         =>  $this->input->post('emailList')
        );
        $phone = $data['phoneNumber'];
        $data['phoneNumber'] = preg_replace("/[^0-9]/", $phone);

        $where = array('good_samaritan_first_name' => $data['firstName'], 'good_samaritan_last_name' => $data['lastName']);
        $query = $this->db->get_where('good_samaritan', $where);
        if ( $query->num_rows() == 0 ) {
            //$this->db->insert('good_samaritan', $data);
            $newQuery = $data['firstName'] . "," . $data['lastName'] . "," . $data['streetAddress'] . "," . $data['cityName'] . ","
                . $data['stateName'] . "," . $data['zipCode'] . "," . $data['phoneNumber'] . "," . $data['emailAddress'] . "," .
                $data['donationReceived'] . "," . $data['donationAmount'] . "," . $data['reference'] . "," . $data['emailList'];
            // $num_inserts = $this->db->affected_rows();
            //if ($num_inserts > 0 ) { $result = "success"; }
            //else { $result = "failure"; }
            $result = $newQuery;
        }
        else {
            $result = "failure";
        }

        echo json_encode($result);
    }
}
?>