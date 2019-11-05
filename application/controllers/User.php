<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->library('form_validation');
    }
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
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where(
            'pengguna',
            ['email' => $this->session->userdata('email')]
        )
            ->row_array();

        $this->load->view('templates/user_header', $data);
        $this->load->view('user/profile');
        $this->load->view('templates/user_footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where(
            'pengguna',
            ['email' => $this->session->userdata('email')]
        )
            ->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/user_header', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/user_footer');
        } else {


            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '22048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $this->M_User->EditPengguna($new_image);


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			You profile has been updated ! </div>');
            redirect('user/edit');
        }
    }
}
