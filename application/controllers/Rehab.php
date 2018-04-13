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
        $dbOptions = array("orderBy" => "rehabber_county");
        $data['rehabbers'] = $this->Rehabber->get($dbOptions, $JSON=FALSE);

        foreach ( $data['rehabbers']->result() as $rehabber )
        {
            $rehabber->rehabber_name = "$rehabber->rehabber_first_name $rehabber->rehabber_last_name";
            if ( $rehabber->rehabber_active == '1') { $rehabber->rehabber_active = "Yes"; }  else { $rehabber->rehabber_active = "No"; }
            if ($rehabber->rehabber_license == '0') { $rehabber->rehabber_license = "No"; } else { $rehabber->rehabber_license = "Yes"; }
            if ( $rehabber->rehabber_zip == '0' ) { $rehabber->rehabber_zip = "Unknown"; }
            if (strlen($rehabber->rehabber_phone) == '10' ) { $rehabber->rehabber_phone = '('.substr($rehabber->rehabber_phone,0,3).') ' . substr($rehabber->rehabber_phone,3,3) . '-' . substr($rehabber->rehabber_phone,6,4); }
        }

        $this->load->view('volunteer/find_rehabber_view', $data);
    }
    public function generalRehabber() {
        $dbOptions = array( "orderBy" => "rehabber_county", "where"=>"rehabber_active,1" );
        $data['rehabbers'] = $this->Rehabber->get($dbOptions, $JSON=FALSE);

        foreach ( $data['rehabbers']->result() as $rehabber )
        {
            $rehabber->rehabber_name = "$rehabber->rehabber_first_name $rehabber->rehabber_last_name";
            if ( $rehabber->rehabber_active == '1') { $rehabber->rehabber_active = "Yes"; }  else { $rehabber->rehabber_active = "No"; }
            if ($rehabber->rehabber_license == '0') { $rehabber->rehabber_license = "No"; } else { $rehabber->rehabber_license = "Yes"; }
            if ( $rehabber->rehabber_zip == '0' ) { $rehabber->rehabber_zip = "Unknown"; }
            if (strlen($rehabber->rehabber_phone) == '10' ) { $rehabber->rehabber_phone = '('.substr($rehabber->rehabber_phone,0,3).') ' . substr($rehabber->rehabber_phone,3,3) . '-' . substr($rehabber->rehabber_phone,6,4); }
        }

        $this->load->view('volunteer/find_rehabber_view', $data);
    }
}
?>