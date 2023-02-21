<?php 
class M_user extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('tb_pelanggan')->result();
    }
    
    public function add($data)
    {
        $this->db->insert('tb_pelanggan', $data);
    }
    
    public function edit(){
        $data = [
            "name"      => $this->input->post('name', true),
            "email"     => $this->input->post('email', true),
            "password"  => $this->input->post('password', true),
        ];
        $this->db->where('id_pelanggan', $this->input->post('id_pelanggan'));
        $this->db->update('tb_pelanggan', $data);
    }
    
    public function hapus($id_pelanggan){
        $this->db->delete('tb_pelanggan', ['id_pelanggan' => $id_pelanggan]);
    }
}
