<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_login{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('M_auth');
    }

    public function login($username, $password)
    {
        $cek = $this->ci->M_auth->login_user($username, $password);
        if ($cek) {
            $nama_user  = $cek->nama_user;
            $username   = $cek->username;
            $level_user = $cek->level_user;
            //buat session
            $this->ci->session->set_userdata('name', $nama_user);
            $this->ci->session->set_userdata('email', $username);
            $this->ci->session->set_userdata('level_user', $level_user);
            redirect('admin/dashboard');
        } else {
            //jika salah
            $this->ci->session->set_flashdata('error', 'Email Atau Password Salah !!!');
            redirect('auth/login_user');
        }
    }

    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('name') == "") {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login !!!');
            redirect('auth/login_user');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('name');
        $this->ci->session->unset_userdata('email');
        $this->ci->session->unset_userdata('level_user');
        $this->ci->session->set_userdata('pesan', 'Anda Berhasil Logout !!');
        redirect('auth/login_user');
    }
}