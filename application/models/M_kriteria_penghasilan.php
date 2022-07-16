<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_kriteria_penghasilan extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getDataKriteriaPenghasilan()
    {
        return $this->db->get('tb_kriteria_penghasilan')->result_array();
    }
    function getDataKriteriaPenghasilanById($id_kriteria_penghasilan)
    {
        $this->db->select('*');
        $this->db->from('tb_kriteria_penghasilan');
        $this->db->where('id_kriteria_penghasilan', $id_kriteria_penghasilan);
        $query = $this->db->get();
        return $query;
    }
    function insertkriteriapenghasilan()
    {

        // sebut kolom dan nilai
        $nilaiTabelKriteriaPenghasilan = array(

            'jumlah_penghasilan'  => $this->input->post('jumlah_penghasilan'),
            'diubah_pada'  => $this->input->post('diubah_pada'),

        );

        // query insert
        $this->db->insert('tb_kriteria_penghasilan', $nilaiTabelKriteriaPenghasilan);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data telah disimpan.</small>
                            </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);

        // kembali ke halaman utama
        redirect('C_kriteria_penghasilan/index');
    }
    function deleteKriteriaPekerjaan($id_kriteria_penghasilan)
    {


        // Menghapus kategori barang yang memiliki id = variabel x
        // $this->db->where(    bagian A , bagian B    );

        /**
         * 
         *  @param bagianA = merupakan nama kolom yang ada di tabel. ex id_kategori, nama, status
         *  @param bagianB = merupakan nilai dari kolomnya. ex. 1, 2, 3, 4
         */

        // eksekusi query 

        $this->db->where('id_kriteria_penghasilan', $id_kriteria_penghasilan);
        $this->db->delete('tb_kriteria_penghasilan');


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil dihapus pada ' . date('d F Y H.i A') . '.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_kriteria_penghasilan/index');
    }
    function updateDataKriteriaPenghasilan($id_kriteria_penghasilan)
    {

        // get data barang
        $dataKriteriaPenghasilan = $this->db->get_where('tb_kriteria_penghasilan', ['id_kriteria_penghasilan' => $id_kriteria_penghasilan])->row_array();

        // 1



        // 4

        // apakah user melakukan upload foto baru ? 


        // ---------------------------------------------

        $nilaiTabelKriteriaPenghasilan = array(

            'jumlah_penghasilan'          => $this->input->post('jumlah_penghasilan'),
            'diubah_pada'             => $this->input->post('diubah_pada'),

        );


        // query update
        $this->db->where('id_kriteria_penghasilan', $id_kriteria_penghasilan);
        $this->db->update('tb_kriteria_penghasilan', $nilaiTabelKriteriaPenghasilan);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil diperbarui pada ' . date('d F Y H.i A') . '.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_kriteria_penghasilan/index');
    }
}
