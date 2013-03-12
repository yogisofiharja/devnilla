<?php
class Category_model extends CI_Model{
    var $id_category='';
    var $name='';
    var $description='';
    
    function all(){
        $q=$this->db->get('category');
        return $q->result();
    }
    
    function get_by($key, $value){
        $q=$this->db->get_where('category', array($key=>$value));
        $data=$q->result();
        $this->id_category=$data[0]->id_category;
        $this->name=$data[0]->name;
        $this->description=$data[0]->description;
        return $this;
    }
    function save(){
        $data=array(
            'name'=> $this->name,
            'description'=> $this->description
        );
        $this->db->insert('category', $data);
    }
    function delete($id){
        $this->db->delete('category', array('id_category'=>$id));
    }
    function update(){
        $data=array(
            'name'=>$this->name,
            'description'=>$this->description
        );
        $this->db->where('id_category', $this->id_category);
        $this->db->update('category', $data);
    }
}

?>