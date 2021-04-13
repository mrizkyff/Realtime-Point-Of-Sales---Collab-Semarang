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
        // untuk menampilkan data ke dtatables dengan serverside
		function json() {
			// jangan pakai bintang nanti tidak bisa search
			$this->datatables->select('id_produk, kdbrg, jenis, nmbrg, harga, deskripsi, tgl_stok, gambar, tersedia, id_tenant');
			$this->datatables->from('tb_produk');
            $this->datatables->add_column('gambar','<img src="http://localhost/collab_pos/asset/img/food/$1" class="img-thumbnail" alt="">', 'gambar');
			$this->datatables->add_column('aksi', '
			<a href="javascript:void(0);" class="edit_record badge badge-info" data-id="$1" data-kdbrg="$2" data-jenis="$3" data-nmbrg="$4" data-harga="$5" data-deskripsi="$6" data-tersedia="$9"><i class="fas fa-edit lead"></i> Edit</a>
			<a href="javascript:void(0);" class="hapus_record badge badge-danger" data-id="$1" data-nmbrg="$4"><i class="fas fa-trash-alt lead"></i> Hapus</a>
			','id_produk, kdbrg, jenis, nmbrg, harga, deskripsi, tgl_stok, gambar, tersedia, id_tenant');
            

			return $this->datatables->generate();
		}
        
    }
    