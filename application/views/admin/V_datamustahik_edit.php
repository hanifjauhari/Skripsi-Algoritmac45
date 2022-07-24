<!-- Karena sudah ada template header footer, langsung copas kontennya -->

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

                <div class="col-md-12">

                    <form action="<?php echo site_url('C_datamustahik/prosesupdate/').$data_mustahik->id_mustahik; ?>" method="POST" enctype="multipart/form-data">
                        <div class="card card-body">
                            <h4>Form Sunting Data Mustahik</h4>

                            <div class="form-row">
                                <div class="form-group col-md-9">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="nama" required="" value="<?= $data_mustahik->nama; ?>" placeholder="Masukkan Nama">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Jenis Kelamin</label>
                                    <select class="custom-select" id="inlineFormCustomSelect jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="">-Pilih-</option>
                                        <option value="laki-laki">Laki-Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Tempat lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir" required="" value="<?= $data_mustahik->tempat_lahir; ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Tanggal lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" required="" value="<?= $data_mustahik->tanggal_lahir; ?>">
                                </div>
                                <div class="form-group col-md-4">     
                                    <label>No Telepon</label>
                                    <input type="text" class="form-control" name="telp" required="" value="<?= $data_mustahik->telp; ?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>No. KK</label>
                                    <input type="text" class="form-control" name="no_kk" required="" value="<?= $data_mustahik->kk; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>No. KTP</label>
                                    <input type="text" class="form-control" name="no_ktp" required="" value="<?= $data_mustahik->ktp; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="Alamat" rows="3"><?= $data_mustahik->alamat; ?></textarea>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Pekerjaan</label>
                                    <?php
                                    $query = $this->db->get('tb_kriteria_pekerjaan')->result_array();
                                    ?>
                                    <select class="custom-select" id="id_kriteria_pekerjaan" name="id_kriteria_pekerjaan" required>
                                        <option value="">-Pilih-</option>
                                        <?php foreach ($query as $row) { ?>
                                            <option value="<?= $row['id_kriteria_pekerjaan'] ?>"><?= $row['nama_pekerjaan'] ?></option>
                                        <?php }  ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Penghasilan</label>
                                    <?php
                                    $query = $this->db->get('tb_kriteria_penghasilan')->result_array();
                                    ?>
                                    <select class="custom-select" id="id_kriteria_penghasilan" name="id_kriteria_penghasilan" required>
                                        <option value="">-Pilih-</option>
                                        <?php foreach ($query as $row) { ?>
                                            <option value="<?= $row['id_kriteria_penghasilan'] ?>"><?= $row['jumlah_penghasilan'] ?></option>
                                        <?php }  ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Pengeluaran</label>
                                    <?php
                                    $query = $this->db->get('tb_kriteria_pengeluaran')->result_array();
                                    ?>
                                    <select class="custom-select" id="id_kriteria_pengeluaran" name="id_kriteria_pengeluaran" required>
                                        <option value="">-Pilih-</option>
                                        <?php foreach ($query as $row) { ?>
                                            <option value="<?= $row['id_kriteria_pengeluaran'] ?>"><?= $row['jumlah_pengeluaran'] ?></option>
                                        <?php }  ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Jumlah Tanggungan</label>
                                    <?php
                                    $query = $this->db->get('tb_kriteria_jumlah_tanggungan')->result_array();
                                    ?>
                                    <select class="custom-select" id="id_kriteria_jumlah_tanggungan" name="id_kriteria_jumlah_tanggungan" required>
                                        <option value="">-Pilih-</option>
                                        <?php foreach ($query as $row) { ?>
                                            <option value="<?= $row['id_kriteria_jumlah_tanggungan'] ?>"><?= $row['jumlah_tanggungan'] ?></option>
                                        <?php }  ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label>Label</label>
                                    <select class="custom-select" id="label" name="label" required>
                                        <option value="">-Pilih-</option>
                                        <option value="layak">Layak</option>
                                        <option value="tidak_layak">tidak layak</option>
                                    </select>
                                </div>
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