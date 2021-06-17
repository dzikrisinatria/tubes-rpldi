
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('email')){
            if ($this->session->userdata('id_role') != 1){
                redirect('pegawai/admin');
            }
        } else{
            echo "gaboleh masuk mas"; die;
        }
        $this->load->model('m_mobil');
        $this->load->model('m_transaksi');
        $this->load->model('m_pegawai');
    }
    
    public function index()
    {
        $data['appname'] = 'Rental Mobil';
        $data['title'] = 'Data Pegawai';
        $email = $this->session->userdata('email');
        $data['pegawai'] = $this->m_pegawai->getPegawai($email);

        $data['allPegawai'] = $this->m_pegawai->getAllPegawai();
        // $data['getpegawai'] = $this->m_pegawai->getPegawaiById($id_pegawai);
        $data['getrole'] = $this->m_pegawai->getAllRole();

        $this->load->view('templates/header_pegawai', $data);
        $this->load->view('templates/navbar_pegawai', $data);
        $this->load->view('pegawai/data_pegawai', $data);
        $this->load->view('templates/footer_pegawai', $data);
    }
    
    public function dataRole()
    {
        $data['appname'] = 'Rental Mobil';
        $data['title'] = 'Data Jabatan Pegawai';
        $email = $this->session->userdata('email');
        $data['pegawai'] = $this->m_pegawai->getPegawai($email);

        $data['allPegawai'] = $this->m_pegawai->getAllPegawai();
        // $data['getPegawai'] = $this->m_pegawai->getPegawaiByRole();
        $data['allRole'] = $this->m_pegawai->getAllRole();

        $this->load->view('templates/header_pegawai', $data);
        $this->load->view('templates/navbar_pegawai', $data);
        $this->load->view('pegawai/data_role', $data);
        $this->load->view('templates/footer_pegawai', $data);
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
            $this->m_pegawai->tambahRole();
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
            $this->m_pegawai->ubahRole($id_role);
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
        $data['pegawai'] = $this->m_pegawai->getPegawai($email);

        if ($id_role != 1){
            $this->m_pegawai->nonaktifkanRole($id_role);
            $this->session->set_flashdata('message_role', 'dinonaktifkan');
            redirect('pegawai/datapegawai/jabatan');
        }
    }
    
    public function aktifkanRole($id_role)
    {
        $email = $this->session->userdata('email');
        $data['pegawai'] = $this->m_pegawai->getPegawai($email);

        $this->m_pegawai->aktifkanRole($id_role);
        $this->session->set_flashdata('message_role', 'diaktifkan');
        redirect('pegawai/datapegawai/jabatan');
    }
    
    public function aktifkanPegawai($id_pegawai)
    {
        $this->m_pegawai->aktifkanPegawai($id_pegawai);
        $this->session->set_flashdata('message_pegawai', 'diaktifkan');
        redirect('pegawai/datapegawai');
    }
    
    public function nonaktifkanPegawai($id_pegawai)
    {
        $email = $this->session->userdata('email');
        $data['pegawai'] = $this->m_pegawai->getPegawai($email);

        $this->m_pegawai->hapusPegawai($id_pegawai);
        
        $this->session->set_flashdata('message_pegawai', 'dinonaktifkan');
        redirect('pegawai/datapegawai');
    }
    
    public function editPegawai($id_pegawai)
    {   
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[5]');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi.');
        $this->form_validation->set_message('valid_email', 'Kolom {field} harus diisi dengan email yang valid.');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
        $this->form_validation->set_message('matches', '{field} tidak sama.');
        $this->form_validation->set_message('is_unique', '{field} telah terdaftar.');

        if ( $this->form_validation->run() == FALSE ){

            $data['appname'] = 'Rental Mobil';
            $data['title'] = 'Ubah Pegawai';

            $data['getpegawai'] = $this->m_pegawai->getPegawaiById($id_pegawai);
            $data['getrole'] = $this->m_pegawai->getAllRole();
            $data['pegawai'] = $this->db->get_where('pegawai',
            ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header_pegawai', $data);
            $this->load->view('templates/navbar_pegawai', $data);
            $this->load->view('pegawai/edit_pegawai');
            $this->load->view('templates/footer_pegawai', $data);

        } else {
            //cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['foto_profil']['name'];

            if ($upload_image){
                
                $config['upload_path']          = './assets/images/foto_profil/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 5012;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_profil')){ //jika berhasil upload
                    
                    //mengecek gambar profil yg lama
                    $old_image = $data['getpegawai']['foto_profil'];
                    // var_dump($old_image); die;
                    //cek apakah gambar default, apabila gambar default tidak akan dihapus
                    if ($old_image != 'default.jpg'){ 
                        //apabila gambar bukan default akan dihapus dengan unlink
                        unlink(FCPATH . 'assets/images/foto_profil' . $old_image); 
                    }

                    //upload gambar yg baru
                    $new_image = $this->upload->data('file_name');
                    $this->m_pegawai->updatePegawai($new_image, $id_pegawai);
                }
            } else{
                $old_image = $data['getpegawai']['foto_profil'];
                $this->m_pegawai->updatePegawai($old_image, $id_pegawai);
            }
            $this->session->set_flashdata('message_pegawai', 'diupdate');
            redirect('pegawai/datapegawai');
        }

    }

    public function tambahPegawai()
    {   
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim|min_length[3]');
        
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pegawai.email]');
        
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
            $data['title'] = 'Tambah Pegawai';
            $data['getrole'] = $this->m_pegawai->getAllRole();
            $data['pegawai'] = $this->db->get_where('pegawai',
            ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header_pegawai', $data);
            $this->load->view('templates/navbar_pegawai', $data);
            $this->load->view('pegawai/tambah_pegawai');
            $this->load->view('templates/footer_pegawai', $data);

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
                    $this->m_pegawai->tambahPegawai($new_image);

                } else{
                    //menampilkan pesan error khusus upload
                    $this->session->set_flashdata('err_profil', '<small class="text-danger">' . 
                    $this->upload->display_errors() . '</small>');
                    redirect('pegawai/datapegawai/tambah');
                }
            } else{
                $this->m_pegawai->tambahPegawaiDefault();
            }

            $this->session->set_flashdata('message_pegawai', 'ditambahkan');
            redirect('pegawai/datapegawai');
        }
    }
}