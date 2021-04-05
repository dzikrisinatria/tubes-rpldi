<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller
{
    public function tambahjenismobil()
    {
        $data['appname'] = 'Rental Mobil App';
        $data['title'] = 'Kelola mobil';
        $sess_username = $this->session->userdata('username');
        $data['user'] = $this->m_auth->getUser($sess_username);

        $data['getmobil'] = $this->m_mobil->getAllmobil();
        $data['getjenis'] = $this->m_mobil->getAllJenis();
        $data['allmobil'] = $this->m_mobil->getAllmobilAndJenis();

        $this->form_validation->set_rules('id_jenis_mobil', 'ID Jenis mobil', 'required|trim');
        $this->form_validation->set_rules('nama_jenis', 'Nama Jenis mobil', 'required|trim');
            
        if ( $this->form_validation->run() == FALSE ){
            // echo "gamasuk"; die;
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('mobil/tambah_jenis', $data);
            $this->load->view('templates/footer', $data);

        } else {
            $this->m_mobil->adddatajenismobil();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Jenis mobil baru berhasil ditambah!</div>');
            redirect('mobil/jenismobil');
        }
    }

    public function editjenismobil($id)
    {
        $data['appname'] = 'Rental Mobil App';
        $data['title'] = 'Kelola mobil';
        $sess_username = $this->session->userdata('username');
        $data['user'] = $this->m_auth->getUser($sess_username);

        $data['getjenis'] = $this->m_mobil->getJenisById($id);
        // var_dump($data['getmobil']); die;
        $data['alljenis'] = $this->m_mobil->getAllJenis();
        $data['allmobil'] = $this->m_mobil->getAllmobilAndJenis();

        $this->form_validation->set_rules('id_jenis_mobil', 'ID Jenis mobil', 'required|trim');
        $this->form_validation->set_rules('nama_jenis', 'Nama Jenis mobil', 'required|trim');
            
        if ( $this->form_validation->run() == FALSE ){
            // echo "gamasuk"; die;
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('mobil/edit_jenis', $data);
            $this->load->view('templates/footer', $data);

        } else {
            $data = $this->m_mobil->editdatajenismobil();
            $this->m_mobil->updateJenismobil($data, $id);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data jenis mobil berhasil diubah!</div>');
            redirect('mobil/jenismobil');
        }
    }

    public function hapusjenismobil($id)
    {
        $data['getjenis'] = $this->m_mobil->getJenisById($id);
        $this->m_mobil->hapusJenismobil($id);
        $this->session->set_flashdata('message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Jenis mobil berhasil dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('mobil/jenismobil');
    }
}