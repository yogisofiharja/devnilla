<?php
class Posts_category_model extends CI_Model{
    var $id_post_category='';
    var $post_id='';
    var $category_id='';
    
    function all(){
        $q=$this->db->get('post_category');
        return $q->result();
    }
    
    function all_by_posts($value){
        $this->db->select('*');
        $this->db->from('post_category as pc');
        $this->db->join('category as cat', 'cat.id_category = pc.category_id');
        $this->db->where('pc.post_id', $value);
        
        return $this->db->get();
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
    
    function delete_category($id){
        //$this->db->delete('post_category', array('category_id'=>$id));
        //$this->db->delete('post_category', array('category_id'=>$id));
        $this->db->delete('post_category', array('category_id'=>$id));
    }
    
    function delete_posts($id){
        $this->db->delete('post_category', array('post_id'=>$id));
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
