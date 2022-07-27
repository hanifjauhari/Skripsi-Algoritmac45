<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_datamustahik');
        if (
            $this->session->userdata('username') == null &&
            $this->session->userdata('level') != "admin"
        ) {
            redirect('Main','refresh'); 
        }
    }

    public function index()
    {
        $data['count_data'] = $this->M_datamustahik->countData();

        $this->load->view('template/header');
        $this->load->view('admin/V_dashboard', $data);
    }

    public function list_admin()
    {
        $data['list_admin'] = $this->M_datamustahik->listAdmin($this->session->userdata('id'));

        $this->load->view('template/header');
        $this->load->view('admin/V_listAdmin', $data);
        $this->load->view('template/footer');
    }

    public function add_admin()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tb_profile.email]',[
            'is_unique' => 'Email telah terdaftar!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_profile.username]', [
            'is_unique' => 'Username telah terdaftar!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]', [
            'min_length' => 'Password minimal 6 karakter'
        ]);
        $this->form_validation->set_rules('confirm_password', 'Password', 'required|trim|matches[password]', [
			'matches' => 'Konfirmasi Password tidak sama'
		]);
        $this->form_validation->set_rules('level', 'Level', 'trim|required', [
            'required' => 'Silahkan pilih hak akses pengguna baru'
        ]);

        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('admin/V_addAdmin');
            $this->load->view('template/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'level' => $this->input->post('level', true),
                'status' => "aktif"
            ];
            $this->db->insert('tb_profile', $data);
            $this->session->set_flashdata('message', '<div class="alert 
			alert-success" role="alert">Admin baru berhasil ditambahkan</div>');
            redirect('C_dashboard/list_admin', 'refresh');
        }
    }

    public function change_status($newValue)
    {
        $data = explode("-", $newValue);
        $this->db->set('status', $data[0]);
        $this->db->where('id_profile', $data[1])->update('tb_profile');
        return true;
    }
}

/* End of file C_admin.php */
