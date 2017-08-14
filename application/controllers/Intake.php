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
    public function add()
    {
        $data['species']    = $this->db->query("SELECT * from species ");
        $data['ages']       = $this->db->query("SELECT * from ages");
        $data['states']       = $this->db->query("SELECT * from states");
        $this->load->view('intake_add', $data);
    }
    public function addSamaritan()
    {
        //$data = array(
        //    'firstName' => $this->input->post('first'),
        //    'lastName'  => $this->input->post('last')
        //);

        $first = $this->input->post('first');
        return json_encode($first);
    }
}