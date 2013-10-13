<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function simpan()
	{
		$result=array();
		$contact = new Contactus_model();	
		$contact->name = $this->input->post('name');
		$contact->email = $this->input->post('email');
		$contact->company = $this->input->post('company');
		$contact->website = $this->input->post('website');
		$contact->content = $this->input->post('content');
		$today = date('Y-m-d H:i:s');
		$contact->date_post = $today;

		$contact->save($contact);
		$result['hasil'] = "success";
		echo json_encode($result);
	}
}
