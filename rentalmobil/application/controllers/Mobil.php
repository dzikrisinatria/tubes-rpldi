<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')){
            redirect ('authPegawai');
        }
        $this->load->model('m_mobil');
        $this->load->model('m_pegawai');
    }

    public function index()
    {
        $data['appname'] = 'Rental Mobil';
        $data['title'] = 'Data Mobil';
        
        // Catet Session Login
        $email = $this->session->userdata('email');
        $data['pegawai'] = $this->m_pegawai->getPegawai($email);

        $data['allMobil'] = $this->m_mobil->getAllMobil();
        $data['getjenis'] = $this->m_mobil->getAllJenisMobil();
        $data['getseri'] = $this->m_mobil->getAllSeriMobil();

        $this->load->view('templates/header_pegawai', $data);
        $this->load->view('templates/navbar_pegawai', $data);
        $this->load->view('mobil/index', $data);
        $this->load->view('templates/footer_pegawai', $data);
    }
    
    private function hakakses()
    {
        if ($this->session->userdata('id_role') != 1){
            redirect('pegawai/admin');
        }
    }

    public function merkserimobil()
    {
        $this->hakakses();
        
        $data['appname'] = 'Rental Mobil';
        $data['title'] = 'Merk dan Seri Mobil';
        
        // Catet Session Login
        $email = $this->session->userdata('email');
        $data['pegawai'] = $this->m_pegawai->getPegawai($email);

        $data['allMobil'] = $this->m_mobil->getAllMobil();
        $data['allJenis'] = $this->m_mobil->getAllJenisMobil();
        $data['allMerk'] = $this->m_mobil->getAllMerkMobil();
        $data['allSeri'] = $this->m_mobil->getAllSeriMobil();

        $this->load->view('templates/header_pegawai', $data);
        $this->load->view('templates/navbar_pegawai', $data);
        $this->load->view('mobil/merk_seri_mobil', $data);
        $this->load->view('templates/footer_pegawai', $data);
    }
    
    public function jenismobil()
    {
        $this->hakakses();

        $data['appname'] = 'Rental Mobil';
        $data['title'] = 'Jenis Mobil';
        
        // Catet Session Login
        $email = $this->session->userdata('email');
        $data['pegawai'] = $this->m_pegawai->getPegawai($email);

        $data['allMobil'] = $this->m_mobil->getAllMobil();
        $data['allJenis'] = $this->m_mobil->getAllJenisMobil();
        $data['allMerk'] = $this->m_mobil->getAllMerkMobil();
        $data['allSeri'] = $this->m_mobil->getAllSeriMobil();
        $data['allJenis'] = $this->m_mobil->getAllJenisMobil();

        $this->load->view('templates/header_pegawai', $data);
        $this->load->view('templates/navbar_pegawai', $data);
        $this->load->view('mobil/jenis_mobil', $data);
        $this->load->view('templates/footer_pegawai', $data);
    }

    public function tambahmobil()
    {   
        $this->hakakses();

        $this->form_validation->set_rules('id_seri', 'Seri mobil', 'required|trim');
        
        $this->form_validation->set_rules('id_jenis', 'Jenis mobil', 'required|trim');
        
        $this->form_validation->set_rules('warna', 'Warna', 'required|trim|min_length[3]');
        
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim|min_length[4]|numeric');
        
        $this->form_validation->set_rules('plat_nomor', 'Plat Nomor', 'required|trim|min_length[4]|is_unique[mobil.plat_nomor]');
        
        $this->form_validation->set_rules('nomor_rangka', 'Nomor Rangka', 'required|trim|min_length[10]|is_unique[mobil.nomor_rangka]');
        
        $this->form_validation->set_rules('nomor_mesin', 'Nomor Mesin', 'required|trim|min_length[7]|is_unique[mobil.nomor_mesin]');

        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|min_length[4]|numeric');

        // $this->form_validation->set_rules('foto_mobil', 'Foto Mobil', 'required|trim');

        $this->form_validation->set_message('required', 'Kolom {field} harus diisi.');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
        $this->form_validation->set_message('valid_email', 'Kolom {field} harus diisi dengan email yang valid.');
        $this->form_validation->set_message('matches', '{field} tidak sama.');
        $this->form_validation->set_message('is_unique', '{field} telah terdaftar.');
        $this->form_validation->set_message('numeric', 'Kolom {field} harus diisi dengan angka.');
            
        if ( $this->form_validation->run() == FALSE ){
            // echo validation_errors();die;
            $data['appname']    = 'Rental Mobil';
            $data['title']      = 'Tambah Mobil';
            $data['allMobil']   = $this->m_mobil->getAllMobil();
            $data['getseri']    = $this->m_mobil->getAllSeriMobil();
            $data['getjenis']   = $this->m_mobil->getAllJenisMobil();
            
            $email = $this->session->userdata('email');
            $data['pegawai'] = $this->m_pegawai->getPegawai($email);

            $this->load->view('templates/header_pegawai', $data);
            $this->load->view('templates/navbar_pegawai', $data);
            $this->load->view('mobil/tambah');
            $this->load->view('templates/footer_pegawai', $data);

        } else {
            $this->uploadfotomobil();

            $this->session->set_flashdata('message_data_mobil', 'ditambahkan');
            redirect('pegawai/datamobil');
        }
    }

    public function uploadfotomobil()
    {
        $upload_image = $_FILES['foto_mobil']['name'];

        if ($upload_image){

            $config['upload_path']          = './assets/images/foto_mobil';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['max_size']             = 5012;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_mobil')){ //jika berhasil upload
                //upload gambar yg baru
                $new_image = $this->upload->data('file_name');
                $this->m_mobil->tambahmobil($new_image);

            } else{
                //menampilkan pesan error khusus upload
                $this->session->set_flashdata('foto_mobil', '<small class="text-danger">' . 
                $this->upload->display_errors() . '</small>');
                redirect('pegawai/datamobil/tambah');
            }
        } else {
            $this->m_mobil->tambahmobildefault();
        }
    }

    public function tambahmerkmobil()
    {
        $this->hakakses();

        $data = array ('success' => false, 'messages' => array());

        $this->form_validation->set_rules('nama_merk', 'Nama Merk', 'trim|required|is_unique[merk.nama_merk]');  
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi.');
        $this->form_validation->set_message('is_unique', '{field} tersebut telah terdaftar.');

        if($this->form_validation->run()) {
            $data['success'] = true;
            $this->m_mobil->tambahmerkmobil();
            $this->session->set_flashdata('message_merk', 'ditambahkan');
        } else {
            foreach ($_POST as $key => $value) {
                $data['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($data);
    }
    
    public function tambahjenismobil()
    {
        $this->hakakses();

        $data = array ('success' => false, 'messages' => array());

        $this->form_validation->set_rules('nama_jenis', 'Jenis Mobil', 'trim|required|is_unique[jenis_mobil.nama_jenis]');  
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi.');
        $this->form_validation->set_message('is_unique', '{field} tersebut telah terdaftar.');

        if($this->form_validation->run()) {
            $data['success'] = true;
            $this->m_mobil->tambahjenismobil();
            $this->session->set_flashdata('message_jenis', 'ditambahkan');
        } else {
            foreach ($_POST as $key => $value) {
                $data['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($data);
    }
    
    public function tambahserimobil()
    {
        $this->hakakses();

        $data = array ('success' => false, 'messages' => array());

        $this->form_validation->set_rules('id_merk', 'Merk Mobil', 'trim|required');
        $this->form_validation->set_rules('nama_seri', 'Nama Seri', 'trim|required|is_unique[seri.nama_seri]');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
        $this->form_validation->set_message('required', 'Kolom {field} harus diisi.');
        $this->form_validation->set_message('is_unique', '{field} tersebut telah terdaftar.');

        if($this->form_validation->run()) {
            $data['success'] = true;
            $this->m_mobil->tambahserimobil();
            $this->session->set_flashdata('message_seri', 'ditambahkan');
        } else {
            foreach ($_POST as $key => $value) {
                $data['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($data);
    }

    public function editmobil($id_mobil)
    {
        $this->hakakses();

        $data['appname']    = 'Rental Mobil';
        $data['title']      = 'Ubah Mobil';
        $data['allMobil']   = $this->m_mobil->getAllMobil();
        $data['getseri']    = $this->m_mobil->getAllSeriMobil();
        $data['getjenis']   = $this->m_mobil->getAllJenisMobil();
        
        $data['getmobil']   = $this->m_mobil->getMobilById($id_mobil);

        $this->form_validation->set_rules('id_seri', 'Seri mobil', 'required|trim');
        
        $this->form_validation->set_rules('id_jenis', 'Jenis mobil', 'required|trim');
        
        $this->form_validation->set_rules('warna', 'Warna', 'required|trim|min_length[3]');
        
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim|min_length[4]|numeric');
        
        $this->form_validation->set_rules('plat_nomor', 'Plat Nomor', 'required|trim|min_length[4]');
        
        $this->form_validation->set_rules('nomor_rangka', 'Nomor Rangka', 'required|trim|min_length[10]');
        
        $this->form_validation->set_rules('nomor_mesin', 'Nomor Mesin', 'required|trim|min_length[7]');

        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|min_length[4]|numeric');

        $this->form_validation->set_message('required', 'Kolom {field} harus diisi.');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
        $this->form_validation->set_message('valid_email', 'Kolom {field} harus diisi dengan email yang valid.');
        $this->form_validation->set_message('matches', '{field} tidak sama.');
        $this->form_validation->set_message('is_unique', '{field} telah terdaftar.');
        $this->form_validation->set_message('numeric', 'Kolom {field} harus diisi dengan angka.');
            
        if ( $this->form_validation->run() == FALSE ){
            // echo validation_errors();die;
            $email = $this->session->userdata('email');
            $data['pegawai'] = $this->m_pegawai->getPegawai($email);

            $this->load->view('templates/header_pegawai', $data);
            $this->load->view('templates/navbar_pegawai', $data);
            $this->load->view('mobil/ubah');
            $this->load->view('templates/footer_pegawai', $data);

        } else {
            //cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['foto_mobil']['name'];

            if ($upload_image){
                
                $config['upload_path']          = './assets/images/foto_mobil/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['max_size']             = 5012;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_mobil')){ //jika berhasil upload
                    
                    //mengecek gambar profil yg lama
                    $old_image = $data['getmobil']['foto_mobil'];
                    // var_dump($old_image); die;
                    //cek apakah gambar default, apabila gambar default tidak akan dihapus
                    if ($old_image != 'default.jpeg'){ 
                        //apabila gambar bukan default akan dihapus dengan unlink
                        unlink(FCPATH . 'assets/images/foto_mobil' . $old_image); 
                    }

                    //upload gambar yg baru
                    $new_image = $this->upload->data('file_name');
                    $this->m_mobil->updatemobil($new_image, $id_mobil);
                    
                } else{
                    $this->session->set_flashdata('foto_mobil', '<small class="text-danger">' . 
                    $this->upload->display_errors() . '</small>');
                    redirect('pegawai/datamobil/ubah/'.$id_mobil);
                }

            } else{
                $old_image = $data['getmobil']['foto_mobil'];
                $this->m_mobil->updatemobil($old_image, $id_mobil);
            }

            $this->session->set_flashdata('message_data_mobil', 'diubah');
            redirect('pegawai/datamobil');
        }
    }

    public function nonaktifkanmobil($id)
    {
        $this->hakakses();

        $this->m_mobil->nonaktifkanmobil($id);
        $this->session->set_flashdata('message_data_mobil', 'dinonaktifkan');
        redirect('pegawai/datamobil');
    }
    
    public function aktifkanmobil($id)
    {
        $this->hakakses();

        $this->m_mobil->aktifkanmobil($id);
        $this->session->set_flashdata('message_data_mobil', 'diaktifkan');
        redirect('pegawai/datamobil');
    }

    public function nonaktifkanmobilbyjenis()
    {
        $mobilnonaktif = $this->m_mobil->getAllJenisNonaktif();
        if ($mobilnonaktif){
            foreach ($mobilnonaktif as $mobilnon) {
                $this->m_mobil->nonaktifkanjenismobil($mobilnonaktif['id_jenis']);
            }
        }
    }
    
    public function nonaktifkanserimobil($id)
    {
        $this->hakakses();

        $this->m_mobil->nonaktifkanserimobil($id);
        $this->nonaktifkanmobilbyjenis();
        $this->session->set_flashdata('message_seri', 'dinonaktifkan');
        redirect('pegawai/datamobil/merkseri');
    }
    
    public function aktifkanserimobil($id)
    {
        $this->hakakses();

        $this->m_mobil->aktifkanserimobil($id);
        $this->nonaktifkanmobilbyjenis();
        $this->session->set_flashdata('message_seri', 'diaktifkan');
        redirect('pegawai/datamobil/merkseri');
    }
    
    public function nonaktifkanmerkmobil($id_merk)
    {
        $this->hakakses();

        $data['getseribymerk'] = $this->m_mobil->getSeriByMerk($id_merk);
        $id_seri = $data['getseribymerk']['id_seri'];
        $this->m_mobil->nonaktifkanmerkmobil($id_merk, $id_seri);
        $this->nonaktifkanmobilbyjenis();
        $this->session->set_flashdata('message_merk', 'dinonaktifkan');
        redirect('pegawai/datamobil/merkseri');
    }
    
    public function aktifkanmerkmobil($id_merk)
    {
        $this->hakakses();

        $data['getseribymerk'] = $this->m_mobil->getSeriByMerk($id_merk);
        $id_seri = $data['getseribymerk']['id_seri'];
        $this->m_mobil->aktifkanmerkmobil($id_merk, $id_seri);
        $this->nonaktifkanmobilbyjenis();
        $this->session->set_flashdata('message_merk', 'diaktifkan');
        redirect('pegawai/datamobil/merkseri');
    }
    
    public function nonaktifkanjenismobil($id)
    {
        $this->hakakses();

        $this->m_mobil->nonaktifkanjenismobil($id);
        $this->session->set_flashdata('message_jenis', 'dinonaktifkan');
        redirect('pegawai/datamobil/jenis');
    }
    
    public function aktifkanjenismobil($id)
    {
        $this->hakakses();

        $this->m_mobil->aktifkanjenismobil($id);
        $this->session->set_flashdata('message_jenis', 'diaktifkan');
        redirect('pegawai/datamobil/jenis');
    }
}