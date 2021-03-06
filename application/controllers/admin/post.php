<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Post extends CI_Controller {
	
	/* manage user */
	public function ceklogin()
	{
		$query=$this->user_model->ceklogin();
		
		if($query->username==$this->input->post('username')){
			$session=array(
				'id_user'=>$query->id_user,
				'username'=>$query->username,
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
	
	/* manage category */
	public function tambah_category(){
		$category = new Category_model();
		$category->name=$this->input->post('name');
		$category->description=$this->input->post('description');
		$category->save();
		redirect('admin/get/category');	
	}
	
	public function update_category($id){	
		$category = new Category_model();
		$category->id_category=$this->input->post('id_category');
		$category->name=$this->input->post('name');
		$category->description=$this->input->post('description');
		$category->update();
		redirect('admin/get/category');
	}
	
	
	/* manage page */
	public function tambah_page(){
		$page = new Page_model();
		$page->section=$this->input->post('section');
		$page->title=$this->input->post('title');
		$page->description=$this->input->post('description');
		$page->content=$this->input->post('content');
		$page->save();
		redirect('admin/get/page');	
	}
	public function update_page($id){	
		$page = new Page_model();
		$page->id_page=$this->input->post('id_page');
		$page->section=$this->input->post('section');
		$page->title=$this->input->post('title');
		$page->description=$this->input->post('description');
		$page->content=$this->input->post('content');
		$page->update();
		redirect('admin/get/page');
	}
	
	public function update_post(){	
		$posts = new Posts_model();
		$posts->id_post=$this->input->post('id_post');
		$temp_posts = $posts->get_by('id_post', $posts->id_post);
		$posts->thumbnail = $temp_posts->thumbnail;
		$posts->title=$this->input->post('title');
		$posts->note=$this->input->post('note');
		$posts->status=$this->input->post('show');
		
		$posts->update();
		
		$posts_category = new Posts_category_model();
		
        // hapus dulu
		$old_posts_category = $posts_category->all_by_posts($posts->id_post)->result();
		
		foreach($old_posts_category as $category){
			$posts_category->delete($category->id_post_category);
            //echo "bejo";
		}
		
		
        // simpan lagi
		$new_posts_category = $this->input->post('select-category');
		foreach ($new_posts_category as $category){
			$posts_category->category_id = $category;
			$posts_category->post_id = $this->input->post('id_post');
            //echo "bejo";
			$posts_category->save();
		}
		
        //echo $this->input->post('show');
		redirect('admin/get/posts');
		
	}
	
	/* manage resource */
	public function tambah_resource(){
		$resource=new Resource_model();
		$resource->user_id=$this->session->userdata('id_user');	
		$resource->title = $this->input->post('title');
		$resource->description = $this->input->post('description');
		$resource->type = $this->input->post('type');
		$resource->date_uploaded = date("Y-m-d H:i:s", time());
		
		$config['upload_path'] = './asset/resource/';
		$config['allowed_types'] = '*';
		$config['max_size']='50000';
		
		$this->load->library('upload', $config);
		if($this->upload->do_upload('resource')){
			$filename=array();
			$filename=$this->upload->data();
			$resource->file_location= 'asset/resource/'.$filename['file_name'];
			$resource->save();
			redirect('admin/get/resource');
		} else {
			$error = array('error' => $this->upload->display_errors());
			echo $error['error'];
		}
	}
	
	public function update_resource($id){
		$resource = new Resource_model();
		$resource->id_resource=$this->input->post('id_resource');
		$resource->title=$this->input->post('title');
		$resource->description=$this->input->post('description');
		$resource->type=$this->input->post('type');
		$resource->update();
		redirect('admin/get/resource');
	}
	/* manage post */
	public function tambah_posts(){
		$posts = new Posts_model();
		$posts_category = new Posts_category_model();
		
		$temp_category = $this->input->post('select-category');
		
		$posts->title=$this->input->post('title');
		$posts->note = $this->input->post('note');
		$posts->user_id = $this->session->userdata('id_user');
		$posts->status = $this->input->post('show');
		
		$today = date('Y-m-d H:i:s');
		$posts->date_post = $today;
		
		$post_id = $posts->save();
		
		foreach ($temp_category as $category){
			$posts_category->category_id = $category;
			$posts_category->post_id = $post_id;
			$posts_category->save();
		}
		
		$config['upload_path'] = './asset/resource/';
		$config['allowed_types'] = '*';
		$config['max_size']='50000';
		
		$resource=new Resource_model();
		
		$this->load->library('upload', $config);
		if($this->upload->do_upload('resource')){
			$filename=array();
			$filename=$this->upload->data();
			
			$posts->id_post=$post_id;
			$posts->thumbnail='asset/resource/'.$filename['file_name'];
			$posts->update();
			
			$resource->user_id=$this->session->userdata('id_user');	
			$resource->file_location= 'asset/resource/'.$filename['file_name'];
			$resource->date_uploaded = date("Y-m-d H:i:s", time());
			$resource->type = 1;
			$resource->save();
			redirect('admin/get/posts');
		} else {
			$error = array('error' => $this->upload->display_errors());
			echo $error['error'];
		}
		
        //redirect('admin/get/posts');
	}
	
	/* manage contact_us */
	function setEmailRead(){
		$id = $this->input->post("id");
		$message = new Contactus_model();
		$message->setRead($id);
	}

	function reply(){
		$outbox = new Outbox_model();
		$contact = new Contactus_model();
		$outbox->id_contact = $this->input->post("id_contact");
		$outbox->subject = $this->input->post("subject");
		$outbox->content = $this->input->post("pesan");
		$today = date('Y-m-d H:i:s');
		$outbox->date_sent =$today;
		$data = array();
		$data['contact'] = $contact->get_by('id_contact', $this->input->post("id_contact"));
    	//load email library and set the configuration
		$this->load->library('email');
		$config['protocol']    = 'smtp';
		$config['smtp_host']    = 'ssl://sengkuni.in-hell.com';
		$config['smtp_port']    = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user']    = 'support@devnila.com';
		$config['smtp_pass']    = 'pass4support';
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'html';
		
		$emailcontent = $outbox->content;
		$this->email->initialize($config);

		$this->email->to($contact->email);
		$this->email->from('support@devnila.com', 'Devnila Support');
		$this->email->subject($outbox->subject);
		$this->email->message($emailcontent);
		if($this->email->send()){
			$outbox->save($outbox);
			$result['hasil'] = "success";
			echo json_encode($result);
		}else{
			$result['hasil'] = "failed";
			echo json_encode($result);
		}
	}
	
}