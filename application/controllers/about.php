<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{
			$this->load->spark('Twiggy/0.8.5');
			$this->twiggy->template('about')->display();			
	}
}
