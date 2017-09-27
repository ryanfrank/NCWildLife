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