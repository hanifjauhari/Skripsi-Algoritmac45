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

        );
        $data['datamustahik'] = $this->M_datamustahik->getDataMustahik();
        // var_dump($data);
        // exit;
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
    function edit($id_mustahik)
    {
        $data = array(
            'title' => 'Halaman Data Mustahik',
            'data_mustahik' => $this->M_datamustahik->getDataMustahikById($id_mustahik)
        );

        $this->load->view('template/header', $data);
        $this->load->view('admin/V_datamustahik_edit');
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
    function detail($id_mustahik)
    {

        $data = array(

            'title' => 'Halaman Detail Stock Opname ',

            // variable data kategori
            'data_mustahik'  => $this->M_datamustahik->getDataMustahikById($id_mustahik),
            'id_mustahik' => $id_mustahik
        );
        // var_dump($data);
        // exit;
        // print_r($data['stockopname']->result_array());
        $this->load->view('template/header');
        $this->load->view('admin/V_datamustahik_detail', $data);
        $this->load->view('template/footer');
    }
    function prosesupdate($id_mustahik)
    {

        $this->M_datamustahik->updateDataMustahik($id_mustahik);
    }
}
