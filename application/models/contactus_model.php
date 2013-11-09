<?php

class Contactus_model extends CI_Model{
    var $id_contact='';
    var $name='';
    var $company='';
    var $website='';
    var $email='';
    var $content='';
    var $date_post='';
    var $status='';
    
   function all(){
        return $this->db->query("SELECT * FROM  contactus ORDER BY  date_post DESC ")->result();       
    }
    
    function get_by($key, $value){
        $q=$this->db->get_where('contactus', array($key=>$value));
        $data=$q->result();
        $this->id_contact=$data[0]->id_contact;
        $this->name=$data[0]->name;
        $this->company=$data[0]->company;
        $this->email=$data[0]->email;
        $this->status=$data[0]->status;
        $this->website=$data[0]->website;
        $this->content=$data[0]->content;
        $this->date_post = $data[0]->date_post;
        
        return $this;
    }

    function get_unread(){
        // $this->db->select('*','select count(name) as jumlah from contactus where status=0', FALSE);
        $this->db->order_by("date_post", "desc"); 
        $this->db->where('status', 0);
        $this->db->from('contactus');
        return $this->db->get()->result();
    }

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
            'date_post'=>$this->date_post,
            'status'=>$this->status
        );
        
        $this->db->where('id_contact', $this->id_contact);
        $this->db->update('contactus', $data);
    }

    function setRead($id){
        $data=array(
            'status'=>1
        );
        $this->db->where('id_contact', $id);
        $this->db->update('contactus', $data);
    }
    
}
?>
