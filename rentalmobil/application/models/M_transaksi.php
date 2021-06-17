<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    public function getAllTransaksi()
    {
        $this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('pegawai','pegawai.id_pegawai=transaksi.id_pegawai','LEFT OUTER');
		$this->db->join('customer','customer.id_customer=transaksi.id_customer','LEFT OUTER');
		$this->db->join('metode_bayar','metode_bayar.id_metode_bayar=transaksi.id_metode_bayar','LEFT OUTER');
		$query = $this->db->get();
		return $query->result_array();
    }

    public function getTransaksiById($id_transaksi)
    {
        $this->db->join('pegawai','pegawai.id_pegawai=transaksi.id_pegawai','LEFT OUTER');
		$this->db->join('customer','customer.id_customer=transaksi.id_customer','LEFT OUTER');
		$this->db->join('metode_bayar','metode_bayar.id_metode_bayar=transaksi.id_metode_bayar','LEFT OUTER');
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get('transaksi')->row_array();
    }

    public function getTransaksiCountByMetode($id_metode_bayar)
    {
        $this->db->where('id_metode_bayar', $id_metode_bayar);
        $this->db->from('transaksi');
        return $this->db->count_all_results();
    }
    
    public function getAllMetodeBayar()
    {
		$this->db->select('*');
		$this->db->from('metode_bayar');
		$query = $this->db->get();
		return $query->result_array();
    }

    public function countAlltransaksi()
    {
        return $this->db->get('transaksi')->num_rows();
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

    public function getMetodeBayarById($id_metode_bayar)
    {
        $this->db->where('id_metode_bayar', $id_metode_bayar);
        return $this->db->get('metode_bayar')->row_array();
    }

    public function tambahMetodeBayar()
    {
        $data = ['metode_pembayaran' => $this->input->post('metode_pembayaran')];
        $this->db->insert('metode_bayar', $data);
    }

    public function nonaktifkanMetodeBayar($id_metode_bayar)
    {
        $this->db->set('status_metode', 0);
        $this->db->where('id_metode_bayar', $id_metode_bayar);
        $this->db->update('metode_bayar');
    }
    
    public function aktifkanMetodeBayar($id_metode_bayar)
    {
        $this->db->set('status_metode', 1);
        $this->db->where('id_metode_bayar', $id_metode_bayar);
        $this->db->update('metode_bayar');
    }

    public function ubahMetodeBayar($id_metode_bayar)
    {
        $this->db->set('metode_pembayaran', $this->input->post('metode_pembayaran'));
        $this->db->where('id_metode_bayar', $id_metode_bayar);
        $this->db->update('metode_bayar');
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
