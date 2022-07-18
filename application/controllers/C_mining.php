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
        $data['count_data'] = $this->M_mining->countData();
        $data['count_layak'] = $this->M_mining->countData("label = 'layak'");
        $data['count_tidak_layak'] = $this->M_mining->countData("label = 'tidak_layak'");
        $data['entropy_all'] = $this->count_entropy($data['count_layak']->result, $data['count_tidak_layak']->result, 0);
        $data['algoritm_c45'] = $this->algoritm_c45($data['count_data']->result, $data['count_layak']->result, $data['count_tidak_layak']->result);

        $this->load->view('template/header');
        $this->load->view('admin/V_result_mining', $data);
        $this->load->view('template/footer');
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
    
    private function count_gain($value, $count_data, $entropy)
    {
        $result = ($value/$count_data)*$entropy;
        return $result;
    }

    private function algoritm_c45($count_data, $layak, $tidakLayak) {
        $result_c45 = "";

        $mustahik = $this->M_datamustahik->getDataMustahik();
        $pekerjaan = array();
        $penghasilan = array();
        $pengeluaran = array();
        $jml_tanggungan = array();

        foreach ($mustahik as $mus) {
            array_push($pekerjaan, $mus['id_pekerjaan']);
            array_push($penghasilan, $mus['id_penghasilan']);
            array_push($pengeluaran, $mus['id_pengeluaran']);
            array_push($jml_tanggungan, $mus['id_jumlah_tanggungan']);
        }
        $workUnique = array_unique($pekerjaan);
        asort($workUnique);
        $incomeUnique = array_unique($penghasilan);
        asort($incomeUnique);
        $spendUnique = array_unique($pengeluaran);
        asort($spendUnique);
        $totDependUnique = array_unique($jml_tanggungan);
        asort($totDependUnique);

        $result_c45 .= $this->echoTable("Pekerjaan", $workUnique, "id_kriteria_pekerjaan", "nama_pekerjaan", $count_data, $layak, $tidakLayak);
        $result_c45 .= "<tr><td colspan='6'>&nbsp</td><tr>";
        $result_c45 .= $this->echoTable("Penghasilan", $incomeUnique, "id_kriteria_penghasilan", "jumlah_penghasilan", $count_data, $layak, $tidakLayak);
        $result_c45 .= "<tr><td colspan='6'>&nbsp</td><tr>";
        $result_c45 .= $this->echoTable("Pengeluaran", $spendUnique, "id_kriteria_pengeluaran", "jumlah_pengeluaran", $count_data, $layak, $tidakLayak);
        $result_c45 .= "<tr><td colspan='6'>&nbsp</td><tr>";
        $result_c45 .= $this->echoTable("Jumlah Tanggungan", $totDependUnique, "id_kriteria_jumlah_tanggungan", "jumlah_tanggungan", $count_data, $layak, $tidakLayak);
        
        return $result_c45;
    }

    private function echoTable($nodeAttribute, $wordUnique, $idAttribute, $nameAttribut, $count_data, $layak, $tidakLayak)
    {
        $entropy_all = $this->count_entropy($layak, $tidakLayak, 0);
        $result_c45 = "";
        if ($nodeAttribute == "Pekerjaan") {
            $loadDB = "tb_kriteria_pekerjaan";
        } elseif ($nodeAttribute == "Penghasilan") {
            $loadDB = "tb_kriteria_penghasilan";
        } elseif ($nodeAttribute == "Pengeluaran") {
            $loadDB = "tb_kriteria_pengeluaran";
        } elseif ($nodeAttribute == "Jumlah Tanggungan") {
            $loadDB = "tb_kriteria_jumlah_tanggungan";
        }

        $size = count($wordUnique);
        $i = 0;
        $dump_gain = 0;
        foreach ($wordUnique as $alias => $value) {
            $name = $this->M_mining->getNameAtribute($loadDB, $idAttribute, $nameAttribut, $value);
            $data = $this->M_mining->countData("$idAttribute = '$value'");
            $count_layak = $this->M_mining->countData("$idAttribute = '$value' AND label = 'layak'");
            $count_t_layak = $this->M_mining->countData("$idAttribute = '$value' AND label = 'tidak_layak'");
            $entropy = $this->count_entropy($count_layak->result, $count_t_layak->result, 0);
            $dump_gain += $this->count_gain($data->result, $count_data, $entropy);
            $result_c45 .= "
            <tr>
                <td>$nodeAttribute = $name->name</td>
                <td>$data->result</td>
                <td>$count_layak->result</td>
                <td>$count_t_layak->result</td>
                <td>$entropy</td>";
            if (++$i === $size) {
                $result_gain = round($entropy_all - $dump_gain, 3);
                $result_c45 .= "<td>$result_gain</td></tr>";
            } else {
                $result_c45 .= "<td></td></tr>";
            }
        }

        return $result_c45;
    }
}
