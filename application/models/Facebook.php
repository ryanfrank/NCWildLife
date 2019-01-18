<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 2019-01-17
 * Time: 21:32
 */

class Facebook extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->table = "facebook_info";
    }
    public function getFacebookId(){
        $result = $this->db->get($this->table)->row();

        return $result;
    }
}
?>