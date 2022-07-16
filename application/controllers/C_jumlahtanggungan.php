<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_jumlahtanggungan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_jumlahtanggungan');
        //Do your magic here
    }

    public function index()
    {

        $data = array(
            'title' => 'halaman data jumlah tanggungan',
            'jumlah_tanggungan' => $this->M_jumlahtanggungan->getDataJumlahTanggungan()
        );
        $this->load->view('template/header');
        $this->load->view('admin/V_jumlahtanggungan', $data);
        $this->load->view('template/footer');
    }
    public function tambah_data()
    {
        $data = array(
            'title' => 'halaman data kriteria jumlah tanggungan',
            'jumlah_tanggungan' => $this->M_jumlahtanggungan->getDataJumlahTanggungan()
        );
        $this->load->view('template/header');
        $this->load->view('admin/V_jumlahtanggungan_tambah', $data);
        $this->load->view('template/footer');
    }
    function edit($id_kriteria_jumlah_tanggungan)
    {
        $data = array(
            'title' => 'Halaman Data Kriteria jumlah tanggungan',
            'data_kriteria_jumlah_tanggungan' => $this->M_jumlahtanggungan->getDataKriteriaJumlahTanggunganById($id_kriteria_jumlah_tanggungan)
        );

        $this->load->view('template/header', $data);
        $this->load->view('admin/V_jumlahtanggungan_edit');
        $this->load->view('template/footer');
    }
    function prosestambah()
    {

        $this->M_jumlahtanggungan->insertJumlahTanggungan();
    }
    function prosesdelete($id_jumlahtanggungan)
    {

        $this->M_jumlahtanggungan->deleteJumlahTanggungan($id_jumlahtanggungan);
    }
    function prosesupdate($id_kriteria_jumlah_tanggungan)
    {

        $this->M_jumlahtanggungan->updateDataKriteriaJumlahTanggungan($id_kriteria_jumlah_tanggungan);
    }
}
