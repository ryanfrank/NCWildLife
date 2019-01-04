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
    public function get_calendar_events($type, $start = '0000-00-00'){
        $myArray = array();
        $dbSelect = "title, allDay, start, end, backgroundColor";
        $dbFrom = "calendar";
        $dbJoin = array('calendar_event_type' => "calendar.eventType = calendar_event_type.id");
        $dbWhere = array("calendar_event_type.event_type" => $type, "calendar.start >= " => $start );
        $this->db->select($dbSelect);
        $this->db->from($dbFrom);
        $this->db->join("calendar_event_type", "calendar.eventType = calendar_event_type.id");
        $this->db->where($dbWhere);

        $result = $this->db->get();

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