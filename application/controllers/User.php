<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where(
            'pengguna',
            ['email' => $this->session->userdata('email')]
        )
            ->row_array();

        $this->load->view('templates/user_header', $data);
        $this->load->view('user/index');
        $this->load->view('templates/user_footer');
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where(
            'pengguna',
            ['email' => $this->session->userdata('email')]
        )
            ->row_array();

        $this->load->view('templates/user_header', $data);
        $this->load->view('user/profile');
        $this->load->view('templates/user_footer');
    }
}
