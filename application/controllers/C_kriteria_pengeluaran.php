<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_kriteria_pengeluaran extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kriteria_pengeluaran');
        //Do your magic here
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
    function prosestambah()
    {

        $this->M_kriteria_pengeluaran->insertKriteriaPengeluaran();
    }
    function prosesdelete($id_kriteria_pengeluaran)
    {

        $this->M_kriteria_pengeluaran->deleteKriteriaPengeluaran($id_kriteria_pengeluaran);
    }
}
