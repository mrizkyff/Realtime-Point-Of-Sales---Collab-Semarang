<?php
    class M_Login extends CI_Model
    {
        public function cek_login($data){
            $this->db->where($data);
            return $this->db->get('tb_tenant');
        }
        public function find_id($data){
            $this->db->where($data);
            $this->db->select('id');
            return $this->db->get('tb_tenant')->result();
        }
        public function find_level($data){
            $this->db->where($data);
            $this->db->select('level');
            $this->db->select('foto');
            $this->db->select('status');
            return $this->db->get('tb_tenant')->result();
        }
        
    }
    
?>