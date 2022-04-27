<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_datamustahik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_datamustahik');
        //Do your magic here
    }


    public function index()
    {
        $data = array(
            'title' => 'halaman data mustahik',
            'datamustahik' => $this->M_datamustahik->getDataMustahik()
        );

        $this->load->view('template/header');
        $this->load->view('admin/V_datamustahik', $data);
        $this->load->view('template/footer');
    }
    public function tambah_data()
    {
        $data = array(
            'title' => 'halaman data Mustahik',
            'kriteria_pekerjaan' => $this->M_datamustahik->getDataMustahik()
        );
        $this->load->view('template/header');
        $this->load->view('admin/V_datamustahik_tambah', $data);
        $this->load->view('template/footer');
    }
    function prosestambah()
    {

        $this->M_datamustahik->insertDataMustahik();
    }
    function prosesdelete($id_datamustahik)
    {

        $this->M_datamustahik->deleteDataMustahik($id_datamustahik);
    }
}
