<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    public function getAlltransaksi()
    {
        return $this->db->get('transaksi')->result_array();
    }
    
    public function gettransaksiPagination($limit, $start, $keyword = null)
    {
        if ($keyword){
            $this->caritransaksi($keyword);
        }
		$this->db->join('jenis_transaksi','jenis_transaksi.id_jenis_transaksi=transaksi.id_jenis_transaksi','LEFT OUTER');
		$query = $this->db->get('transaksi', $limit, $start);
        return $query->result_array();
    }
    
    public function gettransaksiCustomerPagination($limit, $start, $keyword = null)
    {
        if ($keyword){
            $this->caritransaksi($keyword);
        }
        $this->db->where('status', '1');
		$this->db->join('jenis_transaksi','jenis_transaksi.id_jenis_transaksi=transaksi.id_jenis_transaksi','LEFT OUTER');
		$query = $this->db->get('transaksi', $limit, $start);
        return $query->result_array();
    }
    
    public function getJenistransaksiPagination($limit, $start, $keyword = null)
    {
        if ($keyword){
            $this->carijenis($keyword);
        }
		$query = $this->db->get('jenis_transaksi', $limit, $start);
        return $query->result_array();
    }

    public function totalRowsPagination($keyword)
    {
        $this->caritransaksi($keyword);
        $this->db->where('status', '1');
        $this->db->join('jenis_transaksi','jenis_transaksi.id_jenis_transaksi=transaksi.id_jenis_transaksi','LEFT OUTER');
        $this->db->from('transaksi');
        return $this->db->count_all_results();
    }
    
    public function totalRowsJenisPagination($keyword)
    {
        $this->carijenis($keyword);
        $this->db->from('jenis_transaksi');
        return $this->db->count_all_results();
    }

    public function gettransaksiById($id_transaksi)
    {
        $this->db->join('jenis_transaksi','jenis_transaksi.id_jenis_transaksi=transaksi.id_jenis_transaksi','LEFT OUTER');
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get('transaksi')->row_array();
    }
    
    public function getJenisById($id_jenis_transaksi)
    {
        $this->db->where('id_jenis_transaksi', $id_jenis_transaksi);
        return $this->db->get('jenis_transaksi')->row_array();
    }

    public function gettransaksiCountByJenis($id_jenis_transaksi)
    {
        $this->db->where('id_jenis_transaksi', $id_jenis_transaksi);
        $this->db->from('transaksi');
        return $this->db->count_all_results();
    }

    public function getAlltransaksiAndJenis()
    {
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('jenis_transaksi','jenis_transaksi.id_jenis_transaksi=transaksi.id_jenis_transaksi','LEFT OUTER');
		$query = $this->db->get();
		return $query->result_array();
    }
    
    public function getAllJenis()
    {
		$this->db->select('*');
		$this->db->from('jenis_transaksi');
		$query = $this->db->get();
		return $query->result_array();
    }

    public function countAlltransaksi()
    {
        return $this->db->get('transaksi')->num_rows();
    }
    
    public function hapustransaksi($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->delete('transaksi');
    }

    public function hapustransaksiboongan()
    {
        return $data = ['status'       => 0];
    }

     public function hapusJenistransaksi($id_jenis_transaksi)
    {
        $this->db->where('id_jenis_transaksi', $id_jenis_transaksi);
        return $this->db->delete('jenis_transaksi');
    }

    public function caritransaksi($keyword)
    {
        $this->db->like('kode_transaksi', $keyword);
        $this->db->or_like('nama_transaksi', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('stok', $keyword);
        $this->db->or_like('bentuk', $keyword);
        $this->db->or_like('fungsi', $keyword);
        $this->db->or_like('aturan', $keyword);
        $this->db->or_like('nama_jenis', $keyword);
    }
    
    public function carijenis($keyword)
    {
        $this->db->like('id_jenis_transaksi', $keyword);
        $this->db->or_like('nama_jenis', $keyword);
    }

    public function editdatatransaksi($new_image)
    {
        return $data = [
            'kode_transaksi'         => $this->input->post('kode_transaksi'),
            'nama_transaksi'         => $this->input->post('nama_transaksi'),
            'harga'             => $this->input->post('harga'),
            'stok'              => $this->input->post('stok'),
            'bentuk'            => $this->input->post('bentuk'),
            'fungsi'            => $this->input->post('fungsi'),
            'aturan'            => $this->input->post('aturan'),
            'gambar'            => $new_image,
            'id_jenis_transaksi'     => $this->input->post('id_jenis_transaksi'),
            'status'            => $this->input->post('status')
        ];
    }

    public function adddatatransaksi($new_image)
    {
        $data = [
            'kode_transaksi'         => $this->input->post('kode_transaksi'),
            'nama_transaksi'         => $this->input->post('nama_transaksi'),
            'harga'             => $this->input->post('harga'),
            'stok'              => $this->input->post('stok'),
            'bentuk'            => $this->input->post('bentuk'),
            'fungsi'            => $this->input->post('fungsi'),
            'aturan'            => $this->input->post('aturan'),
            'gambar'            => $new_image,
            'id_jenis_transaksi'     => $this->input->post('id_jenis_transaksi'),
            'status'            => $this->input->post('status')
        ];
        $this->db->insert('transaksi', $data);
    }

    public function adddatajenistransaksi()
    {
        $data = [
            'id_jenis_transaksi' => $this->input->post('id_jenis_transaksi'),
            'nama_jenis' => $this->input->post('nama_jenis')
        ];
        $this->db->insert('jenis_transaksi', $data);
    }

    public function editdatajenistransaksi()
    {
        return $data = [
            'id_jenis_transaksi' => $this->input->post('id_jenis_transaksi'),
            'nama_jenis' => $this->input->post('nama_jenis')
        ];
    }

    public function updatetransaksi($data,$id_transaksi)
    {
        $this->db->set($data);
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi');
    }

    public function updateJenistransaksi($data,$id_jenis_transaksi)
    {
        $this->db->set($data);
        $this->db->where('id_jenis_transaksi', $id_jenis_transaksi);
        $this->db->update('jenis_transaksi');
    }
    public function updateStoktransaksi($id, $stok)
    {
        $this->db->query("UPDATE `transaksi` SET `stok` = ".$stok." WHERE `transaksi`.`id_transaksi` = ".$id.";");
    }
}
