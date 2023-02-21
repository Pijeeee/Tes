<?php

class Post extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    
    public function index()
    {
        $data = array(
            'user'             => $this->db->get_where('account', ['username' => $this->session->userdata('username')])->row_array(),
            'post'             => $this->M_post->all_post()
        );
        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/v_post', $data);
        $this->load->view('template/footer');
    }
}
