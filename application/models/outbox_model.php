<?php

class Outbox_model extends CI_Model{
    var $id_contact='';
    var $subject='';
    var $content='';
    var $date_sent='';
    
   function all(){
        $q="select c.email, o.* from contactus c, outbox o where o.id_contact = c.id_contact order by date_sent desc";
        return $this->db->query($q)->result();
    }
    
    function save($data){        
        $this->db->insert('outbox', $data);
    }

    function delete($id){
        $this->db->delete('outbox', array('outbox'=>$id));
    }
    function get_by($key, $value){
        $q="select c.email, c.name, o.* from contactus c, outbox o where o.id_contact = c.id_contact and $key=$value order by date_sent desc";
        return $this->db->query($q)->result();
    }
}
?>
