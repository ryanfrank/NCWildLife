<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 8/29/17
 * Time: 6:38 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function register_user(){
        $this->load->view('modal/register_user');
    }
    public function login_user(){
        $this->load->view('modal/login_user');
    }

}
?>