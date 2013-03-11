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
    public function user(){
        $this->load->spark('Twiggy/0.8.5');
        $user=new User_model();
        $data=array();
        $data['daftar_user']=$user->all();
        $this->twiggy->set($data, NULL, FALSE);
        $this->twiggy->template('list_user')->display();
    }
    function update_user($id){
        $user = new User_model();
        $data=array();
        $data['user']=$user->get_by('id_user', $id);
        $this->load->spark('Twiggy/0.8.5');
        $this->twiggy->set($data, NULL, FALSE);
        $this->twiggy->template('update_user')->display();
    }
}
