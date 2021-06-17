
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_mobil');
        $this->load->model('m_transaksi');
        // $this->load->model('m_customer');
        $this->load->model('m_auth_customer');
        // $email = $this->session->userdata('email');
        $menu = $this->uri->segment(1);
    }

    public function index()
    {
        $data['appname'] = 'Rental Mobil';
        $data['title'] = 'Beranda';
        $data['customer'] = $this->db->get_where('customer',
        ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_customer', $data);
        $this->load->view('customer/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function mobil()
    {
        $data['appname'] = 'Rental Mobil';
        $data['title'] = 'Mobil';
        $data['customer'] = $this->db->get_where('customer',
        ['email' => $this->session->userdata('email')])->row_array();

        $data['allMobil'] = $this->m_mobil->getAllMobil();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_customer', $data);
        $this->load->view('customer/mobil', $data);
        $this->load->view('templates/footer', $data);
    }

    public function profile()
    {
        $data['appname'] = 'Rental Mobil';
        $data['title'] = 'Profil Saya';

        $username = $this->session->userdata('username');
        $data['user'] = $this->m_auth->getProfile($username);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_customer', $data);
        $this->load->view('customer/profile', $data);
        $this->load->view('templates/footer', $data);
    }

    public function penyewaan()
    {
        $data['appname'] = 'Rental Mobil';
        $data['title'] = 'Penyewaan';

        $email = $this->session->userdata('email');
        $data['customer'] = $this->m_customer->getCustomerByEmail()($email);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_customer', $data);
        $this->load->view('customer/penyewaan', $data);
        $this->load->view('templates/footer', $data);
    }
}