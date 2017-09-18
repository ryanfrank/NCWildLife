<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 9/18/17
 * Time: 9:06 AM
 */
class Calendar extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
    public function get_calendar_events($type, $start = '0000-00-00', $JSON = true){
        $myArray = array();

        $query = $this->db->order_by('start', 'ASC')->get_where('calendar_view', array('event_type' => $type, 'start >=' => $start) )->result_array();
        foreach ( $query as $row ){
            if ( is_null($row['Description']) ){
                $row['backgroundColor'] = "green";
                $row['Description'] = "Available";
            }
            else{
                $row['backgroundColor'] = "grey";
            }
            if ($row['allDay'] == "0" ) { $row['allDay'] = false;}
            else { $row['allDay'] = true;}
            array_push($myArray, $row);
        }
        if ( $JSON == true ){
            $result = json_encode($myArray);
        }
        else {
            $result = $myArray;
        }

        return $result;
    }
    public function add_calendar_event($type, $data){
        $eventData = $this->db->get_where('calendar_event_type', array('event_type' => $type))->row();
        $data['eventType'] = $eventData->id;
        if ( $this->db->insert('calendar', $data) ) {
            if ( $this->db->affected_rows() >= '1' ) {
                $result = "success";
            }
            else {
                $result = "failure";
            }
        }
        else {
            $result = "failure";
        }
        return json_encode($result);
    }
    public function update_calendar_registration($data) {
        if ( $this->db->insert('calendar_assignment', $data) ){
            $result = "success";
        }
        else {
            $result = "failure";
        }
        return json_encode($result);
    }
}
?>