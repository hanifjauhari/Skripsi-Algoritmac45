<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_datamustahik extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getDataMustahik()
    {
        return $this->db->get('tb_data_mustahik')->result_array();
    }
    function getDataKriteriaPekerjaanById($id_mustahik)
    {
        $query = "SELECT * FROM 'tb_data_mustahik' WHERE id_mustahik = '$id_mustahik'";
        $hasil = $this->db->query($query);

        return $hasil;
    }
    function insertDataMustahik()
    {

        // sebut kolom dan nilai
        $nilaiTabelDataMustahik = array(

            'nama'           => $this->input->post('nama'),
            'no_kk'          => $this->input->post('no_kk'),
            'no_ktp'         => $this->input->post('no_ktp'),
            'tempat_lahir'   => $this->input->post('tempat_lahir'),
            'tanggal_lahir'  => $this->input->post('tanggal_lahir'),
            'Alamat'         => $this->input->post('Alamat'),
            'telp'           => $this->input->post('telp'),
            'jenis_kelamin'  => $this->input->post('jenis_kelamin'),

        );

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
}
