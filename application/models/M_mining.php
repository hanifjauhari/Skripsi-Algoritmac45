<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_mining extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function loadData($table, $field1, $field2) {
        $sql = "SELECT $table.$field1 as id, $table.$field2 as jumlah FROM $table";
        // var_dump($sql);
        // die;
        return $this->db->query($sql)->result();
    }

    public function countData($condition = null) {
        if ($condition === null) {
            $sql = "SELECT COUNT(*) as result FROM tb_data_mustahik";
        } else {
            $sql = "SELECT COUNT(*) as result
            FROM tb_data_mustahik
            WHERE $condition";
        }
        // var_dump("$sql<br>");
        return $this->db->query($sql)->row();
    }

    public function getNameAttribute($table, $id, $field, $condition)
    {
        $sql = "SELECT $field as name FROM $table WHERE $id = '$condition'";
        return $this->db->query($sql)->row();
    }
}
