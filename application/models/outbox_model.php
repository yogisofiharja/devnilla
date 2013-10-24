<?php

class Outbox_model extends CI_Model{
    var $id_contact='';
    var $subject='';
    var $content='';
    var $date_sent='';
    
   function all(){
        $q=$this->db->get('outbox');
        return $q->result();
    }
    
    function save($data){        
        $this->db->insert('outbox', $data);
    }

    function delete($id){
        $this->db->delete('outbox', array('outbox'=>$id));
    }
    
}
?>
