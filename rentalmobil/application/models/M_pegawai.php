<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model
{
    public function getPegawai($email)
    {
        return $this->db->get_where('pegawai', ['email' => $email])->row_array();
    }
    
    public function getPegawaiById($id_pegawai)
    {
        return $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
    }

    public function getPegawaiCount()
    {
        $this->db->where('status', '1');
        $this->db->from('pegawai');
        return $this->db->count_all_results();
    }

    public function getAllPegawai()
    {
        $this->db->select("*");
        $this->db->from('pegawai');
        $this->db->join('role','role.id_role=pegawai.id_role','LEFT OUTER');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getPegawaiByRole($id_role)
    {
        $this->db->where('id_role', $id_role);
        $this->db->from('pegawai');
        $this->db->join('role','role.id_role=pegawai.id_role','LEFT OUTER');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDetailPegawai($id_pegawai)
    {
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->from('pegawai');
        $this->db->join('role','role.id_role=pegawai.id_role','LEFT OUTER');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllRole()
    {
		$this->db->select('*');
		$this->db->from('role');
		$query = $this->db->get();
		return $query->result_array();
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

    public function tambahPegawai($fotoprofil)
    {
        $data = [
            'id_pegawai'    => random_string('alnum', 5),
            'id_role'       => htmlspecialchars($this->input->post('id_role', true)),
            'foto_profil'   => $fotoprofil,
            'nama'          => htmlspecialchars($this->input->post('nama', true)),
            'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
            'tgl_lahir'     => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'alamat'        => htmlspecialchars($this->input->post('alamat', true)),
            'email'         => htmlspecialchars($this->input->post('email', true)),
            'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'status'        => 1,
        ];

        $this->db->insert('pegawai', $data);
    }
    
    public function tambahPegawaiDefault()
    {
        $data = [
            'id_pegawai'    => random_string('alnum', 5),
            'id_role'       => htmlspecialchars($this->input->post('id_role', true)),
            'foto_profil'   => 'default.png',
            'nama'          => htmlspecialchars($this->input->post('nama', true)),
            'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
            'tgl_lahir'     => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'alamat'        => htmlspecialchars($this->input->post('alamat', true)),
            'email'         => htmlspecialchars($this->input->post('email', true)),
            'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'status'        => 1,
        ];

        $this->db->insert('pegawai', $data);
    }

    public function updatePegawai($fotoprofil, $id_pegawai)
    {
        $data = [
            'id_pegawai'    => random_string('alnum', 5),
            'id_role'       => htmlspecialchars($this->input->post('id_role', true)),
            'foto_profil'   => $fotoprofil,
            'nama'          => htmlspecialchars($this->input->post('nama', true)),
            'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
            'tgl_lahir'     => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'alamat'        => htmlspecialchars($this->input->post('alamat', true)),
            'email'         => htmlspecialchars($this->input->post('email', true)),
        ];

        $this->db->set($data);
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->update('pegawai');
    }

    public function aktifkanPegawai($id_pegawai)
    {
        $data = ['status' => 1];
        $this->db->set($data);
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->update('pegawai');
    }

    public function hapusPegawai($id_pegawai)
    {
        $data = ['status'       => 0];
        $this->db->set($data);
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->update('pegawai');
    }

    public function tambahRole()
    {
        $data = [
            'nama_role' => $this->input->post('nama_role'),
            'status_role' => 1,
        ];
        $this->db->insert('role', $data);
    }
    
    public function ubahRole($id_role)
    {
        $data = ['nama_role' => $this->input->post('nama_role')];
        $this->db->set($data);
        $this->db->where('id_role', $id_role);
        $this->db->update('role');
    }

    public function aktifkanRole($id_role)
    {
        $data = ['status' => 1];
        $this->db->set($data);
        $this->db->where('id_role', $id_role);
        $this->db->update('pegawai');
        $this->db->set($data);
        $this->db->where('id_role', $id_role);
        $this->db->update('role');
    }

    public function nonaktifkanRole($id_role)
    {
        if ($id_role != 1 || $id_role != 2){
            $data = ['status_role' => 0];
            $this->db->set($data);
            $this->db->where('id_role', $id_role);
            $this->db->update('role');
            $data = ['status' => 0];
            $this->db->set($data);
            $this->db->where('id_role', $id_role);
            $this->db->update('pegawai');
        }
    }

    // public function getProfile($email)
    // {
    //     $this->db->join('user_role','user_role.role_id=user.role_id','LEFT OUTER');
    //     $this->db->where('email', $email);
    //     return $this->db->get('customer')->row_array();
    // }
}