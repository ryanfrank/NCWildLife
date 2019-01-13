<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 9/29/17
 * Time: 3:53 PM
 */

class Users extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
    public function get($dbSelect, $dbWhere = FALSE) {
        if ( $dbSelect != NULL ) {
            $this->db->select($dbSelect);
        }
        $this->db->from('users');
        if ( $dbWhere != FALSE ) {
            foreach ( $dbWhere as $element => $value ){
                $this->db->where("$element", $value);
            }
        }
        $result = $this->db->get();

        return $result;
    }
    public function updateUser() {

    }
    public function deleteUser() {

    }
    public function get_user_groups($id) {

    }
}
?>