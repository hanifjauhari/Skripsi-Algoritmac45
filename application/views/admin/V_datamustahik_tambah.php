<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
            <div class="card-body">
                <form action="<?php echo site_url('C_datamustahik/prosestambah') ?>" method="POST">
                    <h5>Data Diri</h5>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-2">
                            <label>Nama</label>
                            <input type="text" name="nama" required="" class="form-control">
                        </div>
                        <div class="form-group col-3">
                            <label>No kartu Keluarga</label>
                            <input type="text" name="no_kk" required="" class="form-control">
                        </div>
                        <div class="form-group col-3">
                            <label>No Kartu Penduduk</label>
                            <input type="text" name="no_ktp" required="" class="form-control">
                        </div>
                        <div class="form-group col-2">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" required="" class="form-control">
                        </div>

                    </div>

                    <hr>
                    <div class="form-row">
                        <div class="form-group col-2">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" required="" class="form-control">
                        </div>
                        <div class="form-group col-4">
                            <label>Alamat</label>
                            <input type="text" name="Alamat" required="" class="form-control">
                        </div>
                        <div class="form-group col-2">
                            <label>Telpon</label>
                            <input type="text" name="telp" required="" class="form-control">
                        </div>
                        <div class="form-group col-2">
                            <label>Jenis Kelamin</label>
                            <input type="text" name="jenis_kelamin" required="" class="form-control">
                        </div>

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


                </form>
            </div>
        </div>
    </div>
</div>