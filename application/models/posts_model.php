<?php
class Posts_model extends CI_Model{
    var $id_post='';
    var $user_id='';
    var $title='';
    var $note='';
    var $status='';
    var $date_post='';
    
    
    function all(){
        $q=$this->db->get('post');
        return $q->result();
    }
    
    function all_by($key, $value){
        $this->db->order_by('date_post', 'desc');
        $q=$this->db->get_where('post', array($key=>$value));
        return $q->result();
    }
    
    function get_by($key, $value){
        $q=$this->db->get_where('post', array($key=>$value));
        $data=$q->result();
        $this->id_post=$data[0]->id_post;
        $this->user_id=$data[0]->user_id;
        $this->title=$data[0]->title;
        $this->note=$data[0]->note;
        $this->status=$data[0]->status;
        $this->date_post=$data[0]->date_post;
        $this->date_updated=$data[0]->date_updated;
        
        return $this;
    }
    
    function save(){
        $data=array(
            'user_id'=> $this->user_id,
            'title'=> $this->title,
            'note'=> $this->note,
            'status'=> $this->status,
            'date_post'=> $this->date_post,
            'date_updated'=> $this->date_post,
            
        );
        
        $this->db->insert('post', $data);
        return $this->db->insert_id();
    }
    
    function delete($id){
        $this->db->delete('post', array('id_post'=>$id));
    }
    
    function update(){
        $data=array(
            'title'=> $this->title,
            'note'=> $this->note,
            'status'=> $this->status
        );
        $this->db->where('id_post', $this->id_post);
        $this->db->update('post', $data);
    }
}

?>