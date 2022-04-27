<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_dashboard extends CI_Controller
{

    public function index()
    {
    

        $this->load->view('template/header');
        $this->load->view('admin/V_dashboard');
        $this->load->view('template/footer');
    }
}

/* End of file C_admin.php */
