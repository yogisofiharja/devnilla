<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Get extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $is_logged_in = $this->session->userdata('is_logged_in');
        if($is_logged_in==true){
            $this->load->spark('Twiggy/0.8.5');
        }else{
            redirect('admin/login');
            
        }
    }
    public function index(){
        $this->load->spark('Twiggy/0.8.5');
        $message = new Contactus_model();
        $outbox = new Outbox_model();
        $data = array();
        $data['unread'] = $message->get_unread();
        $data['inbox'] = $message->all();
        $data['outbox'] = $outbox->all();
        // print_r($data['unread']);
        // $data['inbox']=$message->;
        $this->twiggy->set($data, NULL, FALSE);
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
        $posts_category = new Posts_category_model();
        $posts_category->delete_category($id);
        redirect('admin/get/category');
    }
    
    /* manage page */
    function page(){
        $this->load->spark('Twiggy/0.8.5');
        $page=new Page_model();
        $data=array();
        $data['list_page']=$page->all();
        $this->twiggy->set($data, NULL, FALSE);
        $this->twiggy->template('list_page')->display();
    }
    function tambah_page($stat=NULL){
        $data=array();
        $data['stat']=$stat;
        $this->load->spark('Twiggy/0.8.5');
        $this->twiggy->set($data, NULL, FALSE);
        $this->twiggy->template('tambah_page')->display();
    }
    function update_page($id){
        $page = new Page_model();
        $data=array();        
        $data['page']=$page->get_by('id_page', $id);
        $this->load->spark('Twiggy/0.8.5');
        $this->twiggy->set($data, NULL, FALSE);
        $this->twiggy->template('update_page')->display();
    }
    function delete_page($id){
        $page = new Page_model();
        $page->delete($id);
        redirect('admin/get/page');
    }
    /* manage resource */
    function resource(){
        $this->load->spark('Twiggy/0.8.5');
        $resource = new Resource_model();
        $data=array();
        $list_resource=$resource->all();
        $data['list_resource']= $list_resource;
        $this->twiggy->set($data, NULL, FALSE);
        $this->twiggy->template('list_resource')->display();
    }
    
    function tambah_resource($stat=NULL){
        $this->load->spark('Twiggy/0.8.5');
        
        $this->twiggy->template('tambah_resource')->display();
    }
    
    function update_resource($id){
        $this->load->spark('Twiggy/0.8.5');
        $resource=new Resource_model();
        
        $data=array();
        
        $data['resource']= $resource->get_by('id_resource', $id);
        $this->twiggy->set($data, NULL, FALSE);
        $this->twiggy->template('update_resource')->display();
    }
    
    function delete_resource($id){
        $resource = new Resource_model();
        $file_location=$resource->get_by('id_resource', $id);
        exec("rm /var/www/htdocs/devnilla/".$file_location->file_location);
        $resource->delete($id);
        redirect('admin/get/resource');
    }
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
        $temp_category = $category->all();
        $list_category = array();
       
        
        
        $i = 0;
        $j = 0;
        $count_posts_category = count($posts_category);
        foreach($temp_category as $category){
            $category->selected = 0;
            $temp_pc = $posts_category;
            foreach($temp_pc as $pc){
                if ($category->name == $pc->name){
                    $category->selected = 1;
                }
            }
            
            
            $list_category[$i] = $category;
            $i++;
        }
        
        /*
        echo "<pre>";
        print_r($posts_category);
        
        print_r($list_category);
        echo "</pre>";
        */
        
        $temp_posts->list_category = $list_category;
        $data['posts']= $temp_posts;
        $this->twiggy->set($data, NULL, FALSE);
        $this->twiggy->template('update_posts')->display();
    }
    
    function delete_posts($id){
        $posts = new posts_model();
        $posts->delete($id);
        $posts_category = new Posts_category_model();
        $posts_category->delete_posts($id);
        redirect('admin/get/posts');
    }
    
    /* manage contact_us */
    function singleMail($id){
        $message = new Contactus_model();
        $data=array();
        $data['message'] = $message->get_by('id_contact', $id);
        $this->twiggy->set($data, NULL, FALSE);
        $this->twiggy->template('detail_contact')->display();
    }
    
    function singleOutbox($id){
        $message = new Outbox_model();
        $data=array();
        $data['message'] = $message->get_by('id_outbox', $id);
        $this->twiggy->set($data, NULL, FALSE);
        $this->twiggy->template('detail_outbox')->display();
    }
}
