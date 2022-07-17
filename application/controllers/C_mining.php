<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_mining extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_datamustahik');
        $this->load->model('M_mining');
        //Do your magic here
    }

    public function index()
    {
        $data = array(
            'data_mustahik' => $this->M_datamustahik->getDataMustahik()
        );
    
        $this->load->view('template/header');
        $this->load->view('admin/V_mining', $data);
        $this->load->view('template/footer');
    }

    public function mining() {
        
    }

    private function count_entropy($value1, $value2, $value3) {
        $total = $value1 + $value2 + $value3;

        $atribut1 = (-($value1/$total) * (log(($value1/$total), 2)));
        $atribut2 = (-($value2/$total) * (log(($value2/$total), 2)));
        $atribut3 = (-($value3/$total) * (log(($value3/$total), 2)));

        $atribut1 = is_nan($atribut1)? 0: $atribut1;
        $atribut2 = is_nan($atribut2)? 0: $atribut2;
        $atribut3 = is_nan($atribut3)? 0: $atribut3;

        $entropy = $atribut1 + $atribut2 +$atribut3;

        return round($entropy, 3);
    }
}
