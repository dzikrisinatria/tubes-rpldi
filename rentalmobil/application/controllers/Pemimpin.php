
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemimpin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('email')){
            if ($this->session->userdata('id_role') != 1){
                redirect('pegawai/admin');
            }
        } else{
            echo "gaboleh masuk mas";die;
        }
        $this->load->model('m_mobil');
        $this->load->model('m_transaksi');
        // $this->load->model('m_customer');
        $this->load->model('m_pegawai');
    }

    public function index()
    {
        $data['appname'] = 'Rental Mobil';
        $data['title'] = 'Dasbor';

        $sess_email = $this->session->userdata('email');
        $data['pegawai'] = $this->m_pegawai->getPegawai($sess_email);

        $this->load->view('templates/header_pegawai', $data);
        $this->load->view('templates/navbar_pegawai', $data);
        $this->load->view('pemimpin/index', $data);
        $this->load->view('templates/footer_pegawai', $data);
    }
}