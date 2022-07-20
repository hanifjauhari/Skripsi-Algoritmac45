<?php


defined('BASEPATH') or exit('No direct script access allowed');

class C_mining extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->higher_gain = array();
        $this->higher_gain2 = array();
        $this->uniqueValue = array();
        $this->idAttribute = array("id_kriteria_pekerjaan", "id_kriteria_penghasilan", "id_kriteria_pengeluaran", "id_kriteria_jumlah_tanggungan");
        $this->nameAttribute = array("nama_pekerjaan", "jumlah_penghasilan", "jumlah_pengeluaran", "jumlah_tanggungan");
        $this->dbAttribute = array("tb_kriteria_pekerjaan", "tb_kriteria_penghasilan", "tb_kriteria_pengeluaran", "tb_kriteria_jumlah_tanggungan");
        $this->nodeAttribute = array("Pekerjaan", "Penghasilan", "Pengeluaran", "Jumlah Tanggungan");
        $this->condition = array();
        $this->condition2 = array();

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
        $data['entropy_all'] = $this->count_entropy($data['count_tidak_layak']->result, $data['count_layak']->result);
        $data['algoritm_c45'] = $this->algoritm_c45($data['count_layak']->result, $data['count_tidak_layak']->result);
        $data['attribute_tree'] = $this->attributeTree();
        $data['attribute_tree2'] = $this->attributeTree2();

        $this->load->view('template/header');
        $this->load->view('admin/V_result_mining', $data);
        $this->load->view('template/footer');
    }

    private function count_entropy($value1, $value2) {
        $total = $value1 + $value2;

        if ($value1 == 0 || $value2 == 0) {
            return 0;
        } else {
            $atribut1 = (-($value1/$total) * (log(($value1/$total), 2)));
            $atribut2 = (-($value2/$total) * (log(($value2/$total), 2)));

            $atribut1 = is_nan($atribut1)? 0: $atribut1;
            $atribut2 = is_nan($atribut2)? 0: $atribut2;

            $entropy = $atribut1 + $atribut2;
        }

        return round($entropy, 3);
    }
    
    private function count_gain($value, $count_data, $entropy)
    {
        $result = ($value/$count_data)*$entropy;
        return $result;
    }

    private function algoritm_c45($layak, $tidakLayak) {
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
        
        $result_c45 .= $this->echoTable("Pekerjaan", $workUnique, "id_kriteria_pekerjaan", "nama_pekerjaan", $layak, $tidakLayak);
        $result_c45 .= "<tr><td colspan='6'>&nbsp</td><tr>";
        $result_c45 .= $this->echoTable("Penghasilan", $incomeUnique, "id_kriteria_penghasilan", "jumlah_penghasilan", $layak, $tidakLayak);
        $result_c45 .= "<tr><td colspan='6'>&nbsp</td><tr>";
        $result_c45 .= $this->echoTable("Pengeluaran", $spendUnique, "id_kriteria_pengeluaran", "jumlah_pengeluaran", $layak, $tidakLayak);
        $result_c45 .= "<tr><td colspan='6'>&nbsp</td><tr>";
        $result_c45 .= $this->echoTable("Jumlah Tanggungan", $totDependUnique, "id_kriteria_jumlah_tanggungan", "jumlah_tanggungan", $layak, $tidakLayak);
        
        return $result_c45;
    }

    private function echoTable($nodeAttribute, $wordUnique, $idAttribute, $nameAttribut, $layak, $tidakLayak)
    {
        $entropy_all = $this->count_entropy($layak, $tidakLayak);
        $count_data = $layak + $tidakLayak;
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
        $tmpValue = array();
        foreach ($wordUnique as $alias => $value) {
            array_push($tmpValue, $value);
            $name = $this->M_mining->getNameAttribute($loadDB, $idAttribute, $nameAttribut, $value);
            $data = $this->M_mining->countData("$idAttribute = '$value'");
            $count_layak = $this->M_mining->countData("$idAttribute = '$value' AND label = 'layak'");
            $count_t_layak = $this->M_mining->countData("$idAttribute = '$value' AND label = 'tidak_layak'");
            $entropy = $this->count_entropy($count_layak->result, $count_t_layak->result);
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
                array_push($this->higher_gain, $result_gain);
                array_push($this->uniqueValue, $tmpValue);
                $result_c45 .= "<td>$result_gain</td></tr>";
            } else {
                $result_c45 .= "<td></td></tr>";
            }
        }

        return $result_c45;
    }

    private function attributeTree() {
        // mencari gain terbesar
        $gain = $this->higher_gain;
        
        unset($this->higher_gain);
        $this->higher_gain = array();
        $max = array_keys($gain, max($gain))[0];
        
        $idMax = $this->idAttribute[$max];
        $nameMax = $this->nameAttribute[$max];
        $loadDbMax = $this->dbAttribute[$max];
        $nodeAttrMax = $this->nodeAttribute[$max];

        // hapus index array ketika gain terbesar ditemukan (klasifikasi)
        array_splice($this->idAttribute, $max, 1);
        array_splice($this->nameAttribute, $max, 1);
        array_splice($this->dbAttribute, $max, 1);
        array_splice($this->nodeAttribute, $max, 1);
        array_splice($this->uniqueValue, $max, 1);

        $result_tree = $this->findTree($nodeAttrMax, $loadDbMax, $idMax, $nameMax, "");
        return $result_tree;
    }

    private function attributeTree2() {
        $result_tree = "";

        $gain = $this->higher_gain;
        unset($this->higher_gain);
        $this->higher_gain = array();

        $conditionSet = $this->condition;
        unset($this->condition);
        $this->condition = array();

        foreach ($conditionSet as $key => $value) {
            if (count($this->condition2) > 1) {
                $this->condition2[$key] .= $value;
            } else {
                array_push($this->condition2, $value);
            }
        }
        
        $maxArr = array();
        foreach ($gain as $i => $value) {
            $max = array_keys($value, max($value))[0];
            array_push($maxArr, $max);
        }

        $idMax = $this->idAttribute[$maxArr[0]];
        $nameMax = $this->nameAttribute[$maxArr[0]];
        $loadDbMax = $this->dbAttribute[$maxArr[0]];
        $nodeAttrMax = $this->nodeAttribute[$maxArr[0]];

        array_splice($this->uniqueValue, $maxArr[0], 1);
        array_splice($this->idAttribute, $maxArr[0], 1);
        array_splice($this->nameAttribute, $maxArr[0], 1);
        array_splice($this->dbAttribute, $maxArr[0], 1);
        array_splice($this->nodeAttribute, $maxArr[0], 1);
        $result_tree .= $this->findTree($nodeAttrMax, $loadDbMax, $idMax, $nameMax, $conditionSet[0]);

        $idMax = $this->idAttribute[1];
        $nameMax = $this->nameAttribute[1];
        $loadDbMax = $this->dbAttribute[1];
        $nodeAttrMax = $this->nodeAttribute[1];


        array_splice($this->uniqueValue, 1, 1);
        array_splice($this->idAttribute, 1, 1);
        array_splice($this->nameAttribute, 1, 1);
        array_splice($this->dbAttribute, 1, 1);
        array_splice($this->nodeAttribute, 1, 1);
        $result_tree .= $this->findTree($nodeAttrMax, $loadDbMax, $idMax, $nameMax, $conditionSet[1]);
        
        return $result_tree;
    }

    private function findTree($nodeAttrMax, $loadDbMax, $idMax, $nameMax, $conditionSet)
    {
        $result_tree = "";
        $loadData = $this->M_mining->loadData($loadDbMax, $idMax, $nameMax);
        
        foreach ($loadData as $data) {
            $newCondition = " AND $idMax = '$data->id'";
            
            $checkWorth = $this->M_mining->countData("label = 'layak'". $conditionSet . $newCondition)->result;
            $checkUnWorth = $this->M_mining->countData("label = 'tidak_layak'". $conditionSet . $newCondition)->result;
            $tot_case = $checkWorth + $checkUnWorth;
            if ($checkWorth > $checkUnWorth) { // jika jumlah layak lebih besar
                $unWorthPercen = round($checkUnWorth/$tot_case*100, 3);
                if ($unWorthPercen >= 20) { // cek persentase tidak layak
                    $conditionTmp = $conditionSet . $newCondition;
                    $result_tree .= $this->branchAttribute($nodeAttrMax, $data->jumlah, $checkWorth, $checkUnWorth, $conditionTmp);
                    array_push($this->higher_gain, $this->higher_gain2);
                    unset($this->higher_gain2);
                    $this->higher_gain2 = array();
                    array_push($this->condition, $newCondition);
                } else {
                    // code untuk keputusan layak
                }
            } elseif ($checkUnWorth > $checkWorth) { // jika jumlah tidak layak lebih besar
                $worthPercen = round($checkWorth/$tot_case*100, 3);
                if ($worthPercen >= 20) { // cek persentase layak
                    $conditionTmp = $conditionSet . $newCondition;
                    $result_tree .= $this->branchAttribute($nodeAttrMax, $data->jumlah, $checkWorth, $checkUnWorth, $conditionTmp);
                    array_push($this->higher_gain, $this->higher_gain2);
                    unset($this->higher_gain2);
                    $this->higher_gain2 = array();
                    array_push($this->condition, $newCondition);
                } else {
                    // code untuk keputusan tidak layak
                }
            } else { //jika jumlah layak dan tidak layak sama (auto hitung ulang)
                if ($checkWorth > 0 && $checkUnWorth > 0) {
                    $conditionTmp = $conditionSet . $newCondition;
                    $result_tree .= $this->branchAttribute($nodeAttrMax, $data->jumlah, $checkWorth, $checkUnWorth, $conditionTmp);
                    array_push($this->higher_gain, $this->higher_gain2);
                    unset($this->higher_gain2);
                    $this->higher_gain2 = array();
                    array_push($this->condition, $newCondition);
                } else {
                    // code untuk keputusan
                }
            }
        }
        return $result_tree;
    }

    private function branchAttribute($nodeAttrMax, $valueAttrMax, $worth, $unWorth, $condition)
    {
        $idAttr = $this->idAttribute;
        $nameAttr = $this->nameAttribute;
        $dbAttr = $this->dbAttribute;
        $nodeAttr = $this->nodeAttribute;
        $uniqVal = $this->uniqueValue;

        $result_tree = "";
        $total_case = $worth + $unWorth;
        $entropy = $this->count_entropy($worth, $unWorth);
        $result_tree .= "
            <div class='row'>$nodeAttrMax = $valueAttrMax</div>
            <div class='row'>Jumlah data = $total_case</div>
            <div class='row'>Jumlah layak = $worth</div>
            <div class='row'>Jumlah tidak layak = $unWorth</div>
            <div class='row'>Entropy = $entropy</div>
            <div class='row'>
                <table class='table table-bordered table-hover'>
                    <thead class='table-dark'>
                        <th>Nilai Atribut</th>
                        <th>Jumlah Data</th>
                        <th>Layak</th>
                        <th>Tidak Layak</th>
                        <th>Entropy</th>
                        <th>Gain</th>
                    </thead>";

        for ($i=0; $i < count($uniqVal); $i++) { 
            $result_tree .= $this->echoTable2($nodeAttr[$i], $uniqVal[$i], $dbAttr[$i], $idAttr[$i], $nameAttr[$i], $worth, $unWorth, $condition);
            if ($i != count($uniqVal) -1) {
                $result_tree .= "<tr><td colspan='6'>&nbsp</td><tr>";
            }
        }

        $result_tree .= "
                </table>
            </div>
            <br>
            ";
        return $result_tree;
    }

    private function echoTable2($nodeAttribute, $wordUnique, $loadDB, $idAttribute, $nameAttribut, $layak, $tidakLayak, $condition)
    {
        $entropy_all = $this->count_entropy($layak, $tidakLayak);
        $count_data = $layak + $tidakLayak;
        $result_c45 = "";

        $size = count($wordUnique);
        $i = 0;
        $dump_gain = 0;
        
        foreach ($wordUnique as $alias => $value) {
            $name = $this->M_mining->getNameAttribute($loadDB, $idAttribute, $nameAttribut, $value);
            $data = $this->M_mining->countData("$idAttribute = '$value'$condition");
            $worth = $this->M_mining->countData("$idAttribute = '$value' AND label = 'layak'$condition");
            $unWorth = $this->M_mining->countData("$idAttribute = '$value' AND label = 'tidak_layak'$condition");
            $entropy = $this->count_entropy($worth->result, $unWorth->result);
            $dump_gain += $this->count_gain($data->result, $count_data, $entropy);
            $result_c45 .= "
            <tr>
                <td>$nodeAttribute = $name->name</td>
                <td>$data->result</td>
                <td>$worth->result</td>
                <td>$unWorth->result</td>
                <td>$entropy</td>";
                if (++$i === $size) {
                    $result_gain = round($entropy_all - $dump_gain, 3);
                    array_push($this->higher_gain2, $result_gain);
                    $result_c45 .= "<td>$result_gain</td></tr>";
                } else {
                    $result_c45 .= "<td></td></tr>";
                }
        }
        
        return $result_c45;
    }
}
