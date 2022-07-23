<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_pohonkeputusan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_decision_tree');
    }

    public function index()
    {
        $data['pohon_keputusan'] = $this->db->get('tb_pohon_keputusan')->result();
        
        $this->load->view('template/header');
        $this->load->view('admin/V_pohon_keputusan', $data);
        $this->load->view('template/footer');
    }

    public function test_rules()
    {
        $data['test_rules'] = $this->M_decision_tree->test_rules();

        $this->load->view('template/header');
        $this->load->view('admin/V_test_rules', $data);
        $this->load->view('template/footer');
    }
}

/* End of file C_admin.php */
