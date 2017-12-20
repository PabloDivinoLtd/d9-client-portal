<?php
class Email_drafts_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function creditor_signup($email_body,$row){

        $email_body=replace_string('{USERNAME}',$row['username'],$email_body);
        $email_body=replace_string('{USERNAME}',$row['email'],$email_body);
        $email_body=replace_string('{PASSWORD}',$row['password'],$email_body);
        $email_body=replace_string('{SITE_URL}',base_url(),$email_body);
        return $email_body;
    }
}