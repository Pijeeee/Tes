<?php 
class M_blog extends CI_Model
{
    public function lists($id_blog){
        return $this->db->get_where('tb_blog' , ['id_blog' => $id_blog])->result();
    }

    public function detail($id_blog){
        $id_blog = $this->input->post('id_blog');
        return $this->db->get_where('tb_blog' , ['id_blog' => $id_blog])->row();
    }

    public function tampil_data(){
        return $this->db->get('tb_blog')->result();
    }

    public function tampil_dataById(){
        return $this->db->get('tb_blog')->result();
    }
    
    public function add($data){
        $this->db->insert('tb_blog', $data);
    }
        
    public function edit($gambar){
        $data = array(
            'judul'         => $this->input->post('judul'),
            'tanggal'       => $this->input->post('tanggal'),
            'alamat'        => $this->input->post('alamat'),
            'keterangan'    => $this->input->post('keterangan'),
            'gambar'        => $gambar
        );
        $this->db->where('id_blog', $this->input->post('id_blog'));
        $this->db->update('tb_blog', $data);
    }
    
    public function delete($data){
        $this->db->where('id_blog', $data['id_blog']);
        $this->db->delete('tb_blog',$data);
    }
}
