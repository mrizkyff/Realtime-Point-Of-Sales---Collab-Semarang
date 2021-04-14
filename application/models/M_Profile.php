<?php 
    class M_Profile extends CI_Model{
        public function get_profile($id){
            $this->db->where('id',$id);
            return $this->db->get('tb_tenant')->row();
        }
        public function update($id,$data){
            $this->db->where('id',$id);
            return $this->db->update('tb_tenant',$data);
        }
    }
?>