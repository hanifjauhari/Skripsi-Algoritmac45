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
    }

    public function countData($field, $condition = null) {
        if ($condition === null) {
            $sql = "SELECT count(*) FROM tb_data_mustahik";
            return $this->db->query($sql)->result();
        } else {
            $sql = "SELECT count(*)
            FROM tb_data_mustahik
            WHERE $field = $condition";
            return $this->db->query($sql)->result();
        }
    }
}
