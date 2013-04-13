<?php
class Post_category_model extends CI_Model{
    var $id_post_category='';
    var $post_id='';
    var $category_id='';
    
    function all(){
        $q=$this->db->get('post_category');
        return $q->result();
    }
    
    function get_by($key, $value){
        $q=$this->db->get_where('post_category', array($key=>$value));
        $data=$q->result();
        $this->id_post_category=$data[0]->id_post_category;
        $this->post_id=$data[0]->post_id;
        $this->category_id=$data[0]->category_id;
        
        return $this;
    }
    function save(){
        $data=array(
            'post_id'=> $this->post_id,
            'category_id'=> $this->category_id
        );
        $this->db->insert('post_category', $data);
    }
    function delete($id){
        $this->db->delete('post_category', array('id_post_category'=>$id));
    }
    function update(){
        $data=array(
            'post_id'=>$this->post_id,
            'category_id'=>$this->category_id
        );
        $this->db->where('id_post_category', $this->id_post_category);
        $this->db->update('post_category', $data);
    }
}

?>