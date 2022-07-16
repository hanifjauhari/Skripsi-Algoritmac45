<!-- Karena sudah ada template header footer, langsung copas kontennya -->

<?php

$kolom = $data_kriteria_pekerjaan->row_array();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sunting Data kriteria pekerjaan</h1>
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

                    <form action="<?php echo site_url('C_kriteria_pekerjaan/prosesupdate/' . $kolom['id_kriteria_pekerjaan']) ?>" method="POST" enctype="multipart/form-data">
                        <div class="card card-body">

                            <h4>Form Sunting Data Kriteria Pekerjaan</h4>


                            <div class="form-group">

                                <label>Nama Kriteria Pekerjaan</label>
                                <input type="text" class="form-control" name="nama_pekerjaan" required="" value="<?php echo $kolom['nama_pekerjaan'] ?>">
                                <small>Masukkan nama kriteria pekerjaan</small>
                            </div>


                            <div class="form-group">

                                <label>diubah_pada</label>
                                <input type="text" class="form-control" name="diubah_pada" required="" value="<?php echo $kolom['diubah_pada'] ?>">
                                <small>diubah pada</small>
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