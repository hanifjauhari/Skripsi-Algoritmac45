<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_decision_tree extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function test_rules()
    {
        $query = "SELECT tb_data_mustahik.id_mustahik as id_mustahik, tb_data_mustahik.nama as nama, tb_data_mustahik.label as label,
        tb_kriteria_pekerjaan.id_kriteria_pekerjaan as id_pekerjaan, tb_kriteria_pekerjaan.nama_pekerjaan as pekerjaan, 
        tb_kriteria_penghasilan.id_kriteria_penghasilan as id_penghasilan, tb_kriteria_penghasilan.jumlah_penghasilan as penghasilan, 
        tb_kriteria_pengeluaran.id_kriteria_pengeluaran as id_pengeluaran, tb_kriteria_pengeluaran.jumlah_pengeluaran as pengeluaran,
        tb_kriteria_jumlah_tanggungan.id_kriteria_jumlah_tanggungan as id_jumlah_tanggungan, tb_kriteria_jumlah_tanggungan.jumlah_tanggungan as tanggungan
        FROM tb_data_mustahik 
        INNER JOIN tb_kriteria_pekerjaan ON tb_data_mustahik.id_kriteria_pekerjaan = tb_kriteria_pekerjaan.id_kriteria_pekerjaan
        INNER JOIN tb_kriteria_penghasilan ON tb_data_mustahik.id_kriteria_penghasilan = tb_kriteria_penghasilan.id_kriteria_penghasilan
        INNER JOIN tb_kriteria_pengeluaran ON tb_data_mustahik.id_kriteria_pengeluaran = tb_kriteria_pengeluaran.id_kriteria_pengeluaran
        INNER JOIN tb_kriteria_jumlah_tanggungan ON tb_data_mustahik.id_kriteria_jumlah_tanggungan= tb_kriteria_jumlah_tanggungan.id_kriteria_jumlah_tanggungan
        ORDER BY tb_data_mustahik.id_mustahik DESC
        LIMIT 10";
        
        return $this->db->query($query)->result();
    }

    public function getFieldTable()
    {
        $sql = "SELECT tb_data_mustahik.nama as nama,
        tb_kriteria_pekerjaan.nama_pekerjaan as nama_pekerjaan,
        tb_kriteria_penghasilan.jumlah_penghasilan as jumlah_penghasilan,
        tb_kriteria_pengeluaran.jumlah_pengeluaran as jumlah_pengeluaran,
        tb_kriteria_jumlah_tanggungan.jumlah_tanggungan as jumlah_tanggungan 
        FROM tb_data_mustahik
        INNER JOIN tb_kriteria_pekerjaan ON tb_data_mustahik.id_kriteria_pekerjaan = tb_kriteria_pekerjaan.id_kriteria_pekerjaan
        INNER JOIN tb_kriteria_penghasilan ON tb_data_mustahik.id_kriteria_penghasilan = tb_kriteria_penghasilan.id_kriteria_penghasilan
        INNER JOIN tb_kriteria_pengeluaran ON tb_data_mustahik.id_kriteria_pengeluaran = tb_kriteria_pengeluaran.id_kriteria_pengeluaran
        INNER JOIN tb_kriteria_jumlah_tanggungan ON tb_data_mustahik.id_kriteria_jumlah_tanggungan = tb_kriteria_jumlah_tanggungan.id_kriteria_jumlah_tanggungan
        ";

        $query = $this->db->query($sql);
        return $query->field_data();
    }
}