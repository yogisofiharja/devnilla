<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

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
		/*$posts = new Posts_model();
		$posts_category = new Posts_category_model();
		$data = array();
		$list_posts = array();
		$list_posts_category = array();
		
		$temp_posts = $posts->all_by('user_id', $this->session->userdata('id_user'));
		
		$i = 0;
		foreach($temp_posts as $posts){
			$posts->category = $posts_category->all_by_posts_except_portofolio()->result();
			$list_posts[$i] = $posts;
			$i++;
		}
		
		$data['list_posts']= $list_posts;
		$this->twiggy->set($data, NULL, FALSE);*/
		
		$posts=new Posts_model();
        $posts_category = new Posts_category_model();
        $data=array();
        $list_posts = array();
        $list_posts_category = array();
        
        //$temp_posts = $posts->all_by('user_id', $this->session->userdata('id_user'));
        $temp_posts = $posts->all();
        
        $i = 0;
        foreach($temp_posts as $posts){
            $posts->category = $posts_category->all_by_posts_except_portofolio()->result();
            $list_posts[$i] = $posts;
            $i++;
        }
        
        $data['list_posts']= $list_posts;
        $this->twiggy->set($data, NULL, FALSE);
		
		$this->twiggy->template('blog')->display();
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */