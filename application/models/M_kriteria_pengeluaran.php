<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_kriteria_pengeluaran extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
    public function getDataKriteriaPengeluaran()
    {
        return $this->db->get('tb_kriteria_pengeluaran')->result_array();
    }
    function getDataKriteriaPengeluaranById($id_kriteria_pengeluaran)
    {
        $this->db->select('*');
        $this->db->from('tb_kriteria_pengeluaran');
        $this->db->where('id_kriteria_pengeluaran', $id_kriteria_pengeluaran);
        $query = $this->db->get();
        return $query;
    }
    function insertkriteriapengeluaran()
    {

        // sebut kolom dan nilai
        $nilaiTabelKriteriaPengeluaran = array(

            'jumlah_pengeluaran'  => $this->input->post('jumlah_pengeluaran'),
            'diubah_pada'  => $this->input->post('diubah_pada'),

        );

        // query insert
        $this->db->insert('tb_kriteria_pengeluaran', $nilaiTabelKriteriaPengeluaran);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                                <small>Data telah disimpan.</small>
                            </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);

        // kembali ke halaman utama
        redirect('C_kriteria_pengeluaran/index');
    }
    function deleteKriteriaPengeluaran($id_kriteria_pengeluaran)
    {


        // Menghapus kategori barang yang memiliki id = variabel x
        // $this->db->where(    bagian A , bagian B    );

        /**
         * 
         *  @param bagianA = merupakan nama kolom yang ada di tabel. ex id_kategori, nama, status
         *  @param bagianB = merupakan nilai dari kolomnya. ex. 1, 2, 3, 4
         */

        // eksekusi query 

        $this->db->where('id_kriteria_pengeluaran', $id_kriteria_pengeluaran);
        $this->db->delete('tb_kriteria_pengeluaran');


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil dihapus pada ' . date('d F Y H.i A') . '.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_kriteria_pengeluaran/index');
    }
    function updateDataKriteriaPengeluaran($id_kriteria_pengeluaran)
    {

        // get data barang
        $dataKriteriaPengeluaran = $this->db->get_where('tb_kriteria_pengeluaran', ['id_kriteria_pengeluaran' => $id_kriteria_pengeluaran])->row_array();

        // 1



        // 4

        // apakah user melakukan upload foto baru ? 


        // ---------------------------------------------

        $nilaiTabelKriteriaPengeluaran = array(

            'jumlah_pengeluaran'          => $this->input->post('jumlah_pengeluaran'),
            'diubah_pada'             => $this->input->post('diubah_pada'),

        );


        // query update
        $this->db->where('id_kriteria_pengeluaran', $id_kriteria_pengeluaran);
        $this->db->update('tb_kriteria_pengeluaran', $nilaiTabelKriteriaPengeluaran);


        // pesan 
        $htmlPesan = '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p style="margin: 0px"><i class="icon fas fa-check"></i> Pemberitahuan !</p>
                            <small>Data berhasil diperbarui pada ' . date('d F Y H.i A') . '.</small>
                        </div>';
        $this->session->set_flashdata('pesan', $htmlPesan);


        // kembali 
        redirect('C_kriteria_pengeluaran/index');
    }
}