<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model
{
    // GET ALL
    public function getAllCustomer()
    {
		$this->db->select('*');
		$this->db->from('customer');
		$query = $this->db->get();
		return $query->result_array();
    } 
    
    public function getAllJenisNonaktif()
    {
        $this->db->join('jenis_mobil','jenis_mobil.id_jenis=mobil.id_jenis','LEFT OUTER');
        $this->db->where('status_jenis', 0);
		$this->db->from('mobil');
		$query = $this->db->get();
		return $query->row_array();
    } 
    
    public function getAllMerkMobil()
    {
		$this->db->select('*');
		$this->db->from('merk');
		$query = $this->db->get();
		return $query->result_array();
    }
    
    public function getAllSeriMobil()
    {
		$this->db->select('*');
		$this->db->from('seri');
        $this->db->join('merk','merk.id_merk=seri.id_merk','LEFT OUTER');
		$query = $this->db->get();
		return $query->result_array();
    }

    // GET BY ID
    public function getCustomerById($id_customer)
    {
        $this->db->where('id_customer', $id_customer);
        return $this->db->get('customer')->row_array();
    }
    
    public function getCustomerByEmail($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('customer')->row_array();
    }
    
    public function getMobilByJenis($id_jenis)
    {
        $this->db->join('seri','seri.id_seri=mobil.id_seri','LEFT OUTER');
        $this->db->join('merk','merk.id_merk=mobil.id_merk','LEFT OUTER');
        $this->db->join('jenis_mobil','jenis_mobil.id_jenis=mobil.id_jenis','LEFT OUTER');
        $this->db->where('id_jenis', $id_jenis);
        return $this->db->get('mobil')->row_array();
    }
    
    public function getJenisById($id_jenis)
    {
        $this->db->where('id_jenis', $id_jenis);
        return $this->db->get('jenis_mobil')->row_array();
    }
    
    public function getSeriById($id_seri)
    {
        $this->db->where('id_seri', $id_seri);
        return $this->db->get('seri')->row_array();
    }
    
    public function getSeriByMerk($id_merk)
    {
        $this->db->where('id_merk', $id_merk);
        return $this->db->get('seri')->row_array();
    }
    
    public function getMerkById($id_merk)
    {
        $this->db->where('id_merk', $id_merk);
        return $this->db->get('merk')->row_array();
    }

    // GET COUNT
    public function getmobilCountByJenis($id_jenis_mobil)
    {
        $this->db->where('id_jenis_mobil', $id_jenis_mobil);
        $this->db->from('mobil');
        return $this->db->count_all_results();
    }

    public function countAllMobil()
    {
        return $this->db->get('mobil')->num_rows();
    }
    
    // HAPUS
    public function nonaktifkanCustomer($id_customer)
    {
        $this->db->set('status', 0);
        $this->db->where('id_customer', $id_customer);
        $this->db->update('customer');
    }
    
    public function aktifkanCustomer($id_customer)
    {
        $this->db->set('status', 2);
        $this->db->where('id_customer', $id_customer);
        $this->db->update('customer');
    }

    public function nonaktifkanserimobil($id_seri)
    {
        $this->db->set('status_pinjaman', 0);
        $this->db->where('id_seri', $id_seri);
        $this->db->update('mobil');
        $this->db->set('status_seri', 0);
        $this->db->where('id_seri', $id_seri);
        $this->db->update('seri');
    }
    
    public function aktifkanserimobil($id_seri)
    {
        $this->db->set('status_pinjaman', 2);
        $this->db->where('id_seri', $id_seri);
        $this->db->update('mobil');
        $this->db->set('status_seri', 1);
        $this->db->where('id_seri', $id_seri);
        $this->db->update('seri');
    }

    public function nonaktifkanmerkmobil($id_merk, $id_seri)
    {
        $this->nonaktifkanserimobil($id_seri);
        $this->db->set('status_merk', 0);
        $this->db->where('id_merk', $id_merk);
        $this->db->update('merk');
    }
    
    public function aktifkanmerkmobil($id_merk, $id_seri)
    {
        $this->aktifkanserimobil($id_seri);
        $this->db->set('status_merk', 1);
        $this->db->where('id_merk', $id_merk);
        $this->db->update('merk');
    }

    public function nonaktifkanjenismobil($id_jenis)
    {
        $this->db->set('status_pinjaman', 0);
        $this->db->where('id_jenis', $id_jenis);
        $this->db->update('mobil');
        $this->db->set('status_jenis', 0);
        $this->db->where('id_jenis', $id_jenis);
        $this->db->update('jenis_mobil');
    }
    
    public function aktifkanjenismobil($id_jenis)
    {
        $this->db->set('status_pinjaman', 2);
        $this->db->where('id_jenis', $id_jenis);
        $this->db->update('mobil');
        $this->db->set('status_jenis', 1);
        $this->db->where('id_jenis', $id_jenis);
        $this->db->update('jenis_mobil');
    }

    // UPDATE
    public function editdatamobil($new_image)
    {
        return $data = [
            'kode_mobil'         => $this->input->post('kode_mobil'),
            'nama_mobil'         => $this->input->post('nama_mobil'),
            'harga'             => $this->input->post('harga'),
            'stok'              => $this->input->post('stok'),
            'bentuk'            => $this->input->post('bentuk'),
            'fungsi'            => $this->input->post('fungsi'),
            'aturan'            => $this->input->post('aturan'),
            'gambar'            => $new_image,
            'id_jenis_mobil'     => $this->input->post('id_jenis_mobil'),
            'status'            => $this->input->post('status')
        ];
    }

    public function editdatajenismobil()
    {
        return $data = [
            'id_jenis_mobil' => $this->input->post('id_jenis_mobil'),
            'nama_jenis' => $this->input->post('nama_jenis')
        ];
    }

    public function updatemerkmobil($id_merk)
    {
        $this->db->set('nama_merk', $this->input->post('nama_merk'));
        $this->db->where('id_merk', $id_merk);
        $this->db->update('merk');
    }
    
    public function updateserimobil($id_seri)
    {
        $data = [
            'id_merk'   => $this->input->post('id_merk'),
            'nama_seri' => $this->input->post('nama_seri'),
        ];
        $this->db->set($data);
        $this->db->where('id_seri', $id_seri);
        $this->db->update('seri');
    }
    
    public function updatejenismobil($id_jenis)
    {
        $this->db->set('nama_jenis', $this->input->post('nama_jenis'));
        $this->db->where('id_jenis', $id_jenis);
        $this->db->update('jenis_mobil');
    }

    public function verifikasiCustomer($id_customer)
    {
        $data = [
            'email'         => htmlspecialchars($this->input->post('email')),
            'nama'          => htmlspecialchars($this->input->post('nama')),
            'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')),
            'alamat'        => htmlspecialchars($this->input->post('alamat')),
            'nik'           => htmlspecialchars($this->input->post('nik')),
            'no_sim'        => htmlspecialchars($this->input->post('no_sim')),
            'no_hp'         => htmlspecialchars($this->input->post('no_hp')),
            'status'        => 2,
        ];

        $this->db->set($data);
        $this->db->where('id_customer', $id_customer);
        $this->db->update('customer');
    }

    // ADD DATA
    public function tambahmobil()
    {
        $data = [
            'id_mobil'      => random_string('alnum', 5),
            'id_seri'       => htmlspecialchars($this->input->post('id_seri')),
            'id_jenis'      => htmlspecialchars($this->input->post('id_jenis')),
            'warna'         => htmlspecialchars($this->input->post('warna')),
            'tahun'         => htmlspecialchars($this->input->post('tahun')),
            'plat_nomor'    => htmlspecialchars(strtoupper($this->input->post('plat_nomor'))),
            'nomor_rangka'  => htmlspecialchars(strtoupper($this->input->post('nomor_rangka'))),
            'nomor_mesin'   => htmlspecialchars(strtoupper($this->input->post('nomor_mesin'))),
            'harga'         => htmlspecialchars($this->input->post('harga')),
            'status_pinjaman' => 2,
        ];
        $this->db->insert('mobil', $data);
    }

    public function adddatajenismobil()
    {
        $data = [
            'id_jenis_mobil' => $this->input->post('id_jenis_mobil'),
            'nama_jenis' => $this->input->post('nama_jenis')
        ];
        $this->db->insert('jenis_mobil', $data);
    }
    
    public function tambahmerkmobil()
    {
        $data = [
            'nama_merk' => $this->input->post('nama_merk'),
            'status_merk' => 1
        ];
        $this->db->insert('merk', $data);
    }
    
    public function tambahjenismobil()
    {
        $data = [
            'nama_jenis' => $this->input->post('nama_jenis'),
            'status_jenis' => 1
        ];
        $this->db->insert('jenis_mobil', $data);
    }
    
    public function tambahserimobil()
    {
        $data = [
            'id_merk' => $this->input->post('id_merk'),
            'nama_seri' => $this->input->post('nama_seri'),
            'status_seri' => 1
        ];
        $this->db->insert('seri', $data);
    }
}
