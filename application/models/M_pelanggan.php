<?php 
class M_pelanggan extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }

    public function register($data)
    {
        $this->db->insert('tb_pelanggan', $data);
    }

    public function login($email, $password)
    {
        $this->db->select('*');
        $this->db->from('tb_pelanggan');
        $this->db->where(array(
            'email'     => $email,
            'password'  => SHA1($password)
        ));
        return $this->db->get()->row();
    }

    public function tampil_data()
    {
        return $this->db->get('tb_pelanggan');
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
        $this->db->where('id_pelanggan', $this->input->post('id_pelanggan'));
        $this->db->update('tb_pelanggan', $data);
    }

    public function total_pelanggan()
    {
        $this->db->select('*');
        $this->db->from('tb_pelanggan');
        $this->db->where('role_id=2');
        $this->db->order_by('id_pelanggan', 'desc');
        return $this->db->get()->num_rows();
    }
}