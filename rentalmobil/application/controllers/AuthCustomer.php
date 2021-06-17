<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthCustomer extends CI_Controller
{
    // Fungsi yang dilakukan sebelum meload semua fungsi
    public function __construct()
    {
        parent::__construct();
        // Meload model m_auth_customer untuk keperluan fungsi yang ada di dalam controller
        $this->load->model('m_auth_customer');
    }
    
	public function index()
	{
        // Mengecek apabila sudah terdapat email di dalam session, maka akan di redirect ke page customer
        if ($this->session->userdata('email')){
            redirect('customer');
        }

        // Melakukan Validasi terhadap kolom email dan password di page Masuk
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        // 
        if ( $this->form_validation->run() == FALSE ){
            // Menampilkan View login_customer
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
            
        if ( $this->form_validation->run() == FALSE ){
            // echo "gamasuk"; die;
            $data['appname'] = 'Rental Mobil';
            $data['title'] = 'Daftar';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_customer', $data);
            $this->load->view('auth/register_customer');
            $this->load->view('templates/footer', $data);

        } else {
            $this->m_auth_customer->regdata();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun Anda berhasil dibuat! Silahkan Login.</div>');
            redirect('authCustomer');
        }
    }

    public function register2()
    {   
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim|min_length[3]', [
            'required' => 'Kolom Nama Lengkap harus diisi.',
            'min_length' => "Nama Lengkap minimal 3 karakter."
        ]);

        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim', [
            'required' => 'Jenis Kelamin harus diisi.'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Kolom Alamat harus dilengkapi.'
        ]);
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|min_length[16]|numeric|is_unique[customer.nik]', [
            'required' => 'Kolom NIK harus diisi.',
            'min_length' => "NIK minimal 16 karakter.",
            'numeric' => "Kolom NIK harus berisi angka.",
            'is_unique' => 'Akun dengan NIK ini telah terdaftar!'
        ]);
        $this->form_validation->set_rules('no_sim', 'Nomor SIM', 'required|trim|min_length[12]|numeric|is_unique[customer.no_sim]', [
            'required' => 'Kolom Nomor SIM harus diisi.',
            'min_length' => "Nomor SIM minimal 12 karakter.",
            'numeric' => "Kolom Nomor SIM harus berisi angka.",
            'is_unique' => 'Akun dengan Nomor SIM ini telah terdaftar!'
        ]);
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim|min_length[10]|numeric|is_unique[customer.no_hp]', [
            'required' => 'Kolom Nomor HP harus diisi.',
            'min_length' => "Nomor HP minimal 10 karakter.",
            'numeric' => "Kolom Nomor HP harus berisi angka.",
            'is_unique' => 'Akun dengan Nomor HP ini telah terdaftar!'
        ]);
        if (empty($_FILES['foto_kk']['name']))
        {
            $this->form_validation->set_rules('foto_kk', 'Foto Kartu Keluarga', 'required', [
                'required' => 'Foto Kartu Keluarga harus dilengkapi.'
            ]);
        }
        if (empty($_FILES['foto_ktp']['name']))
        {
            $this->form_validation->set_rules('foto_ktp', 'Foto KTP', 'required', [
                'required' => 'Foto KTP harus dilengkapi.'
            ]);
        }
        if (empty($_FILES['foto_selfie_ktp']['name']))
        {
            $this->form_validation->set_rules('foto_selfie_ktp', 'Foto Selfie KTP', 'required', [
                'required' => 'Foto Selfie KTP harus dilengkapi.'
            ]);
        }
        if (empty($_FILES['foto_sim']['name']))
        {
            $this->form_validation->set_rules('foto_sim', 'Foto SIM', 'required', [
                'required' => 'Foto SIM harus dilengkapi.'
            ]);
        }
            
        if ( $this->form_validation->run() == FALSE ){
            // echo "gamasuk";die;
            $data['appname'] = 'Rental Mobil';
            $data['title'] = 'Daftar';
            
            $email = $this->session->userdata('email');
            $data['customer'] = $this->m_auth_customer->getCustomer($email);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_customer', $data);
            $this->load->view('auth/register2_customer');
            $this->load->view('templates/footer', $data);

        } else {
            // echo "gamasuk";die;
            //cek jika ada gambar yang akan diupload
            $fotokk = $_FILES['foto_kk']['name'];
            $fotoktp = $_FILES['foto_ktp']['name'];
            $fotoselfiektp = $_FILES['foto_selfie_ktp']['name'];
            $fotosim = $_FILES['foto_sim']['name'];

            if ($fotokk && $fotoktp && $fotoselfiektp && $fotosim){
                
                $config = array();
                $config['upload_path']          = './assets/images/foto_kk';
                $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
                $config['max_size']             = 5120;

                $this->load->library('upload', $config, 'upload_foto_kk'); // Create custom object for cover upload
                $this->upload_foto_kk->initialize($config);

                if ($this->upload_foto_kk->do_upload('foto_kk')){ //jika berhasil upload
                    //upload gambar yg baru
                    $fotokk = $this->upload_foto_kk->data('file_name');
                    
                } else{
                    //menampilkan pesan error khusus upload
                    $this->session->set_flashdata('err_kk', '<small class="text-danger">' . 
                    $this->upload_foto_kk->display_errors() . '</small>');
                }
                
                $config = array();
                $config['upload_path']          = './assets/images/foto_ktp';
                $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
                $config['max_size']             = 5120;

                $this->load->library('upload', $config, 'upload_foto_ktp'); // Create custom object for cover upload
                $this->upload_foto_ktp->initialize($config);

                if ($this->upload_foto_ktp->do_upload('foto_ktp')){ //jika berhasil upload
                    //upload gambar yg baru
                    $fotoktp = $this->upload_foto_ktp->data('file_name');
                    
                } else{
                    //menampilkan pesan error khusus upload
                    $this->session->set_flashdata('err_ktp', '<small class="text-danger">' . 
                    $this->upload_foto_ktp->display_errors() . '</small>');
                }
                
                $config = array();
                $config['upload_path']          = './assets/images/foto_selfie_ktp';
                $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
                $config['max_size']             = 5120;

                $this->load->library('upload', $config, 'upload_foto_selfie_ktp'); // Create custom object for cover upload
                $this->upload_foto_selfie_ktp->initialize($config);

                if ($this->upload_foto_selfie_ktp->do_upload('foto_selfie_ktp')){ //jika berhasil upload
                    //upload gambar yg baru
                    $fotoselfiektp = $this->upload_foto_selfie_ktp->data('file_name');
                    
                } else{
                    //menampilkan pesan error khusus upload
                    $this->session->set_flashdata('err_selfie', '<small class="text-danger">' . 
                    $this->upload_foto_selfie_ktp->display_errors() . '</small>');
                }
                
                $config = array();
                $config['upload_path']          = './assets/images/foto_sim';
                $config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
                $config['max_size']             = 5120;

                $this->load->library('upload', $config, 'upload_foto_sim'); // Create custom object for cover upload
                $this->upload_foto_sim->initialize($config);

                if ($this->upload_foto_sim->do_upload('foto_sim')){ //jika berhasil upload
                    //upload gambar yg baru
                    $fotosim = $this->upload_foto_sim->data('file_name');
                    
                } else{
                    //menampilkan pesan error khusus upload
                    $this->session->set_flashdata('err_sim', '<small class="text-danger">' . 
                    $this->upload_foto_sim->display_errors() . '</small>');
                }

                $email = $this->session->userdata('email');
                $customer = $this->m_auth_customer->getCustomer($email);
                $id_customer = $customer['id_customer'];
                $this->m_auth_customer->regdata2($fotokk, $fotoktp, $fotoselfiektp, $fotosim, $id_customer);
                
            } else{
                // echo "gamasuk";die;
                $this->session->set_flashdata('message', '<div class="alert alert-danger mt-n4" role="alert">
                Semua dokumen foto harus dilampirkan. Silahkan upload semua dokumen foto Anda.</div>');
                redirect('authCustomer/register2');
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data diri Anda berhasil diupdate.</div>');
            redirect(base_url());
            // redirect('authCustomer/register2');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        redirect('customer');
    }

    public function blocked()
    {
        $this->load->view('authCustomer/blocked');
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
        $this->load->view('authCustomer/profile', $data);
        $this->load->view('templates/footer', $data);
    }
}
