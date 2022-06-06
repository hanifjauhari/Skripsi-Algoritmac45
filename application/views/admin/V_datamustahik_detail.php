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
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>No KK</th>
                                                <th>no Ktp</th>
                                                <th>tempat lahir</th>
                                                <th>tanggal lahir</th>
                                                <th>Alamat</th>
                                                <th>telp</th>
                                                <th>Jenis Kelamin</th>

                                            </tr>
                                            <?php

                                            $no = 1;
                                            foreach ($data_mustahik as $row) : ?>

                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $row->nama ?></td>
                                                    <td><?php echo $row->no_kk ?></td>
                                                    <td><?php echo $row->no_ktp ?></td>
                                                    <td><?php echo $row->tempat_lahir ?></td>
                                                    <td><?php echo $row->tanggal_lahir ?></td>
                                                    <td><?php echo $row->Alamat ?></td>
                                                    <td><?php echo $row->telp ?></td>
                                                    <td><?php echo $row->jenis_kelamin ?></td>
                                                </tr>

                                            <?php

                                            endforeach; ?>

                                            <tr>

                                            </tr>


                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                            <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Mustahik </h3>
                            <p class="text-muted">Berikut adalah stokopname yang dapat dilaporkan seperti detail disamping.</p>
                            <br>
                            <div class="text-muted">
                                <p class="text-sm">Tanggal Pembuatan
                                    <b class="d-block"></b>
                                </p>
                                <p class="text-sm">Pembuat Laporan (Penanggung Jawab)
                                    <b class="d-block"></b>
                                </p>
                            </div>


                            <a href="<?php echo base_url('C_stockopname') ?>" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                            <a href="<?php echo base_url('C_stockopname/exportPDF/') ?>" class="btn btn-warning btn-sm">Cetak Laporan Opname</a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</div>