<div class="content">
    <!--typography-page -->
    <div class="typo-w3">
        <div class="container">
            <h2 class="tittle">Uji Pohon Keputusan</h2>
            <div class="row">
                <div class="col-md-12">
                    <!--UPLOAD EXCEL FORM-->
                    <form method="post" enctype="multipart/form-data" action="">
                        <div class="form-group">
                            <label>Import data from excel</label>
                            <div class="input-group">
                                <input name="file_data_latih" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="submit" type="submit" value="Upload Data" class="btn btn-success">
                            <button name="delete" type="submit" class="btn btn-danger" onclick="">
                                <i class="fa fa-trash-o"></i> Delete All Data Latih
                            </button>
                        </div>
                        <div class="form-group">
                            <!--<input name="submit" type="submit" value="Upload Data" class="btn btn-success">-->
                            <a href="<?= site_url('C_hasilklasifikasi/test_rules'); ?>" name="proses_mining" type="submit" class="btn btn-default border">
                                <i class="fa fa-check"></i> Hitung Akurasi
                            </a>
                            <!-- <button name="proses_mining" type="submit" class="btn btn-default" onclick="">
                                <i class="fa fa-check"></i> Proses Mining
                            </button> -->
                        </div>
                    </form>

                    <table class='table table-bordered table-hover'>
                        <thead class="table-dark">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Pekerjaan</th>
                            <th>Penghasilan</th>
                            <th>Pengeluaran</th>
                            <th>Jumlah Tanggungan</th>
                            <th>Label</th>
                        </thead>
                        <?php $i = 1;
                        foreach ($test_rules as $test) { ?>

                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $test->nama; ?></td>
                            <td><?= $test->pekerjaan; ?></td>
                            <td><?= $test->penghasilan; ?></td>
                            <td><?= $test->pengeluaran; ?></td>
                            <td><?= $test->pengeluaran; ?></td>
                            <td><?= $test->label; ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- //typography-page -->

</div>