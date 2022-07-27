<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_kriteria_pengeluaran extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kriteria_pengeluaran');
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
            'title' => 'halaman data kriteria pengeluaran',
            'kriteria_pengeluaran' => $this->M_kriteria_pengeluaran->getDataKriteriaPengeluaran()
        );
        $this->load->view('template/header');
        $this->load->view('admin/V_kriteria_pengeluaran', $data);
        $this->load->view('template/footer');
    }
    public function tambah_data()
    {
        $data = array(
            'title' => 'halaman data kriteria pengeluaran',
            'kriteria_pengeluaran' => $this->M_kriteria_pengeluaran->getDataKriteriaPengeluaran()
        );
        $this->load->view('template/header');
        $this->load->view('admin/V_kriteria_pengeluaran_tambah', $data);
        $this->load->view('template/footer');
    }
    function edit($id_kriteria_pengeluaran)
    {
        $data = array(
            'title' => 'Halaman Data Kriteria pengeluaran',
            'data_kriteria_pengeluaran' => $this->M_kriteria_pengeluaran->getDataKriteriaPengeluaranById($id_kriteria_pengeluaran)
        );

        $this->load->view('template/header', $data);
        $this->load->view('admin/V_kriteria_pengeluaran_edit');
        $this->load->view('template/footer');
    }
    function prosestambah()
    {

        $this->M_kriteria_pengeluaran->insertKriteriaPengeluaran();
    }
    function prosesdelete($id_kriteria_pengeluaran)
    {

        $this->M_kriteria_pengeluaran->deleteKriteriaPengeluaran($id_kriteria_pengeluaran);
    }
    function prosesupdate($id_kriteria_pengeluaran)
    {

        $this->M_kriteria_pengeluaran->updateDataKriteriaPengeluaran($id_kriteria_pengeluaran);
    }
}
