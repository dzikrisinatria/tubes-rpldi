<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth_customer extends CI_Model
{
    public function getCustomer($email)
    {
        return $this->db->get_where('customer', ['email' => $email])->row_array();
    }

    public function getObatCount()
    {
        $this->db->where('status', '1');
        $this->db->from('obat');
        return $this->db->count_all_results();
    }
    
    public function getPemesananCount()
    {
        return $this->db->count_all('pemesanan');
    }
    
    public function getPemesananNotConfirmedCount()
    {
        $this->db->where('status', '0');
        $this->db->from('pemesanan');
        return $this->db->count_all_results();
    }

    public function getPemesananNotConfirmed()
    {
        $this->db->join('customer','customer.id_customer = pemesanan.id_customer','LEFT OUTER');
        $this->db->where('status', '0');
        return $this->db->get('pemesanan')->result_array();
    }

    public function regdata($new_image)
    {
        $data = [
            'email'         => htmlspecialchars($this->input->post('email', true)),
            'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'nama'          => htmlspecialchars($this->input->post('nama', true)),
            'status'        => 2,
        ];

        $this->db->insert('customer', $data);
    }

    public function regdata2()
    {
        $data = [
            'id_customer'   => random_string('alnum', 5),
            'email'         => htmlspecialchars($this->input->post('email', true)),
            'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'nama'          => htmlspecialchars($this->input->post('nama', true)),
            'status'        => 2,
        ];

        $this->db->insert('customer', $data);
    }

    // public function getProfile($email)
    // {
    //     $this->db->join('user_role','user_role.role_id=user.role_id','LEFT OUTER');
    //     $this->db->where('email', $email);
    //     return $this->db->get('customer')->row_array();
    // }
}