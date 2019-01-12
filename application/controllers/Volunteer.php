<?php
/**
 * Created by PhpStorm.
 * User: ryanfrank
 * Date: 9/4/17
 * Time: 11:24 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Volunteer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function schedule(){
        if ($this->input->is_ajax_request()) {
            $type = $this->uri->segment(3);
            $this->load->view($type . '/' . $type . '_calendar');
        }
        else { show_404(); }
    }
    public function calendar() {
        if ($this->input->is_ajax_request()) {
            $type = $this->uri->segment(3);
            $result = $this->Calendar->get_calendar_events($type);
            echo $result;
       }
       else { show_404(); }
    }
    public function calendarEntry() {
        if ($this->input->is_ajax_request()) {
            $this->load->view('volunteer/volunteer_calendar_update');
        }
        else { show_404(); }
    }
    public function addCalendarEvent(){
        if ($this->input->is_ajax_request()) {
            $user = $this->ion_auth->user()->row();
            $type = $this->uri->segment(3);
            $data = array(
                'start' => $this->input->post('date') . " " . date('H:i', strtotime($this->input->post('sTime'))),
                'end' => $this->input->post('date') . " " . date('H:i', strtotime($this->input->post('eTime'))),
                'title' => $this->input->post('eTitle'),
                'allDay' => $this->input->post('allDay'),
                'createdBy' => $user->id
            );
            $result = $this->Calendar->add_calendar_event($type, $data);
            //print_r($data);
            echo $result;
        }
        else { show_404(); }
    }
    public function calendarRegistration(){
        if ($this->input->is_ajax_request()) {
            $curDate = date("Y-m-d H:i");
            $query = $this->Calendar->get_calendar_events('Volunteer', $curDate, $JSON = false);
            $data['date'] = $curDate;
            $data['user'] = $this->ion_auth->user()->row();
            $data['result'] = $query;
            $this->load->view('volunteer/volunteer_calendar_registration', $data);
        }
        else { show_404(); }
    }
    public function updateCalendarEvent() {
        if ($this->input->is_ajax_request()) {
            $userID = $this->input->post('userID');
            $user = $this->ion_auth->user($userID)->row();
            $rehabberInfo = $this->db->get_where('rehabber', array('rehabber_email' => $user->email))->row();
            $data = array(
                'calendar_event' => $this->input->post('event'),
                'volunteer' => $rehabberInfo->rehabber_id
            );
            $result = $this->Calendar->update_calendar_registration($data);

            echo $result;
        }
        else { show_404(); }
    }
    public function vendorView() {
        $this->load->library('form_validation');
        if ($this->input->is_ajax_request()) {
            $dbSelect = '*' ;
            $dbTable = 'product_types' ;
            $data['productType'] = $this->Vendor->get($dbSelect, $dbTable, $dbJoin = FALSE, $dbWhere = FALSE);

            $this->load->view('volunteer/vendor_information', $data);
        }
    }
    public function getVendor(){
        if ($this->input->is_ajax_request()) {
            $lookupType = $this->input->post('type');

            if ( $lookupType == 'productType' ) {
                $productType = $this->input->post('typeID');
                $dbSelect = 'vendor.vendor_id,vendor.vendor_name, product_ID';
                $dbTable = 'product_association';
                $dbJoin = array("vendor" => "product_association.vendor_ID = vendor.vendor_id");
                $dbWhere = array("product_ID" => $productType);
                $result = $this->Vendor->get($dbSelect, $dbTable, $dbJoin, $dbWhere);
            }
            elseif ( $lookupType == 'vendorLookup' ){
                $vendorNameID = $this->input->post('nameID');
                $dbSelect = '   vendor_information.street_address, 
                                vendor_information.vendor_phone,
                                vendor_information.vInfoID,
                                vendor.vendor_name,
                                city_zip.city_name,
                                city_zip.zip_code,
                                counties.county_name,
                                vendor_information.updatedDate,
                                vendor_information.vInfoID';
                $dbTable = 'vendor_information';
                $dbJoin = array("vendor" => "vendor_information.v_ID = vendor.vendor_id",
                    "city_zip" => "vendor_information.vendor_zip = city_zip.city_zip_ID",
                    "counties" => "city_zip.zip_county = counties.county_id");
                $dbWhere = array("v_ID" => $vendorNameID);
                $result = $this->Vendor->get($dbSelect, $dbTable, $dbJoin, $dbWhere);
            }
            elseif ( $lookupType == 'vendorInformation' ){
                $vInfoID = $this->input->post('vInfoID');
                $dbSelect = '   vendor_information.updatedDate,
                                vendor_contacts.v_first_name,
                                vendor_contacts.v_last_name,
                                vendor_contacts.vConID,
                                vendor_information.vInfoID,
                                vendor_contacts.v_phone,
                                vendor_contacts.v_contact_position,
			                    vendor_contacts.v_contact_notes,
                                contact_type.contact_type ';
                $dbTable = 'vendor_contacts';
                $dbJoin = array("vendor_information" => "vendor_contacts.vinfoID = vendor_information.vInfoID",
                    "contact_type" => "contact_type.cT_ID = vendor_contacts.v_phone_type");
                $dbWhere = array("vendor_information.vInfoID" => $vInfoID);
                $result = $this->Vendor->get($dbSelect, $dbTable, $dbJoin, $dbWhere);
            }
            echo json_encode($result->result());
        }
        else {show_404();}
    }
    public function updateContact() {
        if ($this->input->is_ajax_request()) {
            $cID = $this->input->post('ID');
            $phone = preg_replace('/[^0-9]/','', $this->input->post('v_phone'));
            $dbTable = "vendor_contacts";
            $dbData = array(
                'v_first_name'          =>  $this->input->post('v_first_name'),
                'v_last_name'           =>  $this->input->post('v_last_name'),
                'v_phone'               =>  $phone,
                'v_contact_position'    =>  $this->input->post('v_contact_position'),
                'v_contact_notes'       =>  $this->input->post('v_contact_notes')
            );
            $dbWhere = array('vConID' => $cID);
            $result = $this->Vendor->update($dbTable,$dbData,$dbWhere);
        }
        echo json_encode($result);
    }
    public function deleteContact() {
        if ($this->input->is_ajax_request()) {
            $dID = $this->input->post('ID');
            $dbTable = 'vendor_contacts';
            $dbWhere = array('vConID' => $dID);
            $result = $this->Vendor->delete($dbTable,$dbWhere);
        }
        echo json_encode($result);
    }
    public function addContact() {
        if ($this->input->is_ajax_request()) {
            $dbData = array(
                'v_first_name'          => $this->input->post('first_Name'),
                'v_last_name'           => $this->input->post('last_Name'),
                'v_phone'               => preg_replace('/[^0-9]/','', $this->input->post('phoneNumber')),
                'v_phone_type'          => $this->input->post('phoneType'),
                'v_contact_position'    => $this->input->post('position'),
                'v_contact_notes'       => $this->input->post('notes'),
                'vinfoID'               => $this->input->post('storeID')
            );
            $dbTable = 'vendor_contacts';
            $result = $this->Vendor->insert($dbData, $dbTable);
        }
        echo json_encode($result);
    }
}
?>