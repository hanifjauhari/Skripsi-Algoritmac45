<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_kriteria_pekerjaan extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getDataKriteriaPekerjaan()
    {
        return $this->db->get('tb_kriteria_pekerjaan')->result_array();
    }
    function getDataKriteriaPekerjaanById($id_kriteria_pekerjaan)
    {
        // $query = "SELECT * FROM 'tb_kriteria_pekerjaan' WHERE id_kriteria_pekerjaan = '$id_kriteria_pekerjaan'";
        // $hasil = $this->db->query($query);
        $this->db->select('*');
        $this->db->from('tb_kriteria_pekerjaan');
        $this->db->where('id_kriteria_pekerjaan', $id_kriteria_pekerjaan);
        $query = $this->db->get();
        return $query;
    }
    function insertkriteriapekerjaan()
    {

        // sebut kolom dan nilai
        $nilaiTabelKriteriaPekerjaan = array(

            'nama_pekerjaan'  => $this->input->post('nama_pekerjaan'),
            'diubah_pada'  => $this->input->post('diubah_pada'),

        );
        // var_dump($nilaiTabelKriteriaPekerjaan);
        // exit;

        // query insert
        $this->db->insert('tb_kriteria_pekerjaan', $nilaiTabelKriteriaPekerjaan);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data telah disimpan.</small>
                            </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);

        // kembali ke halaman utama
        redirect('C_kriteria_pekerjaan/index');
    }
    function deleteKriteriaPekerjaan($id_kriteria_pekerjaan)
    {


        // Menghapus kategori barang yang memiliki id = variabel x
        // $this->db->where(    bagian A , bagian B    );

        /**
         * 
         *  @param bagianA = merupakan nama kolom yang ada di tabel. ex id_kategori, nama, status
         *  @param bagianB = merupakan nilai dari kolomnya. ex. 1, 2, 3, 4
         */

        // eksekusi query 

        $this->db->where('id_kriteria_pekerjaan', $id_kriteria_pekerjaan);
        $this->db->delete('tb_kriteria_pekerjaan');


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil dihapus pada ' . date('d F Y H.i A') . '.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_kriteria_pekerjaan/index');
    }
    function updateDataKriteriaPekerjaan($id_kriteria_pekerjaan)
    {

        // get data barang
        $dataKriteriaPekerjaan = $this->db->get_where('tb_kriteria_pekerjaan', ['id_kriteria_pekerjaan' => $id_kriteria_pekerjaan])->row_array();

        // 1



        // 4

        // apakah user melakukan upload foto baru ? 


        // ---------------------------------------------

        $nilaiTabelKriteriaPekerjaan = array(

            'nama_pekerjaan'          => $this->input->post('nama_pekerjaan'),
            'diubah_pada'             => $this->input->post('diubah_pada'),

        );


        // query update
        $this->db->where('id_kriteria_pekerjaan', $id_kriteria_pekerjaan);
        $this->db->update('tb_kriteria_pekerjaan', $nilaiTabelKriteriaPekerjaan);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil diperbarui pada ' . date('d F Y H.i A') . '.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_kriteria_pekerjaan/index');
    }
}
