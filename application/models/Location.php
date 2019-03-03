<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 2018-12-29
 * Time: 20:19
 */
class Location extends CI_Model
{
    public function cityZip($data){
        $dbSelect = "city_zip.zip_code, city_zip.city_name, states.state_abbr, counties.county_name, states.state_id, counties.county_id, city_zip.city_zip_ID";
        $dbTable = "city_zip";
        $dbJoin = array("states" => "states.state_id = city_zip.zip_state", "counties" => "counties.county_id = city_zip.zip_county");
        $dbWhere = array("city_zip.zip_code" => $data['zipCode'] );
        
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
        return $result->row();
    }
}