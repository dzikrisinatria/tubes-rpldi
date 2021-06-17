
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerData extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('email')){
            if ($this->session->userdata('id_role') != 1 && $this->session->userdata('id_role') != 2){
                redirect ('authPegawai/blocked');
            }
        } else{
            redirect ('authPegawai');
        }
        $this->load->model('m_mobil');
        $this->load->model('m_transaksi');
        $this->load->model('m_pegawai');
        $this->load->model('m_customer');
    }
    
    public function index()
    {
        $data['appname'] = 'Rental Mobil';
        $data['title'] = 'Data Customer';
        $email = $this->session->userdata('email');
        $data['pegawai'] = $this->m_pegawai->getPegawai($email);

        $data['allCustomer'] = $this->m_customer->getAllCustomer();

        $this->load->view('templates/header_pegawai', $data);
        $this->load->view('templates/navbar_pegawai', $data);
        $this->load->view('customer/data_customer', $data);
        $this->load->view('templates/footer_pegawai', $data);
    }
    
    public function dataRole()
    {
        $data['appname'] = 'Rental Mobil';
        $data['title'] = 'Data Jabatan Customer';
        $email = $this->session->userdata('email');
        $data['customer'] = $this->m_customer->getCustomer($email);

        $data['allCustomer'] = $this->m_customer->getAllCustomer();
        // $data['getCustomer'] = $this->m_customer->getCustomerByRole();
        $data['allRole'] = $this->m_customer->getAllRole();

        $this->load->view('templates/header_customer', $data);
        $this->load->view('templates/navbar_customer', $data);
        $this->load->view('customer/data_role', $data);
        $this->load->view('templates/footer_customer', $data);
    }
    
    public function tambahRole()
    {
        $data = array ('success' => false, 'messages' => array());

        $this->form_validation->set_rules('nama_role', 'Nama Jabatan', 'trim|required|is_unique[role.nama_role]');  
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi.');
        $this->form_validation->set_message('is_unique', '{field} tersebut telah terdaftar.');

        if($this->form_validation->run()) {
            $data['success'] = true;
            $this->m_customer->tambahRole();
            $this->session->set_flashdata('message_role', 'ditambahkan');
        } else {
            foreach ($_POST as $key => $value) {
                $data['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($data);
    }
    
    public function ubahRole($id_role)
    {
        $data = array ('success' => false, 'messages' => array());

        $this->form_validation->set_rules('nama_role', 'Nama Jabatan', 'trim|required|is_unique[role.nama_role]');  
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi.');
        $this->form_validation->set_message('is_unique', '{field} tersebut telah terdaftar.');

        if($this->form_validation->run()) {
            $data['success'] = true;
            $this->m_customer->ubahRole($id_role);
            $this->session->set_flashdata('message_role', 'diubah');
        } else {
            foreach ($_POST as $key => $value) {
                $data['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($data);
    }

    public function nonaktifkanRole($id_role)
    {
        $email = $this->session->userdata('email');
        $data['customer'] = $this->m_customer->getCustomer($email);

        if ($id_role != 1){
            $this->m_customer->nonaktifkanRole($id_role);
            $this->session->set_flashdata('message_role', 'dinonaktifkan');
            redirect('customer/datacustomer/jabatan');
        }
    }
    
    public function aktifkanRole($id_role)
    {
        $email = $this->session->userdata('email');
        $data['customer'] = $this->m_customer->getCustomer($email);

        $this->m_customer->aktifkanRole($id_role);
        $this->session->set_flashdata('message_role', 'diaktifkan');
        redirect('customer/datacustomer/jabatan');
    }
    
    public function aktifkanCustomer($id_customer)
    {
        $this->m_customer->aktifkanCustomer($id_customer);
        $this->session->set_flashdata('message_data_customer', 'diaktifkan');
        redirect('pegawai/datacustomer');
    }
    
    public function nonaktifkanCustomer($id_customer)
    {
        $this->m_customer->nonaktifkanCustomer($id_customer);
        
        $this->session->set_flashdata('message_data_customer', 'dinonaktifkan');
        redirect('pegawai/datacustomer');
    }
    
    public function verifikasiCustomer($id_customer)
    {   
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim|min_length[3]');
        
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[5]');
        
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|min_length[16]|numeric');

        $this->form_validation->set_rules('no_sim', 'Nomor SIM', 'required|trim|min_length[12]|numeric');
        
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim|min_length[10]|numeric');

        $this->form_validation->set_message('required', 'Kolom {field} harus diisi.');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
        $this->form_validation->set_message('valid_email', 'Kolom {field} harus diisi dengan email yang valid.');
        $this->form_validation->set_message('matches', '{field} tidak sama.');
        $this->form_validation->set_message('is_unique', '{field} telah terdaftar.');

        if ( $this->form_validation->run() == FALSE ){

            $data['appname'] = 'Rental Mobil';
            $data['title'] = 'Verifikasi Customer';

            $data['allCustomer'] = $this->m_customer->getAllCustomer();
            $data['getCustomer'] = $this->m_customer->getCustomerById($id_customer);
            $email = $this->session->userdata('email');
            $data['pegawai'] = $this->m_pegawai->getPegawai($email);

            $this->load->view('templates/header_pegawai', $data);
            $this->load->view('templates/navbar_pegawai', $data);
            $this->load->view('customer/verifikasi_customer');
            $this->load->view('templates/footer_pegawai', $data);

        } else {

            $this->m_customer->verifikasiCustomer($id_customer);
            $this->session->set_flashdata('message_data_customer', 'diverifikasi');
            redirect('pegawai/datacustomer');
        }

    }

    public function tambahCustomer()
    {   
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim|min_length[3]');
        
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[customer.email]');
        
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[password2]');
            
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');
        
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[5]');
        
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        
        $this->form_validation->set_rules('id_role', 'Jabatan', 'required|trim');

        $this->form_validation->set_message('required', 'Kolom {field} harus diisi.');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
        $this->form_validation->set_message('valid_email', 'Kolom {field} harus diisi dengan email yang valid.');
        $this->form_validation->set_message('matches', '{field} tidak sama.');
        $this->form_validation->set_message('is_unique', '{field} telah terdaftar.');
            
        if ( $this->form_validation->run() == FALSE ){
            // echo "gamasuk"; die;
            $data['appname'] = 'Rental Mobil';
            $data['title'] = 'Tambah Customer';
            $data['getrole'] = $this->m_customer->getAllRole();
            $data['customer'] = $this->db->get_where('customer',
            ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header_customer', $data);
            $this->load->view('templates/navbar_customer', $data);
            $this->load->view('customer/tambah_customer');
            $this->load->view('templates/footer_customer', $data);

        } else {
            //cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['foto_profil']['name'];

            if ($upload_image){
                
                $config['upload_path']          = './assets/images/foto_profil';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 5012;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_profil')){ //jika berhasil upload
                    //upload gambar yg baru
                    $new_image = $this->upload->data('file_name');
                    $this->m_customer->tambahCustomer($new_image);

                } else{
                    //menampilkan pesan error khusus upload
                    $this->session->set_flashdata('err_profil', '<small class="text-danger">' . 
                    $this->upload->display_errors() . '</small>');
                    redirect('customer/datacustomer/tambah');
                }
            } else{
                $this->m_customer->tambahCustomerDefault();
            }

            $this->session->set_flashdata('message_data_customer', 'ditambahkan');
            redirect('customer/datacustomer');
        }
    }
}