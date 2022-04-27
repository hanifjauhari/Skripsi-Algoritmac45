<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Kriteria Pengeluaran</h1>
    <p class="mb-4">Berikut adalah data tabel Kriteria Pekerjaan yang ada di Lembaga Manajemen Infaq<a target="_blank" href="https://datatables.net"></a>.</p>

    <?php echo $this->session->flashdata('pesan') ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>


        </div>
        <div class="float-right">
            <a href="<?php echo base_url('C_kriteria_pengeluaran/tambah_data') ?>" class="btn btn-primary"> <i class="fa fa-plus"></i>Tambah</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <td>Jumlah Pengeluaran</td>
                        <td>Created_at</td>
                        <td>action</td>
                    </tr>

                    <?php foreach ($kriteria_pengeluaran as $png) : ?>

                        <tr>
                            <td><?php echo $png['jumlah_pengeluaran'] ?></td>
                            <td><?php echo $png['diubah_pada'] ?></td>
                            <td width=30%>
                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('C_kriteria_pengeluaran/prosesdelete/' . $png["id_kriteria_pengeluaran"]) ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                                <a class="btn btn-warning btn-xs" href="">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>