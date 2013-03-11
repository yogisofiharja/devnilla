<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Post extends CI_Controller {
    public function ceklogin()
	{
		$query=$this->user_model->ceklogin();
		if($query){
			$session=array(
			'id_user'=>$query->id_user,
			'username'=>$this->input->post('username'),
			'is_logged_in'=>true);
			$this->session->set_userdata($session);
			redirect('admin/get/index');
		}
		else
		{
			redirect("admin/login/index/error");
		}
	}
    public function tambah_user(){
	if($this->input->post('password') == $this->input->post('password2')){
	    $user = new User_model();
	    $user->username=$this->input->post('username');
	    $user->password=md5($this->input->post('password'));
	    $user->full_name=$this->input->post('full_name');
	    $user->email=$this->input->post('email');
	    $user->save();
	    redirect('admin/get/user');
	}else{
	    redirect('admin/get/tambah_user/error');
	}
    }
    public function update_user($id){	
	$user = new user_model();
	$user->id_user=$this->input->post('id_user');
	$user->username=$this->input->post('username');
	$user->full_name=$this->input->post('full_name');
	$user->email=$this->input->post('email');	
	$user->update();
	redirect('admin/get/user');
    }
    
}