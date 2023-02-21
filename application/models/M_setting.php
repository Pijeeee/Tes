<?php 
class M_setting extends CI_Model
{    
    public function edit($gambar){
        $data = array(
            'name'  => $this->input->post('name'),
            'username'   => $this->input->post('usernmae'),
            'email'     => $this->input->post('email'),
            'password'        => $this->input->post('password'),
            'gambar'        => $gambar
        );
        $this->db->where('id_pelanggan', $this->input->post('id_pelanggan'));
        $this->db->update('tb_pelanggan', $data);
    }
}