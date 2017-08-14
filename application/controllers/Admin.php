<?php
/**
 * Created by PhpStorm.
 * User: ryan_w_frank
 * Date: 8/14/17
 * Time: 4:29 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
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
    public function add_rehabber()
    {
        $data['states']     =   $this->db->get('states');
        $this->load->view('admin_add_rehabber', $data);
    }
    public function addRehabber()
    {
        $date = date("Y-m-d H:i:s");
        $formData = array(
            'rehabber_first_name'   => $this->input->post('first'),
            'rehabber_last_name'    => $this->input->post('last'),
            'rehabber_street'       => $this->input->post('street'),
            'rehabber_city'         => $this->input->post('city'),
            'rehabber_state'        => $this->input->post('state'),
            'rehabber_zip'          => $this->input->post('zip'),
            'rehabber_phone'        => preg_replace('/\D+/','',$this->input->post('phone')),
            'rehabber_email'        => $this->input->post('email'),
            'rehabber_license'      => $this->input->post('isLicensed'),
            'created_date'          => $date
        );
        $where = array('rehabber_first_name' => $formData['rehabber_first_name'], 'rehabber_last_name' => $formData['rehabber_last_name']);
        $query = $this->db->get_where('rehabber', $where);
        if ( $query->num_rows() == 0 ) {
            //$sql = $this->db->set($formData)->get_compiled_insert('rehabber');
            $this->db->insert('rehabber', $formData);
            $num_inserts = $this->db->affected_rows();
            if ($num_inserts > 0 ) { $result = "success"; }
            else { $result = "failure"; }
        }
        else {
            $result = "duplicate";
        }
        echo json_encode($result);
    }
}
?>