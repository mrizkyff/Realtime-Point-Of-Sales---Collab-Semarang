<?php
    class M_Tenant extends CI_Model
    {
        public function get_all_user(){
            return $this->db->get('tb_tenant')->result();
        }
        public function get_by_id($id){
            $this->db->where('id',$id);
            return $this->db->get('tb_tenant')->result();
        }
        public function update_user($where,$data){
            $this->db->where($where);
            return $this->db->update('tb_tenant',$data);
        }
        public function delete_user($id){
            $hasil = $this->db->delete('tb_tenant',array('id' => $id));
            return $hasil;
        }
    }
    
?>