<div class="row">
    <div class="container-fluid">
        <div class="col">
            <div class="card shadow">
                <div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
                <div class="card-body">
                    <form action="<?php echo site_url('C_kriteria_pengeluaran/prosestambah') ?>" method="POST">
                        <h5>Data Kriteria Pengeluaran</h5>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-2">
                                <label>jumlah_pengeluaran</label>
                                <input type="text" name="jumlah_pengeluaran" class="form-control" required="">

                            </div>
                            <div class="form-group col-3">
                                <label>Tanggal Ditambahkan</label>
                                <input type="date" name="diubah_pada" class="form-control">
                            </div>
                            <!-- <div class="form-group col-3">
                                <label>Admin yang menambahkan</label>
                                <input type="text" name="nama_kasir" class="form-control" required="">
                            </div> -->

                        </div>




                        <tfoot>
                            <tr>



                                <td>
                                    <input type="hidden" name="total_hidden" value="">
                                    <input type="hidden" name="max_hidden" value="">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                </td>
                            </tr>
                        </tfoot>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>