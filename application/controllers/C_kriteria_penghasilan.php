<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_kriteria_penghasilan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kriteria_penghasilan');
        if (
            $this->session->userdata('username') == null &&
            $this->session->userdata('level') != "admin"
        ) {
            redirect('Main','refresh'); 
        }
    }

    public function index()
    {

        $data = array(
            'title' => 'halaman data kriteria penghasilan',
            'kriteria_penghasilan' => $this->M_kriteria_penghasilan->getDataKriteriaPenghasilan()
        );
        $this->load->view('template/header');
        $this->load->view('admin/V_kriteria_penghasilan', $data);
        $this->load->view('template/footer');
    }
    public function tambah_data()
    {
        $data = array(
            'title' => 'halaman data kriteria penghasilan',
            'kriteria_penghasilan' => $this->M_kriteria_penghasilan->getDataKriteriaPenghasilan()
        );
        $this->load->view('template/header');
        $this->load->view('admin/V_kriteria_penghasilan_tambah', $data);
        $this->load->view('template/footer');
    }
    function edit($id_kriteria_penghasilan)
    {
        $data = array(
            'title' => 'Halaman Data Kriteria penghasilan',
            'data_kriteria_penghasilan' => $this->M_kriteria_penghasilan->getDataKriteriaPenghasilanById($id_kriteria_penghasilan)
        );

        $this->load->view('template/header', $data);
        $this->load->view('admin/V_kriteria_penghasilan_edit');
        $this->load->view('template/footer');
    }
    function prosestambah()
    {

        $this->M_kriteria_penghasilan->insertKriteriaPenghasilan();
    }
    function prosesdelete($id_kriteria_penghasilan)
    {

        $this->M_kriteria_penghasilan->deleteKriteriaPenghasilan($id_kriteria_penghasilan);
    }
    function prosesupdate($id_kriteria_penghasilan)
    {

        $this->M_kriteria_penghasilan->updateDataKriteriaPenghasilan($id_kriteria_penghasilan);
    }
}
