<?php
class User_model extends CI_Model{
    var $id_user='';
    var $username='';
    var $password='';
    var $user_type_id='';
    
    function ceklogin(){
        $this->db->where('username',
        $this->input->post('username'));
        $this->db->where('password',
        md5($this->input->post('password')));
        
        $ambil=$this->db->get('user');
        if($ambil->num_rows==1){
            return true;
        }
    }
    
}

?>