<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_jumlahtanggungan extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getDataJumlahTanggungan()
    {
        return $this->db->get('tb_kriteria_jumlah_tanggungan')->result_array();
    }
    function getDataKriteriaJumlahTanggunganById($id_kriteria_jumlah_tanggungan)
    {
        $query = "SELECT * FROM 'tb_kriteria_jumlah_tanggungan' WHERE id_kriteria_jumlah_tanggungan = '$id_kriteria_jumlah_tanggungan'";
        $hasil = $this->db->query($query);

        return $hasil;
    }
    function insertJumlahTanggungan()
    {

        // sebut kolom dan nilai
        $nilaiTabelKriteriaJumlahTanggungan = array(

            'jumlah_tanggungan'  => $this->input->post('jumlah_tanggungan'),
            'diubah_pada'  => $this->input->post('diubah_pada'),

        );

        // query insert
        $this->db->insert('tb_kriteria_jumlah_tanggungan', $nilaiTabelKriteriaJumlahTanggungan);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data telah disimpan.</small>
                            </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);

        // kembali ke halaman utama
        redirect('C_jumlahtanggungan/index');
    }
    function deleteJumlahTanggungan($id_kriteria_jumlah_tanggungan)
    {


        // Menghapus kategori barang yang memiliki id = variabel x
        // $this->db->where(    bagian A , bagian B    );

        /**
         * 
         *  @param bagianA = merupakan nama kolom yang ada di tabel. ex id_kategori, nama, status
         *  @param bagianB = merupakan nilai dari kolomnya. ex. 1, 2, 3, 4
         */

        // eksekusi query 

        $this->db->where('id_kriteria_jumlah_tanggungan', $id_kriteria_jumlah_tanggungan);
        $this->db->delete('tb_kriteria_jumlah_tanggungan');


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil dihapus pada ' . date('d F Y H.i A') . '.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_jumlahtanggungan/index');
    }
}
