<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 9/28/17
 * Time: 5:26 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends CI_Controller
{
    /**
     * WHAT:    Function to display initial donation page
     * WHY:     To display the view associated with donations providing users the ability to donate
     * HOW:     Call Information controller with element donations e.g. base_url/Information/donations
     */
    public function donations(){
        if ($this->input->is_ajax_request()) {
            $this->load->view('information/donation_view');
        }
    }

}
?>