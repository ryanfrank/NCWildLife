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
    public function get_calendar_events($type, $start = '2019-01-01'){
        $dbSelect = "calendar.title,calendar.allDay,calendar.start,calendar.end,calendar.id";
        $dbFrom = "calendar";
        $dbWhere = array("calendar_event_type.event_type" => $type, "calendar.start >= " => $start, "visible" => true );
        $this->db->select($dbSelect);
        $this->db->from($dbFrom);
        $this->db->join("calendar_event_type", "calendar.eventType = calendar_event_type.id");
        $this->db->where($dbWhere);

        $result = $this->db->get();
        //echo $this->db->last_query(); // used for debug  - shows last query executed
        return json_encode($result->result());
    }
    public function add_calendar_event($type, $data){
        $data['eventType'] = $this->db->get_where('calendar_event_type', array('event_type' => $type), '1')->row()->id;
        if ( $data['allDay'] == 'true' ) { $data['allDay'] = 1; }
        else { $data['allDay'] = 0; }
        $this->db->insert('calendar', $data);
        if ( $this->db->affected_rows() > 0) {
            $result="success";
        }
        else {
             $result="error";
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