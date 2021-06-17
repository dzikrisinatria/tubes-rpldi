
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_mobil');
        $this->load->model('m_transaksi');
        $this->load->model('m_pegawai');
    }

    public function index()
    {
        $data['appname'] = 'Rental Mobil';
        $data['title'] = 'Beranda';

        $email = $this->session->userdata('email');
        $data['pegawai'] = $this->m_pegawai->getPegawai($email);

        $this->load->view('templates/header_pegawai', $data);
        $this->load->view('templates/navbar_pegawai', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('templates/footer_pegawai', $data);
    }

    public function dataTransaksi()
    {
        $data['appname'] = 'Rental Mobil';
        $data['title'] = 'Data Transaksi';

        $email = $this->session->userdata('email');
        $data['pegawai'] = $this->m_pegawai->getPegawai($email);

        $data['allTransaksi'] = $this->m_transaksi->getAllTransaksi();

        $this->load->view('templates/header_pegawai', $data);
        $this->load->view('templates/navbar_pegawai', $data);
        $this->load->view('transaksi/data_transaksi', $data);
        $this->load->view('templates/footer_pegawai', $data);
    }
    
    public function dataMetodeBayar()
    {
        $data['appname'] = 'Rental Mobil';
        $data['title'] = 'Data Metode Pembayaran';

        $email = $this->session->userdata('email');
        $data['pegawai'] = $this->m_pegawai->getPegawai($email);

        $data['allMetode'] = $this->m_transaksi->getAllMetodeBayar();

        $this->load->view('templates/header_pegawai', $data);
        $this->load->view('templates/navbar_pegawai', $data);
        $this->load->view('transaksi/data_metode_bayar', $data);
        $this->load->view('templates/footer_pegawai', $data);
    }

    public function tambahMetodeBayar()
    {
        $data = array ('success' => false, 'messages' => array());

        $this->form_validation->set_rules('metode_pembayaran', 'Nama Metode', 'trim|required|is_unique[metode_bayar.metode_pembayaran]');  
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi.');
        $this->form_validation->set_message('is_unique', '{field} tersebut telah terdaftar.');

        if($this->form_validation->run()) {
            $data['success'] = true;
            $this->m_transaksi->tambahMetodeBayar();
            $this->session->set_flashdata('message_metode', 'ditambahkan');
        } else {
            foreach ($_POST as $key => $value) {
                $data['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($data);
    }
    
    public function ubahMetodeBayar($id_metode_bayar)
    {
        $data = array ('success' => false, 'messages' => array());

        $this->form_validation->set_rules('metode_pembayaran', 'Nama Metode', 'trim|required|is_unique[metode_bayar.metode_pembayaran]');  
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi.');
        $this->form_validation->set_message('is_unique', '{field} tersebut telah terdaftar.');

        if($this->form_validation->run()) {
            $data['success'] = true;
            $this->m_transaksi->ubahMetodeBayar($id_metode_bayar);
            $this->session->set_flashdata('message_metode', 'diubah');
        } else {
            foreach ($_POST as $key => $value) {
                $data['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($data);
    }

    public function aktifkanMetodeBayar($id_metode_bayar)
    {
        $this->m_transaksi->aktifkanMetodeBayar($id_metode_bayar);
        $this->session->set_flashdata('message_metode', 'diaktifkan');
        redirect('pegawai/datatransaksi/metodebayar');
    }
    
    public function nonaktifkanMetodeBayar($id_metode_bayar)
    {
        $this->m_transaksi->nonaktifkanMetodeBayar($id_metode_bayar);
        $this->session->set_flashdata('message_metode', 'dinonaktifkan');
        redirect('pegawai/datatransaksi/metodebayar');
    }
}