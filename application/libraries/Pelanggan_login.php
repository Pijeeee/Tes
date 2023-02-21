<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('M_pelanggan');
        $this->ci->load->model('M_auth');
    }

    // public function login($email)
    // {
    //     $cek = $this->ci->M_auth->login_pelanggan($email);
    //     if ($cek) {
    //         $password   = $this->ci->input->post('password');

    //         if(password_verify($password, $cek->password)):
    //             $name       = $cek->name;
    //             $email      = $cek->email;
    //             $level_user = $cek->level_user;
    //             //buat session
    //             $this->ci->session->set_userdata('name', $name);
    //             $this->ci->session->set_userdata('email', $email);
    //             redirect('home');
    //         endif;
            
    //     }
    //         //jika salah
    //         $this->ci->session->set_flashdata('error', 'Email Atau Password Salah !!!');
    //         redirect('pelanggan/login');
        
    // }

    public function login($email, $password)
    {
        $cek = $this->ci->M_auth->login_pelanggan($email, $password);
        if ($cek) {
            $id_pelanggan   = $cek->id_pelanggan;
            $name           = $cek->name;
            $email          = $cek->email;
            // $level_user = $cek->level_user;
            //buat session
            $this->ci->session->set_userdata('id_pelanggan', $id_pelanggan);
            $this->ci->session->set_userdata('name', $name);
            $this->ci->session->set_userdata('email', $email);
            redirect('home');
        } else {
            //jika salah
            $this->ci->session->set_flashdata('error', 'Email Atau Password Salah !!!');
            redirect('auth/login');
        }
    }

    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('name') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login !!!');
            redirect('pelanggan/login');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('id_pelanggan');
        $this->ci->session->unset_userdata('name');
        $this->ci->session->unset_userdata('email');
        $this->ci->session->set_userdata('pesan', 'Anda Berhasil Logout !!');
        redirect('pelanggan/login');
    }
}