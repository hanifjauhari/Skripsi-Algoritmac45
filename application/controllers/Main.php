<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
    }

    public function index()
    {

        $data = array(

            'title'         => "Halaman Utama | LMI",

            'namemodule'    => "user/main",
            'namefileview'  => "V_main"
        );
        $this->load->view('template/template_frontend', $data);
    }



    function futsal()
    {

        $data = array(

            'title'         => "Tentang Futsal | LMI",

            'namemodule'    => "user/main",
            'namefileview'  => "V_info_futsal"
        );
        $this->load->view('template/template_frontend', $data);
    }


    function about()
    {

        $data = array(

            'title'         => "Tentang Kami | LMI",

            'namemodule'    => "user/main",
            'namefileview'  => "V_about"
        );
        $this->load->view('template/template_frontend', $data);
    }
}
    
    /* End of file Main.php */
