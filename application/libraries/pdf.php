<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'third_party/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
class Pdf
{
    public $filename;
    protected $ci;

    public function __construct()
    {
        $this->filename = "laporan.pdf";
        $this->ci =& get_instance();
    }

    public function load_view($view, $data = array(), $paper='A4', $orientation='portrait')
    {
        $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);
        
        $html = $this->ci->load->view($view, $data, TRUE);
        
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($this->filename, array("Attachment", false));
    }
}