<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mobil extends CI_Model
{
    public function getAllmobil()
    {
        return $this->db->get('mobil')->result_array();
    }
    
    public function getmobilPagination($limit, $start, $keyword = null)
    {
        if ($keyword){
            $this->carimobil($keyword);
        }
		$this->db->join('jenis_mobil','jenis_mobil.id_jenis_mobil=mobil.id_jenis_mobil','LEFT OUTER');
		$query = $this->db->get('mobil', $limit, $start);
        return $query->result_array();
    }
    
    public function getmobilCustomerPagination($limit, $start, $keyword = null)
    {
        if ($keyword){
            $this->carimobil($keyword);
        }
        $this->db->where('status', '1');
		$this->db->join('jenis_mobil','jenis_mobil.id_jenis_mobil=mobil.id_jenis_mobil','LEFT OUTER');
		$query = $this->db->get('mobil', $limit, $start);
        return $query->result_array();
    }
    
    public function getJenismobilPagination($limit, $start, $keyword = null)
    {
        if ($keyword){
            $this->carijenis($keyword);
        }
		$query = $this->db->get('jenis_mobil', $limit, $start);
        return $query->result_array();
    }

    public function totalRowsPagination($keyword)
    {
        $this->carimobil($keyword);
        $this->db->where('status', '1');
        $this->db->join('jenis_mobil','jenis_mobil.id_jenis_mobil=mobil.id_jenis_mobil','LEFT OUTER');
        $this->db->from('mobil');
        return $this->db->count_all_results();
    }
    
    public function totalRowsJenisPagination($keyword)
    {
        $this->carijenis($keyword);
        $this->db->from('jenis_mobil');
        return $this->db->count_all_results();
    }

    public function getmobilById($id_mobil)
    {
        $this->db->join('jenis_mobil','jenis_mobil.id_jenis_mobil=mobil.id_jenis_mobil','LEFT OUTER');
        $this->db->where('id_mobil', $id_mobil);
        return $this->db->get('mobil')->row_array();
    }
    
    public function getJenisById($id_jenis_mobil)
    {
        $this->db->where('id_jenis_mobil', $id_jenis_mobil);
        return $this->db->get('jenis_mobil')->row_array();
    }

    public function getmobilCountByJenis($id_jenis_mobil)
    {
        $this->db->where('id_jenis_mobil', $id_jenis_mobil);
        $this->db->from('mobil');
        return $this->db->count_all_results();
    }

    public function getAllmobilAndJenis()
    {
		$this->db->select('*');
		$this->db->from('mobil');
		$this->db->join('jenis_mobil','jenis_mobil.id_jenis_mobil=mobil.id_jenis_mobil','LEFT OUTER');
		$query = $this->db->get();
		return $query->result_array();
    }
    
    public function getAllJenis()
    {
		$this->db->select('*');
		$this->db->from('jenis_mobil');
		$query = $this->db->get();
		return $query->result_array();
    }

    public function countAllmobil()
    {
        return $this->db->get('mobil')->num_rows();
    }
    
    public function hapusmobil($id_mobil)
    {
        $this->db->where('id_mobil', $id_mobil);
        return $this->db->delete('mobil');
    }

    public function hapusmobilboongan()
    {
        return $data = ['status'       => 0];
    }

     public function hapusJenismobil($id_jenis_mobil)
    {
        $this->db->where('id_jenis_mobil', $id_jenis_mobil);
        return $this->db->delete('jenis_mobil');
    }

    public function carimobil($keyword)
    {
        $this->db->like('kode_mobil', $keyword);
        $this->db->or_like('nama_mobil', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('stok', $keyword);
        $this->db->or_like('bentuk', $keyword);
        $this->db->or_like('fungsi', $keyword);
        $this->db->or_like('aturan', $keyword);
        $this->db->or_like('nama_jenis', $keyword);
    }
    
    public function carijenis($keyword)
    {
        $this->db->like('id_jenis_mobil', $keyword);
        $this->db->or_like('nama_jenis', $keyword);
    }

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

    public function adddatamobil($new_image)
    {
        $data = [
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

    public function editdatajenismobil()
    {
        return $data = [
            'id_jenis_mobil' => $this->input->post('id_jenis_mobil'),
            'nama_jenis' => $this->input->post('nama_jenis')
        ];
    }

    public function updatemobil($data,$id_mobil)
    {
        $this->db->set($data);
        $this->db->where('id_mobil', $id_mobil);
        $this->db->update('mobil');
    }

    public function updateJenismobil($data,$id_jenis_mobil)
    {
        $this->db->set($data);
        $this->db->where('id_jenis_mobil', $id_jenis_mobil);
        $this->db->update('jenis_mobil');
    }
    public function updateStokmobil($id, $stok)
    {
        $this->db->query("UPDATE `mobil` SET `stok` = ".$stok." WHERE `mobil`.`id_mobil` = ".$id.";");
    }
}
