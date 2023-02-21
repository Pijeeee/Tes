<?php 
class M_kategori extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('tb_kategori')->result();
    }
    
    public function add($data)
    {
        $this->db->insert('tb_kategori', $data);
    }
    
    public function edit(){
        $data = [
            "kategori" => $this->input->post('kategori', true)
        ];
        $this->db->where('id_kategori', $this->input->post('id_kategori'));
        $this->db->update('tb_kategori', $data);
    }
    
    public function hapus($id_kategori){
        $this->db->delete('tb_kategori', ['id_kategori' => $id_kategori]);
    }

    public function tampil_dataproduct($id_kategori){
        $this->db->select('*');
        $this->db->from('tb_product');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_product.id_kategori', 'left');
        $this->db->where('tb_product.id_kategori', $id_kategori);
        return $this->db->get()->result();
    }

    public function kategoriid()
    {
        $this->db->select('COUNT(id_kategori) as kategori');
        $this->db->from('tb_product');
        $this->db->where('id_kategori=1');
        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get();
    }
}
