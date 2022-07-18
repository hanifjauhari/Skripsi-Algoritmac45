<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_mining extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function condition($field, $condition = null) {
        if ($condition === null) {
            $sql = "SELECT DISTINCT($field) FROM tb_data_mustahik";
        } else {
            $sql = "SELECT DISTINCT($field) FROM tb_data_mustahik WHERE $condition";
        }
        $result = $this->db->query($sql);
        
        if ($result->num_rows() >= 1) {
            $value = "heterogen";
        } else {
            $value = "homogen";
        }
        return $value;
    }

    public function distinctAtribute($field, $condition = null)
    {
        if ($condition === null) {
            $sql = "SELECT DISTINCT($field) FROM tb_data_mustahik";
        } else {
            $sql = "SELECT DISTINCT($field) FROM tb_data_mustahik WHERE $condition";
        }

        return $this->db->query($sql)->result();
    }

    public function countData($condition = null) {
        if ($condition === null) {
            $sql = "SELECT count(*) as result FROM tb_data_mustahik";
        } else {
            $sql = "SELECT count(*) as result
            FROM tb_data_mustahik
            WHERE $condition";
        }
        return $this->db->query($sql)->row();
    }

    public function getNameAtribute($table, $id, $field, $condition)
    {
        $sql = "SELECT $field as name FROM $table WHERE $id = '$condition'";
        return $this->db->query($sql)->row();
    }
}
