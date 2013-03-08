<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
			$this->load->spark('Twiggy/0.8.5');
			$this->load->helper('url'); // load the CodeIgniter URL helper
			// map the base_url() function as a Twig function
			$this->twiggy->register_function('base_url');
			$this->twiggy->template('home')->display();
			//$this->twiggy->display();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */