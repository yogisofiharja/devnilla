<?php

class Contactus_model extends CI_Model{
    var $id_contact='';
    var $name='';
    var $company='';
    var $website='';
    var $email='';
    var $content='';
    var $date_post='';
    
   function all(){
        $q=$this->db->get('contactus');
        
        return $q->result();
    }
    
    function get_by($key, $value){
        $q=$this->db->get_where('contactus', array($key=>$value));
        $data=$q->result();
        $this->id_contact=$data[0]->id_contact;
        $this->name=$data[0]->name;
        $this->company=$data[0]->company;
        $this->website=$data[0]->website;
        $this->content=$data[0]->content;
        $this->date_post = $data[0]->date_post;
        
        return $this;
    }
    // function save(){
    //     $data=array(
    //         'name'=> $this->name,
    //         'company'=> $this->company,
    //         'website'=> $this->website,
    //         'email'=> $this->email,
    //         'content'=> $this->content,
    //         'date_post'=>$this->date_post
    //     );
    //     $this->db->insert('contactus', $data);
    // }
    function save($data){        
        $this->db->insert('contactus', $data);
    }

    function delete($id){
        $this->db->delete('contactus', array('id_contact'=>$id));
    }
    
    function update(){
        $data=array(
            'name'=> $this->name,
            'email'=> $this->email,
            'content'=> $this->content,
            'date_post'=>$this->date_post
        );
        
        $this->db->where('id_contact', $this->id_contact);
        $this->db->update('contactus', $data);
    }
    
}
?>
