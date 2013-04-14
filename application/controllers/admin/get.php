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
    
    /* manage user */
    public function user(){
        $this->load->spark('Twiggy/0.8.5');
        $user=new User_model();
        $data=array();
        $data['daftar_user']=$user->all();
        $this->twiggy->set($data, NULL, FALSE);
        $this->twiggy->template('list_user')->display();
    }
    function tambah_user($stat=NULL){
        $data=array();
        $data['stat']=$stat;
        $this->load->spark('Twiggy/0.8.5');
        $this->twiggy->set($data, NULL, FALSE);
        $this->twiggy->template('tambah_user')->display();
    }
    function update_user($id){
        $user = new User_model();
        $data=array();        
        $data['user']=$user->get_by('id_user', $id);
        $this->load->spark('Twiggy/0.8.5');
        $this->twiggy->set($data, NULL, FALSE);
        $this->twiggy->template('update_user')->display();
    }
    function delete_user($id){
        $user = new User_model();
        $user->delete($id);
        redirect('admin/get/user');
    }
    
    /* manage category */
    function category(){
        $this->load->spark('Twiggy/0.8.5');
        $category=new Category_model();
        $data=array();
        $data['list_category']=$category->all();
        $this->twiggy->set($data, NULL, FALSE);
        $this->twiggy->template('list_category')->display();
    }
    function tambah_category($stat=NULL){
        $data=array();
        $data['stat']=$stat;
        $this->load->spark('Twiggy/0.8.5');
        $this->twiggy->set($data, NULL, FALSE);
        $this->twiggy->template('tambah_category')->display();
    }
    function update_category($id){
        $category = new Category_model();
        $data=array();        
        $data['category']=$category->get_by('id_category', $id);
        $this->load->spark('Twiggy/0.8.5');
        $this->twiggy->set($data, NULL, FALSE);
        $this->twiggy->template('update_category')->display();
    }
    function delete_category($id){
        $category = new Category_model();
        $category->delete($id);
        redirect('admin/get/category');
    }
    
    /* manage page */
    /* manage resource */
    
    /* manage post */
    function posts(){
        $this->load->spark('Twiggy/0.8.5');
        $posts=new Posts_model();
        $posts_category = new Posts_category_model();
        $data=array();
        $list_posts = array();
        $list_posts_category = array();
        
        $temp_posts = $posts->all_by('user_id', $this->session->userdata('id_user'));
        
        $i = 0;
        foreach($temp_posts as $posts){
            $posts->category = $posts_category->all_by_posts($posts->id_post)->result();
            $list_posts[$i] = $posts;
            $i++;
        }
        
        $data['list_posts']= $list_posts;
        $this->twiggy->set($data, NULL, FALSE);
        $this->twiggy->template('list_posts')->display();
    }
    
    function tambah_posts($stat=NULL){
        $this->load->spark('Twiggy/0.8.5');
        
        $category = new Category_model();
        
        $data=array();
        
        $data['stat']=$stat;
        $data['list_category'] = $category->all();
        
        $this->twiggy->set($data, NULL, FALSE);
        $this->twiggy->template('tambah_posts')->display();
    }
    
    function update_posts($id){
        $this->load->spark('Twiggy/0.8.5');
        $posts=new Posts_model();
        $category = new Category_model();
        
        $posts_category = new Posts_category_model();
        $data=array();
        
        $temp_posts = $posts->get_by('id_post', $id);
        $posts_category = $posts_category->all_by_posts($temp_posts->id_post)->result();
        
    
        
        echo "<pre>";
        print_r($temp_posts->category);
        echo "</pre>";
        
        $data['posts']= $temp_posts;
        $this->twiggy->set($data, NULL, FALSE);
        //$this->twiggy->template('update_posts')->display();
    }
    
    function delete_posts($id){
        $posts = new posts_model();
        $posts->delete($id);
        redirect('admin/get/posts');
    }
    
    /* manage contact_us */
    
    
}
