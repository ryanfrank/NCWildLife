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
    public function get_calendar_events($type, $start = false, $end = false){
        $dbSelect = "calendar.title,calendar.allDay,calendar.start,calendar.end,calendar.id,color,textColor";
        $dbFrom = "calendar";
        $this->db->select($dbSelect);
        $this->db->from($dbFrom);
        $this->db->join("calendar_event_type", "calendar.eventType = calendar_event_type.id");
        $this->db->join("users", "calendar.createdFor = users.id");
        if ( is_array($type) ) {
            $this->db->group_start();
            for ( $i = 0; $i < count($type); $i++ ){
                if( $i == 0 ) { $this->db->where("calendar_event_type.event_type = ", $type[$i]);  }
                else { $this->db->or_where("calendar_event_type.event_type = ", $type[$i]); }
            }
            $this->db->group_end();
            $where = array("calendar.start >= " => $start, "calendar.end <=" => $end, "visible" => true );
            $this->db->where($where);
        }
        else {
            $where = array("calendar_event_type.event_type" => $type, "calendar.start >= " => $start, "calendar.end <=" => $end, "visible" => false );
            $this->db->where($where);
        }

        $result = $this->db->get();
        //echo $this->db->last_query(); // used for debug  - shows last query executed
        return json_encode($result->result());
    }
    public function getEventsById($id){
        $dbSelect = "calendar.title,calendar.allDay,calendar.start,calendar.end,calendar.id,calendar_event_type.event_type,calendar.createdFor,CONCAT(first_name,' ', last_name) as name";
        $dbFrom = "calendar";
        $this->db->select($dbSelect);
        $this->db->from($dbFrom);
        $this->db->join("calendar_event_type", "calendar.eventType = calendar_event_type.id");
        $this->db->join("users", "calendar.createdFor = users.id");
        $this->db->where('calendar.id = ', $id);
        $result = $this->db->get();
        $value = $result->result_array();
        $comSelect = "calendar_event_notes.calendar_event_notes,CONCAT(first_name,' ',last_name) as name, calendar_event_notes.createdDate";
        $comFrom = 'calendar_event_notes';
        $this->db->select($comSelect);
        $this->db->from($comFrom);
        $this->db->join("users", "calendar_event_notes.createdBy = users.id");
        $this->db->where("calendar_event_notes.calendar_event_id = ", $id);
        $comments = $this->db->get()->result();
        $value[0]['comments'] = $comments;

        return json_encode($value[0]);
    }
    public function add_calendar_event($type, $data, $desc){
        $data['eventType'] = $this->db->get_where('calendar_event_type', array('event_type' => $type), '1')->row()->id;
        if ( $data['allDay'] == 'true' ) { $data['allDay'] = 1; }
        else { $data['allDay'] = 0; }
        $this->db->insert('calendar', $data);
        if ( $desc ) {
            $myID = $this->db->insert_id();
            $desc['calendar_event_id'] = $myID;
            $this->db->insert('calendar_event_notes', $desc);
            //echo $this->db->last_query() . "\n"; // used for debug  - shows last query executed
        }

        if ( $this->db->affected_rows() > 0) {
            $result="success";
        }
        else {
             $result="error";
        }
        return json_encode($result);
    }
    public function updateSchedule($type, $data){
        $insertData = array(
            'calendar_event_notes'  => $data['comment'],
            'calendar_event_id'     => $data['id'],
            'createdBy'             => $data['user']
        );
        if ( $type == 'update' ){
            // WIP: To be done later
        }
        elseif ( $type == 'delete' ){
            $updateData = array(
                'visible'   => false
            );
            $this->db->where('calendar.id', $data['id']);
            $this->db->update('calendar', $updateData);
        }
        elseif ( $type == 'noshow' ){
            $noShowCount = $this->ion_auth->user($data['sUser'])->row()->noShow;
            $updateData = array(
                'noShow'    => ++$noShowCount
            );
            $this->db->where('users.id', $data['sUser']);
            $this->db->update('users', $updateData);
        }
        $this->db->insert('calendar_event_notes', $insertData);

        if ( $this->db->affected_rows() > 0) {
            $result="success";
        }
        else {
            $result="error";
        }
        return json_encode($result);
    }
}
?>