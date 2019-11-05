<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{

    public function EditPengguna($new_image)
    {

        $username = $this->input->post('email', true);
        $data = [
            'name' => $this->input->post('name', true),
            'phoneNumber' => $this->input->post('phoneNumber', true),
            'address' => $this->input->post('address', true),
            'image' => $new_image,
        ];
        $this->db->where('email', $username);
        $this->db->update('pengguna', $data);
    }
}
