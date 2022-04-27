<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_pohonkeputusan extends CI_Controller
{

    public function index()
    {


        $this->load->view('template/header');
        $this->load->view('admin/V_pohon_keputusan');
        $this->load->view('template/footer');
    }
}

/* End of file C_admin.php */
