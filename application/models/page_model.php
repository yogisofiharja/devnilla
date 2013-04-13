<?php
class Page_model extends CI_Model{
    var $id_page='';
    var $section='';
    var $title=''; 
	var $description='';
    var $content='';
    
    function all(){
        $q=$this->db->get('page');
        return $q->result();
    }
    function get_by($key, $value){
        $q=$this->db->get_where('page', array($key=>$value));
        $data=$q->result();
        $this->id_page=$data[0]->id_page;
        $this->section=$data[0]->section;
        $this->title=$data[0]->title;
        $this->description=$data[0]->description;
        $this->content=$data[0]->content;
        return $this;        
    }
    function save(){
        $data=array(
            'section'=> $this->section,
            'title'=> $this->title,
            'description'=> $this->description,
            'content'=> $this->content
        );
        $this->db->insert('page', $data);
    }
    function delete($id){
        $this->db->delete('page',array('id_page'=>$id));
    }
    function update(){
        $data=array(
            'section'=>$this->section,
            'title'=>$this->title,
            'description'=>$this->description,
            'content'=>$this->content
        );
        $this->db->where('id_page',$this->id_page);
        $this->db->update('page', $data);
    }
    
}

?>