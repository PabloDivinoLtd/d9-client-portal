<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){

        if(!$this->session->userdata('user_id')){
            echo 'Your session has been expired, please re-login first.';
            exit;
        }

        $data['title'] = 'D9 Dashboard';

        $this->load->view('dashboard_view', $data);
    }
}