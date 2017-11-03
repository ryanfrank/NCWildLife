<?php
/**
 * Created by PhpStorm.
 * User: ryan_w_frank
 * Date: 8/12/17
 * Time: 7:07 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Rehab extends CI_Controller {

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
        $this->load->view('rehab_main');
    }
    public function locateRehabber() {
        $data['states'] = $this->db->order_by('state_abbr', 'ASC')->select('state_abbr,state_name')->get('states');
        $data['rehabbers'] = $this->db->order_by('rehabber_state', 'ASC')->get_where('rehabber_view', array('rehabber_active' => '1'));
        $this->load->view('volunteer/find_rehabber_view', $data);
    }
}
?>