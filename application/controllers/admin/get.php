<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Get extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $is_logged_in = $this->session->userdata('is_logged_in');
        if($is_logged_in==true){
            
        }else{
            redirect('admin/login');
            
        }
    }
    public function index(){
        $this->load->spark('Twiggy/0.8.5');
	$this->twiggy->template('admin_index')->display(); 
    }
}
