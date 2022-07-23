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
        $this->decision = array();
        $this->decision2 = array();
        $this->classificationAttr = array();
        $this->parentTreeAttribute = "";
        $this->i = 1;

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
        $this->db->empty_table('tb_pohon_keputusan');
        
        $data['count_data'] = $this->M_mining->countData();
        $data['count_layak'] = $this->M_mining->countData("label = 'layak'");
        $data['count_tidak_layak'] = $this->M_mining->countData("label = 'tidak_layak'");
        $data['entropy_all'] = $this->count_entropy($data['count_tidak_layak']->result, $data['count_layak']->result);
        $data['algoritm_c45'] = $this->algoritm_c45($data['count_layak']->result, $data['count_tidak_layak']->result);
        $data['attribute_tree'] = $this->attributeTree();
        $data['attribute_tree2'] = $this->attributeTree2();
        $data['attribute_tree3'] = $this->attributeTree3();

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

    private function echoTable($nodeAttribute, $wordUnique, $idAttribute, $nameAttribute, $layak, $tidakLayak)
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
            $name = $this->M_mining->getNameAttribute($loadDB, $idAttribute, $nameAttribute, $value);
            $data = $this->M_mining->countData("$idAttribute = '$value'");
            $count_layak = $this->M_mining->countData("$idAttribute = '$value' AND label = 'layak'")->result;
            $count_t_layak = $this->M_mining->countData("$idAttribute = '$value' AND label = 'tidak_layak'")->result;
            $entropy = $this->count_entropy($count_layak, $count_t_layak);
            $dump_gain += $this->count_gain($data->result, $count_data, $entropy);
            $result_c45 .= "
            <tr>
                <td>$nodeAttribute = $name->name</td>
                <td>$data->result</td>
                <td>$count_layak</td>
                <td>$count_t_layak</td>
                <td>$entropy</td>";
            if (++$i === $size) {
                $result_gain = round($entropy_all - $dump_gain, 3);
                array_push($this->higher_gain, $result_gain);
                array_push($this->uniqueValue, $tmpValue);
                $result_c45 .= "<td>$result_gain</td></tr>";
            } else {
                $result_c45 .= "<td></td></tr>";
            }

            $tot_case = $count_layak + $count_t_layak;
            if ($count_layak > $count_t_layak) {
                $unWorthPercen = round($count_t_layak/$tot_case*100, 3);
                if ($unWorthPercen < 20) {
                    $decision = "($nameAttribute == $name->name)";
                    $data = array(
                        'id_pohon_keputusan' => $this->i++,
                        'aturan' => $decision,
                        'keputusan' => "layak"
                    );
                    $this->db->insert('tb_pohon_keputusan', $data);
                }
            } else if ($count_t_layak > $count_layak) {
                $worthPercen = round($count_layak/$tot_case*100, 3);
                if ($worthPercen < 20) {
                    $decision = "($nameAttribute == $name->name)";
                    $data = array(
                        'id_pohon_keputusan' => $this->i++,
                        'aturan' => $decision,
                        'keputusan' => "tidak_layak"
                    );
                    $this->db->insert('tb_pohon_keputusan', $data);
                }
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

        $result_tree = $this->findTree($nodeAttrMax, $loadDbMax, $idMax, $nameMax, "", "", $this->idAttribute, $this->nameAttribute, $this->dbAttribute, $this->nodeAttribute, $this->uniqueValue, $max);
        return $result_tree;
    }

    private function attributeTree2() {
        $result_tree = "";

        $gain = $this->higher_gain;
        unset($this->higher_gain);
        $this->higher_gain = array();

        $conditionSet = $this->condition;
        $decisionSet = $this->decision;

        unset($this->classificationAttr);
        $this->classificationAttr = array();

        foreach ($gain as $i => $value) {
            $max = array_keys($value, max($value))[0];

            $id = $this->idAttribute;
            $name = $this->nameAttribute;
            $db = $this->dbAttribute;
            $node = $this->nodeAttribute;
            $unique = $this->uniqueValue;

            $idMax = $id[$max];
            $nameMax = $name[$max];
            $loadDbMax = $db[$max];
            $nodeAttrMax = $node[$max];

            array_splice($id, $max, 1);
            array_splice($name, $max, 1);
            array_splice($db, $max, 1);
            array_splice($node, $max, 1);
            array_splice($unique, $max, 1);
            $result_tree .= $this->findTree($nodeAttrMax, $loadDbMax, $idMax, $nameMax, $conditionSet[$i], $decisionSet[$i], $id, $name, $db, $node, $unique, $max);
        }
        
        return $result_tree;
    }

    private function attributeTree3() {
        $result_tree = "";
        
        $gain = $this->higher_gain;
        unset($this->higher_gain);
        $this->higher_gain = array();

        $conditionSet = $this->condition2;
        unset($this->condition);
        $this->condition = array();

        $decisionSet = $this->decision2;
        unset($this->decision);
        $this->decision = array();

        $clsfAttr = $this->classificationAttr;
        unset($this->classificationAttr);
        $this->classificationAttr = array();

        $unique = $this->uniqueValue;
        array_splice($unique, 1);

        $idMax = array();
        $nameMax = array();
        $dbMax = array();
        $nodeMax = array();

        $idArr = array();
        $nameArr = array();
        $dbArr = array();
        $nodeArr = array();

        $maxVal = array();

        for($i = 0; $i < count($gain); $i++) {
            $max = array_keys($gain[$i], max($gain[$i]))[0];

            $id = $this->idAttribute;
            $name = $this->nameAttribute;
            $db = $this->dbAttribute;
            $node = $this->nodeAttribute;
            
            array_splice($id, $clsfAttr[$i], 1);
            array_splice($name, $clsfAttr[$i], 1);
            array_splice($db, $clsfAttr[$i], 1);
            array_splice($node, $clsfAttr[$i], 1);

            array_push($maxVal, $max);
            array_push($idMax, $id[$max]);
            array_push($nameMax, $name[$max]);
            array_push($dbMax, $db[$max]);
            array_push($nodeMax, $node[$max]);

            array_splice($id, $max, 1);
            array_splice($name, $max, 1);
            array_splice($db, $max, 1);
            array_splice($node, $max, 1);

            array_push($idArr, $id);
            array_push($nameArr, $name);
            array_push($dbArr, $db);
            array_push($nodeArr, $node);
        }
        for ($i=0; $i < count($dbMax); $i++) { 
            if ($i+1 != count($dbMax) && $dbMax[$i] == $dbMax[$i+1]) {
                continue;
            }
            $result_tree .= $this->findTree($nodeMax[$i], $dbMax[$i], $idMax[$i], $nameMax[$i], $conditionSet[$i], $decisionSet[$i], $idArr[$i], $nameArr[$i], $dbArr[$i], $nodeArr[$i], $unique, $max);
        }

        return $result_tree;
    }

    private function findTree($nodeAttrMax, $loadDbMax, $idMax, $nameMax, $conditionSet,  $decisionSet, $idAttr, $nameAttr, $dbAttr, $nodeAttr, $uniqVal, $max)
    {
        $result_tree = "";
        $loadData = $this->M_mining->loadData($loadDbMax, $idMax, $nameMax);

        for ($i = 0; $i < count($loadData); $i++) {
            $newCondition = " AND $idMax = '". $loadData[$i]->id ."'";
            $newDecision = "";
            if ($decisionSet == "") {
                $newDecision = "($nameMax == " . $loadData[$i]->jumlah. ")";
            } else {
                $newDecision = " AND ($nameMax == " . $loadData[$i]->jumlah. ")";
            }
            $decisionTmp = $decisionSet . $newDecision;
            
            $checkWorth = $this->M_mining->countData("label = 'layak'". $conditionSet . $newCondition)->result;
            $checkUnWorth = $this->M_mining->countData("label = 'tidak_layak'". $conditionSet . $newCondition)->result;
            $tot_case = $checkWorth + $checkUnWorth;
            if ($checkWorth > $checkUnWorth) { // jika jumlah layak lebih besar
                $unWorthPercen = round($checkUnWorth/$tot_case*100, 3);
                if ($unWorthPercen >= 20) { // cek persentase tidak layak
                    $conditionTmp = $conditionSet . $newCondition;
                    $result_tree .= $this->branchAttribute($nodeAttrMax, $loadData[$i]->jumlah, $checkWorth, $checkUnWorth, $conditionTmp, $decisionTmp, $idAttr, $nameAttr, $dbAttr, $nodeAttr, $uniqVal);
                    array_push($this->higher_gain, $this->higher_gain2);
                    unset($this->higher_gain2);
                    $this->higher_gain2 = array();
                    if (count($this->condition) == 0 || count($this->condition) == 1) {
                        array_push($this->condition, $conditionTmp);
                        array_push($this->decision, $decisionTmp);
                    } else {
                        array_push($this->condition2, $conditionTmp);
                        array_push($this->decision2, $decisionTmp);
                    }
                    array_push($this->classificationAttr, $max);
                } else {

                }
            } elseif ($checkUnWorth > $checkWorth) { // jika jumlah tidak layak lebih besar
                $worthPercen = round($checkWorth/$tot_case*100, 3);
                if ($worthPercen >= 20) { // cek persentase layak
                    $conditionTmp = $conditionSet . $newCondition;
                    $result_tree .= $this->branchAttribute($nodeAttrMax, $loadData[$i]->jumlah, $checkWorth, $checkUnWorth, $conditionTmp, $decisionTmp, $idAttr, $nameAttr, $dbAttr, $nodeAttr, $uniqVal);
                    array_push($this->higher_gain, $this->higher_gain2);
                    unset($this->higher_gain2);
                    $this->higher_gain2 = array();
                    if (count($this->condition) == 0 || count($this->condition) == 1) {
                        array_push($this->condition, $conditionTmp);
                        array_push($this->decision, $decisionTmp);
                    } else {
                        array_push($this->condition2, $conditionTmp);
                        array_push($this->decision2, $decisionTmp);
                    }
                    array_push($this->classificationAttr, $max);
                } else {

                }
            } else {
                if ($checkWorth > 0 && $checkUnWorth > 0) {
                    if ($checkWorth == $checkUnWorth) { //jika jumlah layak dan tidak layak sama (auto hitung ulang)
                        $conditionTmp = $conditionSet . $newCondition;
                        $result_tree .= $this->branchAttribute($nodeAttrMax, $loadData[$i]->jumlah, $checkWorth, $checkUnWorth, $conditionTmp, $decisionTmp, $idAttr, $nameAttr, $dbAttr, $nodeAttr, $uniqVal);
                        array_push($this->higher_gain, $this->higher_gain2);
                        unset($this->higher_gain2);
                        $this->higher_gain2 = array();
                        if (count($this->condition) == 0 || count($this->condition) == 1) {
                            array_push($this->condition, $conditionTmp);
                            array_push($this->decision, $decisionTmp);
                        } else {
                            array_push($this->condition2, $conditionTmp);
                            array_push($this->decision2, $decisionTmp);
                        }
                        array_push($this->classificationAttr, $max);
                    }
                }
            }
        }
        return $result_tree;
    }

    private function branchAttribute($nodeAttrMax, $valueAttrMax, $worth, $unWorth, $condition, $decision, $idAttr, $nameAttr, $dbAttr, $nodeAttr, $uniqVal)
    {
        $result_tree = "";
        $total_case = $worth + $unWorth;
        $entropy = $this->count_entropy($worth, $unWorth);
        $result_tree .=  
            "<div class='row'>Atribut terpilih = $nodeAttrMax $valueAttrMax</div>
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
            $result_tree .= $this->echoTable2($nodeAttr[$i], $uniqVal[$i], $dbAttr[$i], $idAttr[$i], $nameAttr[$i], $worth, $unWorth, $condition, $decision);
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

    private function echoTable2($nodeAttribute, $wordUnique, $loadDB, $idAttribute, $nameAttribute, $layak, $tidakLayak, $condition, $decision)
    {
        $entropy_all = $this->count_entropy($layak, $tidakLayak);
        $count_data = $layak + $tidakLayak;
        $result_c45 = "";

        $i = 0;
        $size = count($wordUnique);
        $dump_gain = 0;
        
        foreach ($wordUnique as $alias => $value) {
            $name = $this->M_mining->getNameAttribute($loadDB, $idAttribute, $nameAttribute, $value);
            $data = $this->M_mining->countData("$idAttribute = '$value'$condition");
            $worth = $this->M_mining->countData("$idAttribute = '$value' AND label = 'layak'$condition")->result;
            $unWorth = $this->M_mining->countData("$idAttribute = '$value' AND label = 'tidak_layak'$condition")->result;
            $entropy = $this->count_entropy($worth, $unWorth);
            $dump_gain += $this->count_gain($data->result, $count_data, $entropy);
            $result_c45 .= "
            <tr>
                <td>$nodeAttribute = $name->name</td>
                <td>$data->result</td>
                <td>$worth</td>
                <td>$unWorth</td>
                <td>$entropy</td>";
                if (++$i === $size) {
                    $result_gain = round($entropy_all - $dump_gain, 3);
                    array_push($this->higher_gain2, $result_gain);
                    $result_c45 .= "<td>$result_gain</td></tr>";
                } else {
                    $result_c45 .= "<td></td></tr>";
                }

            $tot_case = $worth + $unWorth;
            if ($worth > $unWorth) {
                $unWorthPercen = round($unWorth/$tot_case*100, 3);
                if ($unWorthPercen < 20) {
                    $decisionPush = "$decision AND ($nameAttribute == $name->name)";
                    $data = array(
                        'id_pohon_keputusan' => $this->i++,
                        'aturan' => $decisionPush,
                        'keputusan' => "layak"
                    );
                    $this->db->insert('tb_pohon_keputusan', $data);
                }
            } else if ($unWorth > $worth) {
                $worthPercen = round($worth/$tot_case*100, 3);
                if ($worthPercen < 20) {
                    $decisionPush = "$decision AND ($nameAttribute == $name->name)";
                    $data = array(
                        'id_pohon_keputusan' => $this->i++,
                        'aturan' => $decisionPush,
                        'keputusan' => "tidak_layak"
                    );
                    $this->db->insert('tb_pohon_keputusan', $data);
                }
            }
        }
        
        return $result_c45;
    }
}
