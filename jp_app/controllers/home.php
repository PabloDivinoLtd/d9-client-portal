<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Envy
 * Date: 12/19/17
 * Time: 10:54 PM
 */
class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $data['title'] = 'D9 Clubclaims';

        $this->load->view('home_view', $data);
    }
}