<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function register()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tb_profile.email]',[
            'is_unique' => 'Email telah teregistrasi!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_profile.username]', [
            'is_unique' => 'Username telah teregistrasi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');

        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'level' => "admin",
            'status' => "aktif"
        ];
        $this->db->insert('tb_profile', $data);
        redirect('Main', 'refresh');
    }

    public function login()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        $validate = $this->db->get_where('tb_profile', ['username' => $username])->row();
        if ($validate) {
            if ($validate->status == "aktif") {
                if (password_verify($password, $validate->password)) {
                    $session = [
                        'id' => $validate->id_profile,
                        'username' => $validate->username,
                        'level' => $validate->level
                    ];
                    $this->session->set_userdata($session);
                    if ($session['level'] == "admin") {
                        redirect('C_dashboard', 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('message', '<small><div class="alert alert-danger" 
				    role="alert">Password salah!</div></small>');
                    redirect('Main');
                }
            } else {
                $this->session->set_flashdata('message', '<small><div class="alert alert-danger" 
				    role="alert">Akun sedang tidak aktif. Silahkan hubungi admin</div></small>');
                redirect('Main');
            }
        } else {
            $this->session->set_flashdata('message', '<small><div class="alert alert-danger" 
				    role="alert">Akun tidak ditemukan!</div></small>');
            redirect('Main');
        }
    }
}