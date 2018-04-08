<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 8/31/17
 * Time: 7:18 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class Forum extends CI_Controller
{
    public function __construct()
    {
    parent::__construct();
    }
    public function index()
    {
    $data['forum'] =  base_url('forum/index.php');
    $this->load->view('forum_view', $data);
    }
}