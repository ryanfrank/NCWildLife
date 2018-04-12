<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 4/12/18
 * Time: 3:25 PM
 */

class Rehabber extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
    public function create ( $JSON = true )
    {

    }
    public function get( $dbOptions, $JSON = true ){

        $this->db->select('
                            rehabber_id, 
                            rehabber_first_name, 
                            rehabber_last_name, 
                            rehabber_email, 
                            rehabber_city,
                            rehabber_zip,
                            rehabber_phone, 
                            states.state_name as rehabber_state, 
                            counties.county_name as rehabber_county, 
                            rehabber_license, 
                            rehabber_active, 
                            rehabber_notes, 
                            rehabber_affiliate, 
                            rehabber_otherContact, 
                            created_date, 
                            updated_date
                        ');
        $this->db->from('rehabber');
        $this->db->join('states', 'rehabber.rehabber_state = states.state_id');
        $this->db->join('counties', 'rehabber.rehabber_county = counties.county_id');
        if ( $dbOptions['orderBy'] ) { $this->db->order_by($dbOptions['orderBy'], 'ASC'); }
        $myArray = $this->db->get();
        if ( $JSON == true ){
            $result = json_encode($myArray);
        }
        else {
            $result = $myArray;
        }
        return $result;
    }
    public function update() {

    }
    public function delete() {

    }

}
?>