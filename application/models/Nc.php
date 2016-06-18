<?php

class Nc extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function test(){
        $this->db->select('*');
        $this->db->limit(1);
        $query = $this->db->get('test');
        return $query->result_array();
        
    }

    public function insert($data){
        $this->db->insert('nce',$data);
    }
    public function getArticle($lesson){
        $this->db->select('lesson,title,content');
        $this->db->where('lesson', $lesson);
        $this->db->limit(1);
        return $this->db->get('nce')->result_array();
    }
}
