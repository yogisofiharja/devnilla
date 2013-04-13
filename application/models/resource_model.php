<?php
class Resource_model extends CI_Model{
    var $id_resource='';
    var $user_id='';
    var $file_location='';
    var $title = '';
    var $description = '';
    var $type = '';
    var $size = '';
    var $extension ='';
    var $date_uploaded = '';
    
    function all(){
        $q=$this->db->get('resource');
        
        return $q->result();
    }
    
    function get_by($key, $value){
        $q=$this->db->get_where('resource', array($key=>$value));
        $data=$q->result();
        $this->id_resource=$data[0]->id_reosurce;
        $this->user_id=$data[0]->user_id;
        $this->file_location=$data[0]->file_location;
        $this->title=$data[0]->title;
        $this->description=$data[0]->description;
        $this->type = $data[0]->type;
        $this->size = $data[0]->size;
        $this->extension = $data[0]->extension;
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
            'size' => $this->size,
            'extension' => $this->extension,
            'date_uploaded' => $this->date_uploaded
        );
        $this->db->insert('resource', $data);
    }
    
    function delete($id){
        $this->db->delete('resource', array('id_resource'=>$id));
    }
    
    function update(){
        $data=array(
            'file_location' => $this->file_location,
            'title' => $this->title,
            'description'=> $this->description,
            'type' => $this->type,
            'size' => $this->size,
            'extension' => $this->extension,
        );
        
        $this->db->where('id_resource', $this->id_resource);
        $this->db->update('resource', $data);
    }
}

?>