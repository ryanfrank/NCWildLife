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
    public function createUser(){
        if ($this->input->is_ajax_request()) {
            if ($this->input->post('email')) {
                $formData = array(
                    'first_name' => $this->input->post('first'),
                    'last_name' => $this->input->post('last'),
                    'user_name' => $this->input->post('user'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password')
                );
                $additional_data = array(
                    'first_name' => $formData['first_name'],
                    'last_name' => $formData['last_name'],
                    'active' => 1
                );
                $group = array('2');
                if ($this->ion_auth->register($formData['user_name'], $formData['password'], $formData['email'], $additional_data, $group) != FALSE) {
                    $results = "success";
                } else {
                    $results = "failure";
                }
                echo json_encode($results);
            }
        }
        else {
            show_404();
        }
    }
    public function loginUser()
    {
        if ($this->input->is_ajax_request()) {
            if ($this->input->post('login')) {
                $formData = array(
                    'login' => $this->input->post('login'),
                    'password' => $this->input->post('password')
                );
                $remember = TRUE; // remember the user
                if ($this->ion_auth->login($formData['login'], $formData['password'], $remember)) {
                    $results = "success";
                } else {
                    if ($this->ion_auth->is_max_login_attempts_exceeded($formData['login'])) {
                        $results = "tooManyFailed";
                    } else {
                        $results = "failure";
                    }
                }
                echo json_encode($results);
            }
        }
        else {
            show_404();
        }
    }
    public function logoutUser() {
        $this->ion_auth->logout();
        redirect(base_url(), 'refresh');
    }
}
?>