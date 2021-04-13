<?php
    class M_Product extends CI_Model
    {
        public function __construct(){
            parent::__construct();
        }
        public function get_all_product(){
            return $this->db->get('tb_produk')->result();
        }
        public function get_by_id($id){
            $this->db->where('id_produk',$id);
            $result = $this->db->get('tb_produk');
            return $result->result();
        }
        public function save_product($data){
            $result = $this->db->insert('tb_produk',$data);
            return $result;
        }
        public function delete_product($id){
            $this->db->where('id_produk',$id);
            $result = $this->db->delete('tb_produk');
            return $result;
        }
        public function update_product($data,$id){
            $this->db->where('id_produk',$id);
            $result = $this->db->update('tb_produk',$data);
            return $result;
        }
        
    }
    
?>