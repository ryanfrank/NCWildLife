<?php
/**
 * Created by PhpStorm.
 * User: ryan_w_frank
 * Date: 8/12/17
 * Time: 7:07 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function index()
    {
        $data['facebook'] = $this->Facebook->getFacebookId();
        $data['year'] = date("Y");
        if ( !$this->ion_auth->logged_in() ) {
            $data['image'] = base_url('application/images/Users/blank-avatar.png');
        }
        else {
            $user = $this->ion_auth->user()->row();
            $user->userImage = "application/" . $user->userImage;
            $user_groups = $this->ion_auth->get_users_groups($user->id)->result();
            $data['user'] = $user;
            $data['groups'] = $user_groups;
        }
        $data['siteInfo'] = $this->Siteinfo->getSiteMessage();
        $this->load->view('rehab_main', $data);
    }

    public function inventoryManager() {

    }
    public function vendorManager() {
        $data['productType'] = $this->Vendor->get('*', 'product_types');
        $this->load->view('admin/vendor_management', $data);
    }
    public function vendorLookup() {
        if ($this->input->is_ajax_request()) {
            $productID = $this->input->post('ID');
            $dbJoin = array("product_association" => "product_association.vendor_ID = vendor.vendor_id");
            $dbWhere = array("product_association.product_ID" => $productID);
            $result = $this->Vendor->get('vendor.vendor_id,vendor.vendor_name', 'vendor', $dbJoin, $dbWhere);
            echo json_encode($result->result());
        }
        else {show_404();}
    }
    public function vendorLocations() {
        function formatPhoneNumber($phone) {
            if ( strlen($phone) === 10 ) {
                $result = "(".substr($phone, 0, 3).") ".substr($phone, 3,3)."-".substr($phone,6);
            }
            return $result;
        }
        if ($this->input->is_ajax_request()) {
            $vendorID = $this->input->post('ID');
            $dbJoin = array("city_zip" => "vendor_information.vendor_zip = city_zip.city_zip_ID",
                            "counties" => "city_zip.zip_county = counties.county_id",
                            "states" => "city_zip.zip_state = states.state_id"
                        );
            $dbWhere = array("vendor_information.v_ID" => $vendorID);
            $result = $this->Vendor->get('vendor_information.street_address, vendor_information.vendor_phone,city_zip.city_name,city_zip.zip_code,counties.county_name,states.state_abbr', 'vendor_information', $dbJoin, $dbWhere);
            foreach ( $result->result() as $row ){
                $row->vendor_phone = formatPhoneNumber($row->vendor_phone);
            }
            echo json_encode($result->result());
        }
        else {show_404();}
    }
    public function add() {
        if ($this->input->is_ajax_request()) {
            if ( $this->uri->segment(3) == 'vendor' ){
                $data['productID'] = $this->input->post('product');
                $data['vendorName'] = $this->input->post('vendorName');
                $result = $this->Vendor->addVendor($data);
            }
            elseif ( $this->uri->segment(3) == 'addLocation' ){
                $data['street_address'] = $this->input->post('street');
                $data['vendor_phone'] = preg_replace('~\D~','',$this->input->post('phone'));
                $data['vendor_zip'] = $this->input->post('zip');
                $data['v_ID'] = $this->input->post('vendor');
                $result = $this->Vendor->addVendorLocation($data);
            }
            echo json_encode($result);
        }
    }
    public function get() {
        if ($this->input->is_ajax_request()) {
            if ( $this->uri->segment(3) == 'cityZip' ){
                $data['zipCode'] = $this->input->post('zip');
                $result = $this->Location->cityZip($data);
            }
            echo json_encode($result);
        }
    }
}
?>