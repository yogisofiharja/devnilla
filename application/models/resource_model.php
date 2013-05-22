<?php
class Resource_model extends CI_Model{
    var $id_resource='';
    var $user_id='';
    var $file_location='';
    var $title = '';
    var $description = '';
    var $type = '';
    var $date_uploaded = '';
    
    function all(){
        $q=$this->db->get('resource');
        
        return $q->result();
    }
    
    function get_by($key, $value){
        $q=$this->db->get_where('resource', array($key=>$value));
        $data=$q->result();
        $this->id_resource=$data[0]->id_resource;
        $this->user_id=$data[0]->user_id;
        $this->file_location=$data[0]->file_location;
        $this->title=$data[0]->title;
        $this->description=$data[0]->description;
        $this->type = $data[0]->type;
        $this->date_uploaded = $data[0]->date_uploaded;
        
        return $this;
    }
    
    function save(){
        $data=array(
            'user_id'=> $this->user_id,
            'file_location' => $this->file_location,
            'title' => $this->title,
            'description'=> $this->description,
            'type' => $this->type,
            'date_uploaded' => $this->date_uploaded
        );
        $this->db->insert('resource', $data);
    }
    
    function delete($id){
        $this->db->delete('resource', array('id_resource'=>$id));
    }
    
    function update(){
        $data=array(
            'title' => $this->title,
            'description'=> $this->description,
            'type' => $this->type
        );
        
        $this->db->where('id_resource', $this->id_resource);
        $this->db->update('resource', $data);
    }
}

?>