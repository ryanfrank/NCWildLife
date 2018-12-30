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
    public function get( $dbSelect, $dbTable, $dbWhere = FALSE){
        if ( $dbSelect != NULL ) {
            $this->db->select($dbSelect);
        }
        if ($dbTable != NULL ) {
            $this->db->from($dbTable);
        }
        if ( $dbWhere != FALSE ) {
            foreach ( $dbWhere as $element => $value ){
                $this->db->where("$element", $value);
            }
        }
        $result = $this->db->get();

        return $result;
    }
    public function update() {

    }
    public function delete() {

    }

}
?>