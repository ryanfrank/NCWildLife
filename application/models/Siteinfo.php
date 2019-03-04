<?php
/**
 * Created by VS Code.
 * User: ryanfrank
 * Date: 1/31/19
 * Time: 8:44 PM
 */


class Siteinfo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        /**
         * WHAT:    Setup default options for using the Rehab main model.  This model is used to pull/update information about the site.
         * HOW: Columns in the table consist of:
         *          main_page_title
         *          main_page_message
         * 
         * 
         */
        $this->table = "site_information";
    }

    public function getSiteMessage(){
        // Currently we only have one row in the table, should stay that way.
        $result = $this->db->order_by('id',"desc")->limit(1)->get($this->table);
        return $result->row();
    }

    public function updateSiteMessage($data) {
        $result = "fail";
        if ( is_array($data) ){
            $this->db->replace($this->table, $data);
            //echo $this->db->last_query(); // used for debug  - shows last query executed
            if ( $this->db->affected_rows() > 0 ){
                $result = "success";
            }
        }
        return $result;
    }
}

?>