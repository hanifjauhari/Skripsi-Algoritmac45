<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_hasilklasifikasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->i = 1;
        $this->true = 0;
        $this->false = 0;
        $this->load->model('M_decision_tree');

        if (
            $this->session->userdata('username') == null &&
            $this->session->userdata('level') != "admin"
        ) {
            redirect('Main','refresh'); 
        }
    }

    // public function index()
    // {

    //     $this->load->view('template/header');
    //     $this->load->view('admin/V_hasilklasifikasi');
    //     $this->load->view('template/footer');
    // }

    public function test_rules()
    {
        $dataRules = $this->M_decision_tree->test_rules();
        $data['result'] = $this->findIdRules($dataRules);
        $data['accuracy'] = $this->countAccuracy();

        $this->load->view('template/header');
        $this->load->view('admin/V_result_rules_test', $data);
        $this->load->view('template/footer');
    }

    public function print()
    {
        $dataRules = $this->M_decision_tree->test_rules();
        $data['result'] = $this->findIdRules($dataRules);

        $this->load->library('pdf');
        $this->pdf->filename = "hasil-uji-coba-pohon-keputusan.pdf";
        $this->pdf->load_view('admin/V_print_result_decision_tree', $data, 'A4', 'landscape');
    }

    private function findIdRules($dataTest)
    {
        $loadRules = $this->db->get('tb_pohon_keputusan')->result();
        $fields = $this->M_decision_tree->getFieldTable();
        $resultSort = array();
        $result = "";

        foreach ($dataTest as $data => $value) {
            $decisionLabel = "";
            $idRule = 0;
            $resultAccuracy = "";
            foreach ($loadRules as $rule => $val) {
                $newRule = str_replace(array("(", ")"), "", $val->aturan);
                
                if (($fields[0]->name." == ".$value->pekerjaan) == $newRule || 
                    ($fields[1]->name." == ".$value->penghasilan) == $newRule || 
                    ($fields[2]->name." == ".$value->pengeluaran) == $newRule || 
                    ($fields[3]->name." == ".$value->tanggungan) == $newRule) {
                    $idRule = $val->id_pohon_keputusan;
                    $decisionLabel = $val->keputusan;
                } elseif (($fields[0]->name." == ".$value->pekerjaan." AND ".$fields[1]->name." == ".$value->penghasilan) == $newRule ||
                    ($fields[0]->name." == ".$value->pekerjaan." AND ".$fields[2]->name." == ".$value->pengeluaran) == $newRule ||
                    ($fields[0]->name." == ".$value->pekerjaan." AND ".$fields[3]->name." == ".$value->tanggungan) == $newRule ||

                    ($fields[1]->name." == ".$value->penghasilan." AND ".$fields[0]->name." == ".$value->pekerjaan) == $newRule ||
                    ($fields[1]->name." == ".$value->penghasilan." AND ".$fields[2]->name." == ".$value->pengeluaran) == $newRule ||
                    ($fields[1]->name." == ".$value->penghasilan." AND ".$fields[3]->name." == ".$value->tanggungan) == $newRule ||

                    ($fields[2]->name." == ".$value->pengeluaran." AND ".$fields[0]->name." == ".$value->pekerjaan) == $newRule ||
                    ($fields[2]->name." == ".$value->pengeluaran." AND ".$fields[1]->name." == ".$value->penghasilan) == $newRule ||
                    ($fields[2]->name." == ".$value->pengeluaran." AND ".$fields[3]->name." == ".$value->tanggungan) == $newRule ||

                    ($fields[3]->name." == ".$value->tanggungan." AND ".$fields[0]->name." == ".$value->pekerjaan) == $newRule ||
                    ($fields[3]->name." == ".$value->tanggungan." AND ".$fields[1]->name." == ".$value->penghasilan) == $newRule ||
                    ($fields[3]->name." == ".$value->tanggungan." AND ".$fields[2]->name." == ".$value->pengeluaran) == $newRule) {
                    $idRule = $val->id_pohon_keputusan;
                    $decisionLabel = $val->keputusan;
                } elseif (($fields[0]->name." == ".$value->pekerjaan." AND ".$fields[1]->name." == ".$value->penghasilan." AND ".$fields[2]->name." == ".$value->pengeluaran) == $newRule ||
                    ($fields[0]->name." == ".$value->pekerjaan." AND ".$fields[1]->name." == ".$value->penghasilan." AND ".$fields[3]->name." == ".$value->tanggungan) == $newRule ||
                    ($fields[0]->name." == ".$value->pekerjaan." AND ".$fields[2]->name." == ".$value->pengeluaran." AND ".$fields[1]->name." == ".$value->penghasilan) == $newRule ||
                    ($fields[0]->name." == ".$value->pekerjaan." AND ".$fields[2]->name." == ".$value->pengeluaran." AND ".$fields[3]->name." == ".$value->tanggungan) == $newRule ||
                    ($fields[0]->name." == ".$value->pekerjaan." AND ".$fields[3]->name." == ".$value->tanggungan." AND ".$fields[1]->name." == ".$value->penghasilan) == $newRule ||
                    ($fields[0]->name." == ".$value->pekerjaan." AND ".$fields[3]->name." == ".$value->tanggungan." AND ".$fields[2]->name." == ".$value->pengeluaran) == $newRule ||

                    ($fields[1]->name." == ".$value->penghasilan." AND ".$fields[0]->name." == ".$value->pekerjaan." AND ".$fields[2]->name." == ".$value->pengeluaran) == $newRule ||
                    ($fields[1]->name." == ".$value->penghasilan." AND ".$fields[0]->name." == ".$value->pekerjaan." AND ".$fields[3]->name." == ".$value->tanggungan) == $newRule ||
                    ($fields[1]->name." == ".$value->penghasilan." AND ".$fields[2]->name." == ".$value->pengeluaran." AND ".$fields[0]->name." == ".$value->pekerjaan) == $newRule ||
                    ($fields[1]->name." == ".$value->penghasilan." AND ".$fields[2]->name." == ".$value->pengeluaran." AND ".$fields[3]->name." == ".$value->tanggungan) == $newRule ||
                    ($fields[1]->name." == ".$value->penghasilan." AND ".$fields[3]->name." == ".$value->tanggungan." AND ".$fields[0]->name." == ".$value->pekerjaan) == $newRule ||
                    ($fields[1]->name." == ".$value->penghasilan." AND ".$fields[3]->name." == ".$value->tanggungan." AND ".$fields[2]->name." == ".$value->pengeluaran) == $newRule ||

                    ($fields[2]->name." == ".$value->pengeluaran." AND ".$fields[0]->name." == ".$value->pekerjaan." AND ".$fields[1]->name." == ".$value->penghasilan) == $newRule ||
                    ($fields[2]->name." == ".$value->pengeluaran." AND ".$fields[0]->name." == ".$value->pekerjaan." AND ".$fields[3]->name." == ".$value->tanggungan) == $newRule ||
                    ($fields[2]->name." == ".$value->pengeluaran." AND ".$fields[1]->name." == ".$value->penghasilan." AND ".$fields[0]->name." == ".$value->pekerjaan) == $newRule ||
                    ($fields[2]->name." == ".$value->pengeluaran." AND ".$fields[1]->name." == ".$value->penghasilan." AND ".$fields[3]->name." == ".$value->tanggungan) == $newRule ||
                    ($fields[2]->name." == ".$value->pengeluaran." AND ".$fields[3]->name." == ".$value->tanggungan." AND ".$fields[0]->name." == ".$value->pekerjaan) == $newRule ||
                    ($fields[2]->name." == ".$value->pengeluaran." AND ".$fields[3]->name." == ".$value->tanggungan." AND ".$fields[1]->name." == ".$value->penghasilan) == $newRule ||
                    
                    ($fields[3]->name." == ".$value->tanggungan." AND ".$fields[0]->name." == ".$value->pekerjaan." AND ".$fields[1]->name." == ".$value->penghasilan) == $newRule ||
                    ($fields[3]->name." == ".$value->tanggungan." AND ".$fields[0]->name." == ".$value->pekerjaan." AND ".$fields[2]->name." == ".$value->pengeluaran) == $newRule ||
                    ($fields[3]->name." == ".$value->tanggungan." AND ".$fields[1]->name." == ".$value->penghasilan." AND ".$fields[0]->name." == ".$value->pekerjaan) == $newRule ||
                    ($fields[3]->name." == ".$value->tanggungan." AND ".$fields[1]->name." == ".$value->penghasilan." AND ".$fields[2]->name." == ".$value->pengeluaran) == $newRule ||
                    ($fields[3]->name." == ".$value->tanggungan." AND ".$fields[2]->name." == ".$value->pengeluaran." AND ".$fields[0]->name." == ".$value->pekerjaan) == $newRule ||
                    ($fields[3]->name." == ".$value->tanggungan." AND ".$fields[2]->name." == ".$value->pengeluaran." AND ".$fields[1]->name." == ".$value->penghasilan) == $newRule) {
                    $idRule = $val->id_pohon_keputusan;
                    $decisionLabel = $val->keputusan;
                } elseif (($fields[0]->name." == ".$value->pekerjaan." AND ".$fields[1]->name." == ".$value->penghasilan." AND ".$fields[2]->name." == ".$value->pengeluaran." AND ".$fields[3]->name." == ".$value->tanggungan) == $newRule ||
                    ($fields[0]->name." == ".$value->pekerjaan." AND ".$fields[1]->name." == ".$value->penghasilan." AND ".$fields[3]->name." == ".$value->tanggungan." AND ".$fields[2]->name." == ".$value->pengeluaran) == $newRule ||
                    ($fields[0]->name." == ".$value->pekerjaan." AND ".$fields[2]->name." == ".$value->pengeluaran." AND ".$fields[1]->name." == ".$value->penghasilan." AND ".$fields[3]->name." == ".$value->tanggungan) == $newRule ||
                    ($fields[0]->name." == ".$value->pekerjaan." AND ".$fields[2]->name." == ".$value->pengeluaran." AND ".$fields[3]->name." == ".$value->tanggungan." AND ".$fields[1]->name." == ".$value->penghasilan) == $newRule ||
                    ($fields[0]->name." == ".$value->pekerjaan." AND ".$fields[3]->name." == ".$value->tanggungan." AND ".$fields[1]->name." == ".$value->penghasilan." AND ".$fields[2]->name." == ".$value->pengeluaran) == $newRule ||
                    ($fields[0]->name." == ".$value->pekerjaan." AND ".$fields[3]->name." == ".$value->tanggungan." AND ".$fields[2]->name." == ".$value->pengeluaran." AND ".$fields[1]->name." == ".$value->penghasilan) == $newRule ||

                    ($fields[1]->name." == ".$value->penghasilan." AND ".$fields[0]->name." == ".$value->pekerjaan." AND ".$fields[2]->name." == ".$value->pengeluaran." AND ".$fields[3]->name." == ".$value->tanggungan) == $newRule ||
                    ($fields[1]->name." == ".$value->penghasilan." AND ".$fields[0]->name." == ".$value->pekerjaan." AND ".$fields[3]->name." == ".$value->tanggungan." AND ".$fields[2]->name." == ".$value->pengeluaran) == $newRule ||
                    ($fields[1]->name." == ".$value->penghasilan." AND ".$fields[2]->name." == ".$value->pengeluaran." AND ".$fields[3]->name." == ".$value->tanggungan." AND ".$fields[0]->name." == ".$value->pekerjaan) == $newRule ||
                    ($fields[1]->name." == ".$value->penghasilan." AND ".$fields[2]->name." == ".$value->pengeluaran." AND ".$fields[0]->name." == ".$value->pekerjaan." AND ".$fields[3]->name." == ".$value->tanggungan) == $newRule ||
                    ($fields[1]->name." == ".$value->penghasilan." AND ".$fields[3]->name." == ".$value->tanggungan." AND ".$fields[2]->name." == ".$value->pengeluaran." AND ".$fields[0]->name." == ".$value->pekerjaan) == $newRule ||
                    ($fields[1]->name." == ".$value->penghasilan." AND ".$fields[3]->name." == ".$value->tanggungan." AND ".$fields[0]->name." == ".$value->pekerjaan." AND ".$fields[2]->name." == ".$value->pengeluaran) == $newRule ||
                    
                    ($fields[2]->name." == ".$value->penghasilan." AND ".$fields[0]->name." == ".$value->pekerjaan." AND ".$fields[1]->name." == ".$value->penghasilan." AND ".$fields[3]->name." == ".$value->tanggungan) == $newRule ||
                    ($fields[2]->name." == ".$value->penghasilan." AND ".$fields[0]->name." == ".$value->pekerjaan." AND ".$fields[3]->name." == ".$value->tanggungan." AND ".$fields[1]->name." == ".$value->penghasilan) == $newRule ||
                    ($fields[2]->name." == ".$value->penghasilan." AND ".$fields[1]->name." == ".$value->penghasilan." AND ".$fields[0]->name." == ".$value->pekerjaan." AND ".$fields[3]->name." == ".$value->tanggungan) == $newRule ||
                    ($fields[2]->name." == ".$value->penghasilan." AND ".$fields[1]->name." == ".$value->penghasilan." AND ".$fields[3]->name." == ".$value->tanggungan." AND ".$fields[0]->name." == ".$value->pekerjaan) == $newRule ||
                    ($fields[2]->name." == ".$value->penghasilan." AND ".$fields[3]->name." == ".$value->tanggungan." AND ".$fields[0]->name." == ".$value->pekerjaan." AND ".$fields[1]->name." == ".$value->penghasilan) == $newRule ||
                    ($fields[2]->name." == ".$value->penghasilan." AND ".$fields[3]->name." == ".$value->tanggungan." AND ".$fields[1]->name." == ".$value->penghasilan." AND ".$fields[0]->name." == ".$value->pekerjaan) == $newRule ||
                    
                    ($fields[3]->name." == ".$value->penghasilan." AND ".$fields[0]->name." == ".$value->pekerjaan." AND ".$fields[1]->name." == ".$value->penghasilan." AND ".$fields[2]->name." == ".$value->pengeluaran) == $newRule ||
                    ($fields[3]->name." == ".$value->penghasilan." AND ".$fields[0]->name." == ".$value->pekerjaan." AND ".$fields[2]->name." == ".$value->pengeluaran." AND ".$fields[1]->name." == ".$value->penghasilan) == $newRule ||
                    ($fields[3]->name." == ".$value->penghasilan." AND ".$fields[1]->name." == ".$value->penghasilan." AND ".$fields[0]->name." == ".$value->pekerjaan." AND ".$fields[2]->name." == ".$value->pengeluaran) == $newRule ||
                    ($fields[3]->name." == ".$value->penghasilan." AND ".$fields[1]->name." == ".$value->penghasilan." AND ".$fields[2]->name." == ".$value->pengeluaran." AND ".$fields[0]->name." == ".$value->pekerjaan) == $newRule ||
                    ($fields[3]->name." == ".$value->penghasilan." AND ".$fields[2]->name." == ".$value->pengeluaran." AND ".$fields[0]->name." == ".$value->pekerjaan." AND ".$fields[1]->name." == ".$value->penghasilan) == $newRule ||
                    ($fields[3]->name." == ".$value->penghasilan." AND ".$fields[2]->name." == ".$value->pengeluaran." AND ".$fields[1]->name." == ".$value->penghasilan." AND ".$fields[0]->name." == ".$value->pekerjaan) == $newRule) {
                    $idRule = $val->id_pohon_keputusan;
                    $decisionLabel = $val->keputusan;
                }
            }

            if ($value->label == $decisionLabel) {
                $resultAccuracy = "benar";
                $this->true++;
            } else {
                $resultAccuracy = "salah";
                $this->false++;
            }

            // mengisi variabel resultSort
            array_push(
                $resultSort,
                array(
                    "nama" => $value->nama,
                    "pekerjaan" => $value->pekerjaan,
                    "penghasilan" => $value->penghasilan,
                    "pengeluaran" => $value->pengeluaran,
                    "tanggungan" => $value->tanggungan,
                    "label" => $value->label,
                    "label_result" => $decisionLabel,
                    "id_rule" => $idRule,
                    "state" => $resultAccuracy
                )
            );
        }
        // mengurutkan data berdasarkan id rule
        usort($resultSort, function($a, $b) {
            return $a['id_rule'] - $b['id_rule'];
        });
        
        foreach ($resultSort as $key => $value) {
            $result .= "
                <tr>
                    <td>".$this->i++."</td>
                    <td>".$value['nama']."</td>
                    <td>".$value['pekerjaan']."</td>
                    <td>".$value['penghasilan']."</td>
                    <td>".$value['pengeluaran']."</td>
                    <td>".$value['tanggungan']."</td>
                    <td>".$value['label']."</td>
                    <td>".$value['label_result']."</td>
                    <td>".$value['id_rule']."</td>
                    <td>". ($value['state']=='benar'?"<b>".$value['state']."</b>":$value['state']) ."</td>
                </tr>
            ";
        }

        return $result;
    }

    private function countAccuracy()
    {
        $true = $this->true;
        $false = $this->false;
        $totalData = $true + $false;

        $truePercentage = round($true/$totalData*100, 2);
        $falsePercentage = round($false/$totalData*100, 2);

        return "
            <div class='text-center'>Jumlah prediksi: $totalData</div>
            <div class='text-center'>Jumlah tepat: $true</div>
            <div class='text-center'>Jumlah tidak tepat: $false</div>
            <div class='text-center font-weight-bold'><h4>Akurasi = $truePercentage%</h4></div>
            <div class='text-center font-weight-bold'><h4>Tidak Akurat = $falsePercentage%</h4></div>
        ";
    }
}