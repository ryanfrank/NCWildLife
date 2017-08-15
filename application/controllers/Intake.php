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
    public function add_good_samaritan()
    {
        $data['states']     =   $this->db->get('states');
        $this->load->view('intake_add_good_samaritan', $data);
    }
    public function addSamaritan()
    {
        $date = date("Y-m-d H:i:s");
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
            'created_date'                      => $date
        );
        $where = array('good_samaritan_first_name' => $formData['good_samaritan_first_name'], 'good_samaritan_last_name' => $formData['good_samaritan_last_name']);
        $query = $this->db->get_where('good_samaritan', $where);
        if ( $query->num_rows() == 0 ) {
            //$sql = $this->db->set($formData)->get_compiled_insert('good_samaritan');
            $this->db->insert('good_samaritan', $formData);
            $num_inserts = $this->db->affected_rows();
            if ($num_inserts > 0 ) { $result = "success"; }
            else { $result = "failure"; }
        }
        else {
            $result = "duplicate";
        }
        echo json_encode($result);
    }
    public function intake_animal()
    {
        $data['date']       =   date("Y-m-d");
        $data['ages']       =   $this->db->get('ages');
        $data['species']    =   $this->db->get('species');
        $data['rehabber']   =   $this->db->get('rehabber');
        $this->load->view('intake_animal', $data);
    }
    public function intakeAnimal()
    {
        $results = "";
        $date = date("Y-m-d H:i:s");
        $formData = array(
            'intake_date'           => $this->input->post('intakeDate'),
            'intake_weight'         => $this->input->post('intakeWeight'),
            'intake_condition'      => $this->input->post('intakeCondition'),
            'intake_age'            => $this->input->post('intakeAge'),
            'intake_rehabber'       => $this->input->post('intakeRehabber'),
            'intake_injury'         => $this->input->post('intakeInjured'),
            'intake_injury_type'    => $this->input->post('injuryInfo'),
            'intake_fed'            => $this->input->post('isFed'),
            'intake_food_type'      => $this->input->post('foodInfo'),
            'intake_food_delivery'  => $this->input->post('foodDelivery'),
            'intake_species'        => $this->input->post('intakeSpecies'),
            'created_date'          => $date
        );
        $animalData = array('animal_name' => $this->input->post('animalName'));

        $where = array('animal_name' => $animalData['animal_name']);
        $query = $this->db->get_where('animal', $where);
        if ( $query->num_rows() == 0 ) {
            $results = "I did not find an animal match";
            /*$this->db->insert('animal', $animalData);
            $aData = $this->db->get_where('animal', $where);
            $aID = $aData->row_array();
            if ( isset($aID) ){
                $formData['animal_id'] = $aID['animal_id'];
                $this->db->insert('intake', $formData);
                $sql = $this->db->set($formData)->get_compiled_insert('intake');
                $num_inserts = $this->db->affected_rows();
                if ( $num_inserts > 0 ){
                    $results = "success";
                }
                else { $results = "failure"; }
            }
            else { $results = "failure"; }
            $results = "success";*/
        }
        else { $results = "success"; }

        echo json_encode($results);
    }
}
?>