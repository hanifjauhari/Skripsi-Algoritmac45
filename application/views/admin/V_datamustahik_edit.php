<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<?php

$kolom = $data_mustahik->row_array();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sunting Data Mustahik</h1>
                    <p>Deskripsi menu . . . .</p>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Layout</a></li>
                        <li class="breadcrumb-item active">Fixed Navbar Layout</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-6 offset-3">

                    <form action="<?php echo site_url('C_datamustahik/prosesupdate/' . $kolom['id_mustahik']) ?>" method="POST" enctype="multipart/form-data">
                        <div class="card card-body">

                            <h4>Form Sunting Data Mustahik</h4>


                            <div class="form-group">

                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" required="" value="<?php echo $kolom['nama'] ?>">
                                <small>Masukkan nama</small>
                            </div>


                            <div class="form-group">

                                <label>no_kk</label>
                                <input type="text" class="form-control" name="no_kk" required="" value="<?php echo $kolom['no_kk'] ?>">
                                <small>masukan no kk</small>
                            </div>

                            <div class="form-group">

                                <label>no_ktp</label>
                                <input type="text" class="form-control" name="no_ktp" required="" value="<?php echo $kolom['no_ktp'] ?>">
                                <small>masukan no ktp</small>
                            </div>
                            <div class="form-group">

                                <label>tempat lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" required="" value="<?php echo $kolom['tempat_lahir'] ?>">
                                <small>masukan tempat lahir</small>
                            </div>
                            <div class="form-group">

                                <label>tanggal_lahir</label>
                                <input type="text" class="form-control" name="tanggal_lahir" required="" value="<?php echo $kolom['tanggal_lahir'] ?>">
                                <small>masukan tanggal_lahir</small>
                            </div>
                            <div class="form-group">

                                <label>Alamat</label>
                                <input type="text" class="form-control" name="Alamat" required="" value="<?php echo $kolom['Alamat'] ?>">
                                <small>masukan Alamat</small>
                            </div>
                            <div class="form-group">

                                <label>Telp</label>
                                <input type="text" class="form-control" name="telp" required="" value="<?php echo $kolom['telp'] ?>">
                                <small>masukan telp</small>
                            </div>
                            <div class="form-group col-2">
                                <label>Jenis Kelamin</label>
                                <!-- <input type="text" name="jenis_kelamin" required="" class="form-control"> -->
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">-Pilih-</option>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>





                            <div class="form-group col-2">
                                <label>Pekerjaan</label>
                                <?php
                                $query = $this->db->get('tb_kriteria_pekerjaan')->result_array();
                                ?>
                                <select class="form-control" id="id_kriteria_pekerjaan" name="id_kriteria_pekerjaan" required>
                                    <option value="">-Pilih-</option>
                                    <?php foreach ($query as $row) { ?>
                                        <option value="<?= $row['id_kriteria_pekerjaan'] ?>"><?= $row['nama_pekerjaan'] ?></option>
                                    <?php }  ?>
                                </select>
                            </div>
                            <div class="form-group col-2">
                                <label>Penghasilan</label>
                                <?php
                                $query = $this->db->get('tb_kriteria_penghasilan')->result_array();
                                ?>
                                <select class="form-control" id="id_kriteria_penghasilan" name="id_kriteria_penghasilan" required>
                                    <option value="">-Pilih-</option>
                                    <?php foreach ($query as $row) { ?>
                                        <option value="<?= $row['id_kriteria_penghasilan'] ?>"><?= $row['jumlah_penghasilan'] ?></option>
                                    <?php }  ?>
                                </select>
                            </div>
                            <div class="form-group col-2">
                                <label>Pengeluaran</label>
                                <?php
                                $query = $this->db->get('tb_kriteria_pengeluaran')->result_array();
                                ?>
                                <select class="form-control" id="id_kriteria_pengeluaran" name="id_kriteria_pengeluaran" required>
                                    <option value="">-Pilih-</option>
                                    <?php foreach ($query as $row) { ?>
                                        <option value="<?= $row['id_kriteria_pengeluaran'] ?>"><?= $row['jumlah_pengeluaran'] ?></option>
                                    <?php }  ?>
                                </select>
                            </div>
                            <div class="form-group col-2">
                                <label>Jumlah Tanggungan</label>
                                <?php
                                $query = $this->db->get('tb_kriteria_jumlah_tanggungan')->result_array();
                                ?>
                                <select class="form-control" id="id_kriteria_jumlah_tanggungan" name="id_kriteria_jumlah_tanggungan" required>
                                    <option value="">-Pilih-</option>
                                    <?php foreach ($query as $row) { ?>
                                        <option value="<?= $row['id_kriteria_jumlah_tanggungan'] ?>"><?= $row['jumlah_tanggungan'] ?></option>
                                    <?php }  ?>
                                </select>
                            </div>
                            <div class="form-group col-2">
                            <label>label</label>
                            <!-- <input type="text" name="jenis_kelamin" required="" class="form-control"> -->
                            <select class="form-control" id="label" name="label" required>
                                <option value="">-Pilih-</option>
                                <option value="layak">Layak</option>
                                <option value="tidak_layak">tidak layak</option>
                            </select>
                        </div>

                            <div class="form-group">

                                <button type="submit" class="btn btn-primary">Simpan kriteria pekerjaan</button>

                            </div>

                        </div>
                    </form>
                </div>


            </div>

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->