<?php
    class Tenant extends CI_Controller
    {
        public function __construct(){
            parent::__construct();
            $this->load->model('M_Tenant','Tenant');
        }
        public function do_upload()
        {
            // membuat kombinasi kode
            $config['upload_path']          = './asset/img/user/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['encrypt_name']        = TRUE;
            

            $this->load->library('upload', $config);
            if($this->upload->do_upload('foto')){

                $upload_data = $this->upload->data();
                
                
                $nama_foto = $upload_data['file_name'];
                $data = array(
                    'f_name' => $this->input->post('fname'),
                    'l_name' => $this->input->post('lname'),
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'email' => $this->input->post('email'),
                    'telp' => $this->input->post('telp'),
                    'level' => $this->input->post('role1'),
                    'alamat' => $this->input->post('alamat'),
                    'foto' => $nama_foto,
                    'tgl_registrasi' => date('Y-m-d H:i:s'),
                    'status' => $this->input->post('status1'),
                );

                $hasil = $this->Tenant->save_user($data);
                echo json_encode($data);
            }

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