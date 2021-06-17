<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthPegawai extends CI_Controller {

	// Fungsi yang dilakukan sebelum meload semua fungsi
    public function __construct()
    {
        parent::__construct();
        // Meload model m_auth_pegawai untuk keperluan fungsi yang ada di dalam controller
        $this->load->model('m_pegawai');
    }

    public function blocked()
    {
        $this->load->view('templates/blocked');
    }
    
	public function index()
	{
        // Mengecek apabila sudah terdapat email di dalam session, maka akan di redirect ke page pegawai
        if ($this->session->userdata('email')){
            if ($this->session->userdata('id_role') == 1){
                redirect('pegawai/pemimpin');
            } else{
                redirect('pegawai/admin');
            }
        }

        // Melakukan Validasi terhadap kolom email dan password di page Masuk
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi.');

        // 
        if ( $this->form_validation->run() == FALSE ){
            // Menampilkan View login_pegawai
            $data['appname'] = 'Rental Mobil';
            $data['title'] = 'Masuk';
            $this->load->view('templates/header_auth_pegawai', $data);
            // $this->load->view('templates/navbar_pegawai', $data);
            $this->load->view('auth/login_pegawai', $data);
            // $this->load->view('templates/footer', $data);
        } else {
            $this->_login();
        }
    }
    
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $pegawai = $this->m_pegawai->getPegawai($email);
        
        // jika pegawainya ada
        if ( $pegawai ){
            if ( $pegawai['status'] == 0 ){
                $this->session->set_flashdata('message', '<div class="alert alert-danger " role="alert">
                Akun Anda sudah tidak aktif!</div>');
                redirect('authPegawai');
            }
            // cek password
            if ( password_verify($password, $pegawai['password']) ){
                $data = [
                    'email' => $pegawai['email'],
                    'id_role' => $pegawai['id_role']
                ];
                $this->session->set_userdata($data);
                
                //cek id_role
                if ( $pegawai['id_role'] == 1 ){
                    redirect('pegawai/pemimpin');
                } else if ( $pegawai['id_role'] == 2 ){
                    redirect('pegawai/admin');
                }

            } else{

                $this->session->set_flashdata('message', '<div class="alert alert-danger " role="alert">
                Password Salah!</div>');
                redirect('authPegawai');

            }
        } else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger " role="alert">
            Email tersebut belum terdaftar.</div>');
            redirect('authPegawai');
        }
    }

	public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_role');
        redirect('authPegawai');
    }
}
