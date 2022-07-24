<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_datamustahik');
    }

    public function index()
    {
        $data['count_data'] = $this->M_datamustahik->countData();

        $this->load->view('template/header');
        $this->load->view('admin/V_dashboard', $data);
    }
}

/* End of file C_admin.php */
