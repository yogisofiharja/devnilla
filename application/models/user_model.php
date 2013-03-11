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
    function all(){
        $q=$this->db->get('user');
        return $q->result();
    }
    function get_by($key, $value){
        $q=$this->db->get_where('user', array($key=>$value));
        $data=$q->result();
        $this->id_user=$data[0]->id_user;
        $this->username=$data[0]->username;
        $this->password=$data[0]->password;
        $this->email=$data[0]->email;
        $this->full_name=$data[0]->full_name;
        return $this;        
    }
    function save(){
        $data=array(
            'username'=> $this->username,
            'password'=> $this->password,
            'full_name'=> $this->full_name,
            'email'=> $this->email
        );
        $this->db->insert('user', $data);
    }
    function delete($id){
        $this->db->delete('user',array('id_user'=>$id));
    }
    function update(){
        $data=array(
            'username'=>$this->username,
            'full_name'=>$this->full_name,
            'email'=>$this->email
        );
        $this->db->where('id_user',$this->id_user);
        $this->db->update('user', $data);
    }
    
}

?>