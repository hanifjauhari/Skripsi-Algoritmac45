<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_kriteria_pekerjaan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kriteria_pekerjaan');
        //Do your magic here
    }

    public function index()
    {

        $data = array(
            'title' => 'halaman data kriteria pekerjaan',
            'kriteria_pekerjaan' => $this->M_kriteria_pekerjaan->getDataKriteriaPekerjaan()
        );
        $this->load->view('template/header');
        $this->load->view('admin/V_kriteria_pekerjaan', $data);
        $this->load->view('template/footer');
    }
    public function tambah_data()
    {
        $data = array(
            'title' => 'halaman data kriteria pekerjaan',
            'kriteria_pekerjaan' => $this->M_kriteria_pekerjaan->getDataKriteriaPekerjaan()
        );
        $this->load->view('template/header');
        $this->load->view('admin/V_kriteria_pekerjaan_tambah', $data);
        $this->load->view('template/footer');
    }

    function edit($id_kriteria_pekerjaan)
    {
        $data = array(
            'title' => 'Halaman Data Kriteria pekerjaan',
            'data_kriteria_pekerjaan' => $this->M_kriteria_pekerjaan->getDataKriteriaPekerjaanById($id_kriteria_pekerjaan)
        );

        $this->load->view('template/header', $data);
        $this->load->view('admin/V_kriteria_pekerjaan_edit');
        $this->load->view('template/footer');
    }
    function prosestambah()
    {

        $this->M_kriteria_pekerjaan->insertKriteriaPekerjaan();
    }
    function prosesdelete($id_kriteria_pekerjaan)
    {

        $this->M_kriteria_pekerjaan->deleteKriteriaPekerjaan($id_kriteria_pekerjaan);
    }
    function prosesupdate($id_kriteria_pekerjaan)
    {

        $this->M_kriteria_pekerjaan->updateDataKriteriaPekerjaan($id_kriteria_pekerjaan);
    }
}
