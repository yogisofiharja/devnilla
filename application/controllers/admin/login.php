<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
	public function index($stat=NULL){
        $data=array();
		$data['stat'] = $stat;
        $this->load->spark('Twiggy/0.8.5');
        $this->twiggy->set($data, NULL, FALSE);
        $this->twiggy->template('login')->display();
	}	
}