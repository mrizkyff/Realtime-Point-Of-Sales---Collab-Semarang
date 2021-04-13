<?php
    class Product extends CI_Controller
    {
        public function __construct(){
            parent::__construct();
            $this->load->model('M_Product');
        }
        public function getAllProduk(){
            $data = $this->M_Product->get_all_product();
            echo json_encode($data);
        }
        public function getByCode(){
            $id = $this->input->post('id');
            $hasil = $this->M_Product->get_by_id($id);
            echo json_encode($hasil);
        }

        public function do_upload()
        {
            $tanggal = date('Y-m-d H:i:s');
            $nmbrg = $this->input->post('nmbrg');
            $hrg = $this->input->post('hrg');
            $desc = $this->input->post('desc');
            $jenis = $this->input->post('jenis');

            // membuat kombinasi kode
            $kode = date('Ymd');
            $jam = date('Hi');
            $kode = $kode.'CPGS'.$jenis.$jam;

                $config['upload_path']          = './asset/img/food/';
                $config['allowed_types']        = 'jpg|png|jpeg';
                $config['encrypt_name']        = TRUE;
               

                $this->load->library('upload', $config);
                if($this->upload->do_upload('foto')){

                    $upload_data = $this->upload->data();
                    
                    
                    $nama = $upload_data['file_name'];

                    $data = array(
                        'nmbrg' => $nmbrg,
                        'kdbrg' => $kode,
                        'jenis' => $jenis,
                        'harga' => $hrg,
                        'deskripsi' => $desc,
                        'tgl_stok' => $tanggal,
                        'gambar' => $nama,
                    );
                    
                    
                    $hasil = $this->M_Product->save_product($data);
                    echo json_encode($hasil);
                }
        }
        
        public function delete(){
            $id = $this->input->post('id');
            $hasil = $this->M_Product->delete_product($id);
            echo json_encode($hasil);
        }
        public function update(){
            $id = $this->input->post('id');
            $tanggal = date('Y-m-d H:i:s');
            $nmbrg = $this->input->post('nmbrg');
            $jenis = $this->input->post('jenis');
            $hrg = $this->input->post('hrg');
            $desc = $this->input->post('desc');

            $data = array(
                'nmbrg' => $nmbrg,
                'jenis' => $jenis,
                'harga' => $hrg,
                'deskripsi' => $desc,
                'tgl_stok' => $tanggal,
            );
            $result = $this->M_Product->update_product($data,$id);
            echo json_encode($result);
            // print_r($data);
        }


    }
    
?>
        