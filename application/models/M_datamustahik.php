<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_datamustahik extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getDataMustahik($id_mustahik = null)
    {
        if ($id_mustahik === null) {
            $query = "SELECT tb_data_mustahik.id_mustahik as id_mustahik, tb_data_mustahik.nama as nama, tb_data_mustahik.Alamat as alamat, tb_data_mustahik.telp as telp, tb_data_mustahik.label as label,
            tb_kriteria_pekerjaan.id_kriteria_pekerjaan as id_pekerjaan, tb_kriteria_pekerjaan.nama_pekerjaan as pekerjaan, 
            tb_kriteria_penghasilan.id_kriteria_penghasilan as id_penghasilan, tb_kriteria_penghasilan.jumlah_penghasilan as penghasilan, 
            tb_kriteria_pengeluaran.id_kriteria_pengeluaran as id_pengeluaran, tb_kriteria_pengeluaran.jumlah_pengeluaran as pengeluaran,
            tb_kriteria_jumlah_tanggungan.id_kriteria_jumlah_tanggungan as id_jumlah_tanggungan, tb_kriteria_jumlah_tanggungan.jumlah_tanggungan as tanggungan
            FROM tb_data_mustahik 
            INNER JOIN tb_kriteria_pekerjaan ON tb_data_mustahik.id_kriteria_pekerjaan = tb_kriteria_pekerjaan.id_kriteria_pekerjaan
            INNER JOIN tb_kriteria_penghasilan ON tb_data_mustahik.id_kriteria_penghasilan = tb_kriteria_penghasilan.id_kriteria_penghasilan
            INNER JOIN tb_kriteria_pengeluaran ON tb_data_mustahik.id_kriteria_pengeluaran = tb_kriteria_pengeluaran.id_kriteria_pengeluaran
            INNER JOIN tb_kriteria_jumlah_tanggungan ON tb_data_mustahik.id_kriteria_jumlah_tanggungan= tb_kriteria_jumlah_tanggungan.id_kriteria_jumlah_tanggungan";

            return $this->db->query($query)->result_array();
        } else {
            $query = "SELECT tb_data_mustahik.id_mustahik as id_mustahik, tb_data_mustahik.nama as nama, tb_data_mustahik.no_kk as kk, tb_data_mustahik.no_ktp as ktp, tb_data_mustahik.tempat_lahir as tempat_lahir, tb_data_mustahik.tanggal_lahir as tanggal_lahir, tb_data_mustahik.Alamat as alamat, tb_data_mustahik.telp as telp, tb_data_mustahik.jenis_kelamin as kelamin, tb_data_mustahik.label as label,
            tb_kriteria_pekerjaan.nama_pekerjaan as pekerjaan, 
            tb_kriteria_penghasilan.jumlah_penghasilan as penghasilan, 
            tb_kriteria_pengeluaran.jumlah_pengeluaran as pengeluaran,
            tb_kriteria_jumlah_tanggungan.jumlah_tanggungan as tanggungan
            FROM tb_data_mustahik 
            INNER JOIN tb_kriteria_pekerjaan ON tb_data_mustahik.id_kriteria_pekerjaan = tb_kriteria_pekerjaan.id_kriteria_pekerjaan
            INNER JOIN tb_kriteria_penghasilan ON tb_data_mustahik.id_kriteria_penghasilan = tb_kriteria_penghasilan.id_kriteria_penghasilan
            INNER JOIN tb_kriteria_pengeluaran ON tb_data_mustahik.id_kriteria_pengeluaran = tb_kriteria_pengeluaran.id_kriteria_pengeluaran
            INNER JOIN tb_kriteria_jumlah_tanggungan ON tb_data_mustahik.id_kriteria_jumlah_tanggungan= tb_kriteria_jumlah_tanggungan.id_kriteria_jumlah_tanggungan
            WHERE tb_data_mustahik.id_mustahik = $id_mustahik";

            return $this->db->query($query)->row();
        }
    }

    function insertDataMustahik()
    {

        // sebut kolom dan nilai
        $nilaiTabelDataMustahik = array(

            'nama'           => $this->input->post('nama'),
            'tempat_lahir'   => $this->input->post('tempat_lahir'),
            'tanggal_lahir'  => $this->input->post('tanggal_lahir'),
            'Alamat'         => $this->input->post('Alamat'),
            'id_kriteria_pekerjaan'         => $this->input->post('id_kriteria_pekerjaan'),
            'id_kriteria_penghasilan'         => $this->input->post('id_kriteria_penghasilan'),
            'id_kriteria_pengeluaran'         => $this->input->post('id_kriteria_pengeluaran'),
            'id_kriteria_jumlah_tanggungan'         => $this->input->post('id_kriteria_jumlah_tanggungan'),
            'telp'           => $this->input->post('telp'),
            'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
            'label'          => $this->input->post('label'),

        );
        // var_dump($nilaiTabelDataMustahik);
        // exit;
        // query insert
        $this->db->insert('tb_data_mustahik', $nilaiTabelDataMustahik);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data telah disimpan.</small>
                            </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);

        // kembali ke halaman utama
        redirect('C_datamustahik/index');
    }
    function deleteDataMustahik($id_datamustahik)
    {


        // Menghapus kategori barang yang memiliki id = variabel x
        // $this->db->where(    bagian A , bagian B    );

        /**
         * 
         *  @param bagianA = merupakan nama kolom yang ada di tabel. ex id_kategori, nama, status
         *  @param bagianB = merupakan nilai dari kolomnya. ex. 1, 2, 3, 4
         */

        // eksekusi query 

        $this->db->where('id_mustahik', $id_datamustahik);
        $this->db->delete('tb_data_mustahik');


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil dihapus pada ' . date('d F Y H.i A') . '.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_datamustahik/index');
    }
    function updateDataMustahik($id_mustahik)
    {

        // get data barang
        $dataMustahik = $this->db->get_where('tb_data_mustahik', ['id_mustahik' => $id_mustahik])->row_array();

        // 1



        // 4

        // apakah user melakukan upload foto baru ? 


        // ---------------------------------------------

        $nilaiTabelMustahik = array(

            'nama'          => $this->input->post('nama'),
            'no_kk'          => $this->input->post('no_kk'),
            'no_ktp'          => $this->input->post('no_ktp'),
            'tempat_lahir'          => $this->input->post('tempat_lahir'),
            'tanggal_lahir'          => $this->input->post('tanggal_lahir'),
            'Alamat'          => $this->input->post('Alamat'),
            'telp'          => $this->input->post('telp'),
            'jenis_kelamin'             => $this->input->post('jenis_kelamin'),
            'id_kriteria_pekerjaan'             => $this->input->post('id_kriteria_pekerjaan'),
            'id_kriteria_penghasilan'             => $this->input->post('id_kriteria_penghasilan'),
            'id_kriteria_pengeluaran'             => $this->input->post('id_kriteria_pengeluaran'),
            'id_kriteria_jumlah_tanggungan'             => $this->input->post('id_kriteria_jumlah_tanggungan'),
            'label'          => $this->input->post('label'),

        );


        // query update
        $this->db->where('id_mustahik', $id_mustahik);
        $this->db->update('tb_data_mustahik', $nilaiTabelMustahik);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil diperbarui pada ' . date('d F Y H.i A') . '.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_datamustahik/index');
    }
}
