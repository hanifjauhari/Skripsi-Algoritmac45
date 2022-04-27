<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_admin extends CI_Controller
{

    public function index()
    {
        $data = array(
            'title' => "Halaman Admin"
        );

        $this->load->view('template/tmp_admin/header', $data);
        $this->load->view('admin/test');
        $this->load->view('template/tmp_admin/footer');
    }
}

/* End of file C_admin.php */
