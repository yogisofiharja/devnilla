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
		$contact->status = 0;
		$contact->save($contact);

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
		
		$emailcontent = "Dear ".$contact->name.".<br/>Thanks for contacting us. We will response your message soon. Please wait for the reply from us.<br/> <br/>
			Best regards,<br/>
			Devnila <br/>
			http://devnila.com";
		$this->email->initialize($config);

		$this->email->to($contact->email);
		$this->email->from('support@devnila.com', 'Devnila Support');
		$this->email->subject("Devnila notice");
		$this->email->message($emailcontent);
		$this->email->send();
		
		$result['hasil'] = "success";
		echo json_encode($result);
	}
}
