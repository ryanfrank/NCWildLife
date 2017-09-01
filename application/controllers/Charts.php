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

    public function squirrelChart()
    {
        $data['result'] = $this->db->order_by('feeding_weight', 'ASC')->get_where('feeding_charts_view', array('species_name' => 'Squirrel') );
        $this->load->view('charts/feeding_chart_view', $data);
    }

    public function opossumChart()
    {
        $data['result'] = $this->db->order_by('feeding_weight', 'ASC')->get_where('feeding_charts_view', array('species_name' => 'Opossum') );
        $this->load->view('charts/feeding_chart_view', $data);
    }

    public function bunnyChart()
    {
        $data['result'] = $this->db->order_by('feeding_weight', 'ASC')->get_where('feeding_charts_view', array('species_name' => 'Bunny') );
        $this->load->view('charts/feeding_chart_view', $data);
    }

}
?>