<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Mustahik</h1>
    <p class="mb-4">Berikut adalah data tabel Kriteria Pekerjaan yang ada di Lembaga Manajemen Infaq<a target="_blank" href="https://datatables.net"></a>.</p>
    <?php echo $this->session->flashdata('pesan') ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>

        <div class="float-right">
            <a href="<?php echo base_url('C_datamustahik/tambah_data') ?>" class="btn btn-primary"> <i class="fa fa-plus"></i>Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telp</th>
                        <th>Pekerjaan</th>
                        <th>Penghasilan</th>
                        <th>Pengeluaran</th>
                        <th>Jumlah Tanggungan</th>
                        <th>Label</th>
                        <th>Aksi</th>

                    </tr>

                    <?php $i = 1;
                    foreach ($datamustahik as $mustahik) { ?>

                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $mustahik['nama'] ?></td>
                            <td><?php echo $mustahik['alamat'] ?></td>
                            <td><?php echo $mustahik['telp'] ?></td>
                            <td><?php echo $mustahik['pekerjaan'] ?></td>
                            <td><?php echo $mustahik['penghasilan'] ?></td>
                            <td><?php echo $mustahik['pengeluaran'] ?></td>
                            <td><?php echo $mustahik['tanggungan'] ?></td>
                            <td><?php echo $mustahik['label'] ?></td>

                            <td width=30%>
                                <a class="btn btn-danger btn-xs" href="<?php echo site_url('C_datamustahik/prosesdelete/' . $mustahik['id_mustahik']) ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                                <a class="btn btn-warning btn-xs" href="<?php echo site_url('C_datamustahik/edit/' . $mustahik['id_mustahik'])?>">Edit</a>
                                <a class="btn btn-success btn-xs" style="background-color:green" href="<?php echo site_url('C_datamustahik/detail/' . $mustahik['id_mustahik']) ?>">Detail</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>