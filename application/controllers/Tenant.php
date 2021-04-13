<?php
    class Tenant extends CI_Controller
    {
        public function __construct(){
            parent::__construct();
            $this->load->model('M_Tenant','Tenant');
        }
        public function saveTalent(){
            
        }
        public function getAllTenant(){
            $hasil = $this->Tenant->get_all_user();
            echo json_encode($hasil);
        }
        public function getTenantById(){  
            $id = $this->input->post('id');
            $hasil = $this->Tenant->get_by_id($id);
            echo json_encode($hasil);
        }
        public function updateTenant(){
            $id = $this->input->post('id');
            $level = $this->input->post('level');
            $status = $this->input->post('status');

            $where = array(
                'id' => $id
            );

            $data = array(
                'level' => $level,
                'status' => $status
            );
            $hasil = $this->Tenant->update_user($where,$data);
            echo json_encode($hasil);
        }
        public function resetpassword(){    
            $id = $this->input->post('id');
            $password = $this->input->post('password');

            $where = array(
                'id' => $id
            );

            $data = array(
                'password' => $password
            );

            $hasil = $this->Tenant->update_user($where,$data);
            echo json_encode($hasil);
        }
        public function deleteTenant(){
            $id = $this->input->post('id');
            $hasil = $this->Tenant->delete_user($id);
            echo json_encode($hasil);
        }
    }
    
?>