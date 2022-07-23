<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_hasilklasifikasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->i = 1;
        $this->load->model('M_decision_tree');
    }

    public function index()
    {
    

        $this->load->view('template/header');
        $this->load->view('admin/V_hasilklasifikasi');
        $this->load->view('template/footer');
    }

    public function test_rules()
    {
        $dataRules = $this->M_decision_tree->test_rules();
        $data['result'] = $this->findIdRules($dataRules);

        $this->load->view('template/header');
        $this->load->view('admin/V_result_rules_test', $data);
        $this->load->view('template/footer');
    }

    private function findIdRules($dataTest)
    {
        $loadRules = $this->db->get('tb_pohon_keputusan')->result();
        $fields = $this->M_decision_tree->getFieldTable();
        $result = "";
        $true = 0;
        $false = 0;

        // foreach ($loadRules as $rule => $val) {
        //     $newRule = str_replace(array("(", ")"), "", );
        //     foreach ($dataTest as $data => $value) {
                
        //     }
        // }

        // foreach ($dataTest as $data => $value) {
        //     foreach ($loadRules as $rule => $val) {
        //         $newRule = str_replace(array("(", ")"), "", $val->aturan);
                
        //         if (($fields[1]->name." == ".$value->nama) == $newRule) {
        //             $result .= "
        //             <tr>
        //                 <td>". $this->i++ ."</td
        //                 <td>". $value->nama ."</td>
        //                 <td>". $value->pekerjaan ."</td>
        //                 <td>". $value->penghasilan ."</td>
        //                 <td>". $value->pengeluaran ."</td>
        //                 <td>". $value->tanggungan ."</td>
        //                 <td>". $val->id_pohon_keputusan ."</td>";
        //             if ($val->keputusan == $value->label) {
        //                 $result .= "<td><b>benar</b></td></tr>";
        //                 $true++;
        //             } else {
        //                 $result .= "<td>salah</td></tr>";
        //                 $false++;
        //             }
        //         } else if (($fields[2]->name." == ".$value->penghasilan) == $newRule) {
        //             $result .= "
        //             <tr>
        //                 <td>". $this->i++ ."</td
        //                 <td>". $value->nama ."</td>
        //                 <td>". $value->pekerjaan ."</td>
        //                 <td>". $value->penghasilan ."</td>
        //                 <td>". $value->pengeluaran ."</td>
        //                 <td>". $value->tanggungan ."</td>
        //                 <td>". $val->id_pohon_keputusan ."</td>";
        //             if ($val->keputusan == $value->label) {
        //                 $result .= "<td><b>benar</b></td></tr>";
        //                 $true++;
        //             } else {
        //                 $result .= "<td>salah</td></tr>";
        //                 $false++;
        //             }
        //         } else if (($fields[3]->name." == ".$value->pengeluaran) == $newRule) {
        //             $result .= "
        //             <tr>
        //                 <td>". $this->i++ ."</td
        //                 <td>". $value->nama ."</td>
        //                 <td>". $value->pekerjaan ."</td>
        //                 <td>". $value->penghasilan ."</td>
        //                 <td>". $value->pengeluaran ."</td>
        //                 <td>". $value->tanggungan ."</td>
        //                 <td>". $val->id_pohon_keputusan ."</td>";
        //             if ($val->keputusan == $value->label) {
        //                 $result .= "<td><b>benar</b></td></tr>";
        //                 $true++;
        //             } else {
        //                 $result .= "<td>salah</td></tr>";
        //                 $false++;
        //             }
        //         } else if (($fields[4]->name." == ".$value->tanggungan) == $newRule) {
        //             $result .= "
        //             <tr>
        //                 <td>". $this->i ."</td
        //                 <td>". $value->nama ."</td>
        //                 <td>". $value->pekerjaan ."</td>
        //                 <td>". $value->penghasilan ."</td>
        //                 <td>". $value->pengeluaran ."</td>
        //                 <td>". $value->tanggungan ."</td>
        //                 <td>". $val->id_pohon_keputusan ."</td>";
        //             if ($val->keputusan == $value->label) {
        //                 $result .= "<td><b>benar</b></td></tr>";
        //                 $true++;
        //             } else {
        //                 $result .= "<td>salah</td></tr>";
        //                 $false++;
        //             }
        //         }
        //     }
        // }

        return $result;
    }
}