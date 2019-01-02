<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 2018-12-29
 * Time: 20:19
 */
class Vendor extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
    public function create ( $JSON = true )
    {

    }
    public function get( $dbSelect, $dbTable, $dbJoin = FALSE, $dbWhere = FALSE ){
        if ( $dbSelect != NULL ) {
            $this->db->select($dbSelect);
        }
        if ($dbTable != NULL ) {
            $this->db->from($dbTable);
        }
        if ( $dbJoin != FALSE ){
            foreach ( $dbJoin as $column => $value ){
                $this->db->join("$column", $value);
            }
        }
        if ( $dbWhere != FALSE ) {
            foreach ( $dbWhere as $element => $value ){
                $this->db->where("$element", $value);
            }
        }
        $result = $this->db->get();

        return $result;
    }
    public function update($dbTable, $dbData, $dbWhere) {
        if ( $dbWhere != FALSE ) {
            foreach ( $dbWhere as $element => $value ){
                $this->db->where("$element", $value);
            }
        }
        $this->db->update($dbTable, $dbData);
        // echo $this->db->last_query(); // used for debug  - shows last query executed
        if ( $this->db->affected_rows() > 0) {
            return "success";
        }
        else {
            return "error";
        }

    }
    public function delete($dbTable, $dbWhere) {
        if ( $dbWhere != FALSE ) {
            foreach ( $dbWhere as $element => $value ){
                $this->db->where("$element", $value);
            }
        }
        $this->db->delete($dbTable);
        //echo $this->db->last_query(); // used for debug  - shows last query executed
        if ( $this->db->affected_rows() > 0) {
            return "success";
        }
        else {
            return "error";
        }
    }
    public function insert($dbData, $dbTable) {
        $this->db->insert($dbTable, $dbData);
        //echo $this->db->last_query(); // used for debug  - shows last query executed
        if ( $this->db->affected_rows() > 0) {
            return "success";
        }
        else {
            return "error";
        }
    }
}
?>