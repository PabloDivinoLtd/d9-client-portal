<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Envy
 * Date: 12/20/17
 * Time: 1:55 AM
 */
class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        redirect(base_url().'user/login');

    }

    public function login() {

        $data['title'] = 'D9 Clubclaims';

        $this->load->view('signin_view', $data);
    }

    public function forgot() {

        $data['title'] = 'Recover Your Password';
        $data['msg'] = '';

        $this->load->view('forgot_view', $data);
    }
}