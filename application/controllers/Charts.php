<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 8/31/17
 * Time: 7:18 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Charts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * WHAT:    function to build feeding chart
     * WHY:     Gather data from DB on feeding information for animals and display to users
     * HOW:     Chart requires segment 3 to be populated... currently only options in species tables are accepted
     *          Charts/chart/Bunny,Squirrel,etc... If no valid option is provided no data will be returned.
     * INFO:    Will not display outside of AJAX call from main site!
     */
    public function chart() {
        if ($this->input->is_ajax_request()) {
            $type = $this->uri->segment(3);
            $data['result'] = $this->db->order_by('feeding_weight', 'ASC')->get_where('feeding_charts_view', array('species_name' => $type));
            $this->load->view('charts/feeding_chart_view', $data);
        }
        else { show_404(); }
    }
}
?>