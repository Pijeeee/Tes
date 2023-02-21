<?php 
class M_product extends CI_Model
{
    public $id_product;

    public function __construct(){
        parent::__construct();
    }

    public function tampil_data(){
        $this->db->select('*');
        $this->db->from('tb_product');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_product.id_kategori', 'left');
        $this->db->order_by('id_product', 'ASC');
        return $this->db->get()->result();
    }

    public function detail(){
        $id_product = $this->input->post('id_product');
        $this->db->select('*');
        $this->db->from('tb_product');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_product.id_kategori', 'left');
        $this->db->where('id_product', $id_product);
        return $this->db->get()->result();
    }

    public function product_detail($id_product){
        $this->db->select('*');
        $this->db->from('tb_product');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_product.id_kategori', 'left');
        $this->db->where('id_product', $id_product);
        return $this->db->get()->result();
    }   

    public function detail_product($id_product){
        $this->db->select('*');
        $this->db->from('tb_product');
        $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_product.id_kategori', 'left');
        $this->db->where('id_product', $id_product);
        return $this->db->get()->row();
    }

    public function tampil_dataById($id_product){
        return $this->db->get_where('tb_product' , ['id_product' => $id_product])->row();
    }

    public function add($data){
        $this->db->insert('tb_product', $data);
    }
    
    public function edit($gambar){
        $data = array(
            'nama_product'  => $this->input->post('nama_product'),
            'id_kategori'   => $this->input->post('id_kategori'),
            'ketebalan'     => $this->input->post('ketebalan'),
            'ukuran'        => $this->input->post('ukuran'),
            'harga'         => $this->input->post('harga'),
            'keterangan'    => $this->input->post('keterangan'),
            'detail'        => $this->input->post('detail'),
            'gambar'        => $gambar
        );
        $this->db->where('id_product', $this->input->post('id_product'));
        $this->db->update('tb_product', $data);
    }
    
    public function delete($data){
        $this->db->where('id_product', $data['id_product']);
        $this->db->delete('tb_product',$data);
    }

    public function total_produk()
    {
        return $this->db->get('tb_product')->num_rows();
    }
}
