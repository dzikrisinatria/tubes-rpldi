<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthCustomer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_auth_customer');
    }
    
	public function index()
	{
        if ($this->session->userdata('email')){
            redirect('customer');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ( $this->form_validation->run() == FALSE ){
            $data['appname'] = 'Rental Mobil';
            $data['title'] = 'Masuk';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_customer', $data);
            $this->load->view('auth/login_customer', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->_login();
        }
    }
    
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $customer = $this->m_auth_customer->getCustomer($email);
        
        // jika customernya ada
        if ( $customer ){
            if ( $customer['status'] == 0 ){
                $this->session->set_flashdata('message', '<div class="alert alert-danger " role="alert">
                Akun Anda sudah tidak aktif!</div>');
                redirect('authCustomer');
            }
            // cek password
            if ( password_verify($password, $customer['password']) ){
                $data = [
                    'email' => $customer['email']
                ];
                $this->session->set_userdata($data);
                // echo "gamasuk"; die;
                redirect('customer');

            } else{

                $this->session->set_flashdata('message', '<div class="alert alert-danger " role="alert">
                Password Salah!</div>');
                redirect('authCustomer');

            }
        } else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger " role="alert">
            Email tersebut belum terdaftar.</div>');
            redirect('authCustomer');
        }
    }

    public function register()
    {
        if ($this->session->userdata('email')){
            redirect('customer');
        }
        
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[customer.email]', [
            'required' => 'Kolom Email harus diisi.',
            'is_unique' => 'Email ini telah terdaftar!',
            ]);
        
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => "Password tidak sama",
            'required' => 'Kolom Password harus diisi.',
            'min_length' => "Password minimal 5 karakter."
        ]);
            
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim|min_length[3]', [
            'required' => 'Kolom Nama harus diisi.',
            'min_length' => "Nama Lengkap minimal 3 karakter."
        ]);
        // $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        // $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        // $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        // $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim|min_length[10]|numeric');
            
        if ( $this->form_validation->run() == FALSE ){
            // echo "gamasuk"; die;
            $data['appname'] = 'Rental Mobil';
            $data['title'] = 'Daftar';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_customer', $data);
            $this->load->view('auth/register_customer');
            $this->load->view('templates/footer', $data);

        } else {
            
            //cek jika ada gambar yang akan diupload
            // $upload_image = $_FILES['foto']['name'];

            // if ($upload_image){
                
            //     $config['upload_path']          = './assets/img/profile/';
            //     $config['allowed_types']        = 'gif|jpg|png';
            //     $config['max_size']             = 2048;

            //     $this->load->library('upload', $config);

            //     if ($this->upload->do_upload('foto')){ //jika berhasil upload
            //         //upload gambar yg baru
            //         $new_image = $this->upload->data('file_name');
            //         $this->m_auth_customer->regdata($new_image);

            //     } else{
            //         //menampilkan pesan error khusus upload
            //         $this->session->set_flashdata('message', '<small class="text-danger">' . 
            //         $this->upload->display_errors() . '</small>');
            //         redirect('auth/register');
            //     }
            // } else{
                $this->m_auth_customer->regdata2();
            // }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun Anda berhasil dibuat! Silahkan Login.</div>');
            redirect('authCustomer');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        // $this->session->unset_userdata('keyword');
        // $this->session->sess_destroy();
        // $this->session->set_flashdata('message', '<div class="alert alert-success " role="alert">
        // Anda telah berhasil logout!</div>');
        redirect('customer');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

    public function profile()
    {
        $data['appname'] = 'Rental Mobil';
        $data['title'] = 'Profil Saya';

        $username = $this->session->userdata('username');
        $data['user'] = $this->m_auth_customer->getProfile($username);

        $this->load->view('templates/header', $data);
        if ($data['user']['role_id'] == 1){
            $this->load->view('templates/sidebar_admin', $data);
        } else if ($data['user']['role_id'] == 2){
            $this->load->view('templates/sidebar_apoteker', $data);
        }
        $this->load->view('auth/profile', $data);
        $this->load->view('templates/footer', $data);
    }
}
