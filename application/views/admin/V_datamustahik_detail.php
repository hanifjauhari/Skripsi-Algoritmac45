<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Data Mustahik</h1>
                    <p></p>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row justify-content-center">

                <div class="col-md-10">

                    <div class="card card-body">

                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">

                                <div class="row">
                                    <div class="col-md-12">

                                        <h4>Informasi Data Mustahik</h4>
                                        <table class="table">
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>No KK</th>
                                                <th>No Ktp</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Alamat</th>
                                                <th>Telp</th>
                                                <th>Jenis Kelamin</th>

                                            </tr>
                                                <tr>
                                                    <td><?= $data_mustahik->id_mustahik; ?></td>
                                                    <td><?= $data_mustahik->nama; ?></td>
                                                    <td><?= $data_mustahik->kk; ?></td>
                                                    <td><?= $data_mustahik->ktp; ?></td>
                                                    <td><?= $data_mustahik->tempat_lahir; ?></td>
                                                    <td><?= $data_mustahik->tanggal_lahir; ?></td>
                                                    <td><?= $data_mustahik->alamat; ?></td>
                                                    <td><?= $data_mustahik->telp; ?></td>
                                                    <td><?= $data_mustahik->kelamin; ?></td>
                                                </tr>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-8 col-md-8 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <br>
                                    <?php
                                    ?>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <label>Pekerjaan</label>
                                                <input type="text" value="<?= $data_mustahik->pekerjaan; ?>" required="" class="form-control" readonly>

                                            </div>
                                            <div class="form-group col-6">
                                                <label>Penghasilan</label>
                                                <input type="text" value="<?= $data_mustahik->penghasilan; ?>" required="" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <label>Pengeluaran</label>
                                                <input type="text" value="<?= $data_mustahik->pengeluaran; ?>" required="" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-6">
                                                <label>Jumlah Tanggungan</label>
                                                <input type="text" value="<?= $data_mustahik->tanggungan; ?>" required="" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <br><br>

                                    </div>
                                </div>
                            </div>
                        <br>
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                            <br>

                            <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Mustahik </h3>
                            <p class="text-muted">Berikut adalah Data Detail Dari Mustahik</p>
                            <br>
                            


                            <a href="<?= base_url('C_datamustahik') ?>" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                            <a href="<?= base_url('C_datamustahik/generate_pdf/').$data_mustahik->id_mustahik ?>" class="btn btn-warning btn-sm">Cetak Detail Mustahik</a>

                        </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</div>