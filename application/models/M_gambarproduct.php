<?php 
class M_gambarproduct extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }

    public function tampil_data(){
        $this->db->select('tb_product.*,COUNT(tb_gambar.id_product) as jumlah');
        $this->db->from('tb_product');
        $this->db->join('tb_gambar', 'tb_gambar.id_gambar = tb_product.id_kategori', 'left');
        $this->db->group_by('tb_product.id_product');
        $this->db->order_by('tb_product.id_product', 'ASC');
        return $this->db->get()->result();
    }

    public function detail($id_product){
        $this->db->select('*');
        $this->db->from('tb_product');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_product.id_kategori', 'left');
        $this->db->where('id_product', $id_product);
        return $this->db->get()->row();
    }
    

    public function get_data($id_gambar){
        $this->db->select('*');
        $this->db->from('tb_gambar');
        $this->db->where('id_gambar', $id_gambar);
        return $this->db->get()->row();
    }

    public function get_gambar($id_product){
        $this->db->select('*');
        $this->db->from('tb_gambar');
        $this->db->where('id_product', $id_product);
        return $this->db->get()->result();
    }
    
    public function add($data){
        $this->db->insert('tb_gambar', $data);
    }

    public function delete($data = []){
        $this->db->where('id_gambar', $data['id_gambar']);
        $this->db->delete('tb_gambar');
    }
}