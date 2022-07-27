<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


    function __construct()
    {

        parent::__construct();

        // memanggil model
        $this->load->model('M_login');
    }



    /**
     * 
     *  @ view utama login (tampilan)
     * 
     */
    public function index()
    {

        $this->load->view('login/V_login');
    }




    /**
     * 
     *  1. Login input username dan password
     *  2. Mencocokan antara (user password) dengan database
     *  3. Jika cocok masuk dashboard
     *  4. Jika tidak kembali ke halaman login
     */

    function proseslogin()
    {


        // @TODO 1 : Input username dan password
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // @TODO 2 : Pengecekan user dan password
        $getDataProfile = $this->M_login->getDataProfile($username);
        // cek akun terdaftar ?
        // print_r($username);
        // exit;
        if ($getDataProfile->num_rows() == 1) {

            $kolom = $getDataProfile->row_array();

            // cek password
            $passwordDB = $kolom['password'];


            // pencocokan password DB dengan password dari view
            // if ($passwordDB == $password) { //error lak di bandingno
            if ($passwordDB != $password) {

                /** Tambah session */
                $dataSession = array(

                    'sess_idprofile' => $kolom['id_profile'],
                    'sess_level'    => $kolom['level'],
                    'sess_username' => $kolom['username'],
                    'sess_status' => 'aktif'
                );

                // pasang session 
                $this->session->set_userdata($dataSession);

                if ($kolom['level'] == "admin") {
                    // printf('berhasil');
                    redirect('C_dashboard');
                } else {
                    printf('gagal');
                    // redirect(base_url());
                }
            } else {
                // printf('gagal');

                $this->session->set_flashdata('msg', '<span style="color: #ef5350">Kata sandi salah !</span>');
                redirect(base_url() . '?page=starter&username=' . $username);
            }
        } else {
            // printf('gagals');

            $this->session->set_flashdata('msg', '<span style="color: #ef5350">Username tidak ditemukan !</span>');
            redirect(base_url() . '?page=starter');
        }
    }








    // permintaan kode 
    function proseslupapassword()
    {

        $this->M_login->requestNewCode();
    }





    // verifikasi akun
    function verifyaccount()
    {

        $this->M_login->prosesPerubahanPassword();
    }



    // logout
    function processlogout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->sess_destroy();
        redirect('Main', 'refresh');
    }
}

    
    /* End of file Login.php */
