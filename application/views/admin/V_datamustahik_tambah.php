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
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" required="" class="form-control">
                        </div>

                        <div class="form-group col-3">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" required="" class="form-control">
                        </div>


                    </div>
                    <div class="form-row">

                        <div class="form-group col-2">
                            <label>Pekerjaan</label>
                            <?php
                            $query = $this->db->get('tb_kriteria_pekerjaan')->result_array();
                            ?>
                            <select class="custom-select" id="id_kriteria_pekerjaan" name="id_kriteria_pekerjaan" required>
                                <option selected disabled>-Pilih-</option>
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
                            <select class="custom-select" id="id_kriteria_penghasilan" name="id_kriteria_penghasilan" required>
                                <option selected disabled>-Pilih-</option>
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
                            <select class="custom-select" id="id_kriteria_pengeluaran" name="id_kriteria_pengeluaran" required>
                                <option selected disabled>-Pilih-</option>
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
                            <select class="custom-select" id="id_kriteria_jumlah_tanggungan" name="id_kriteria_jumlah_tanggungan" required>
                                <option selected disabled>-Pilih-</option>
                                <?php foreach ($query as $row) { ?>
                                    <option value="<?= $row['id_kriteria_jumlah_tanggungan'] ?>"><?= $row['jumlah_tanggungan'] ?></option>
                                <?php }  ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">

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
                            <!-- <input type="text" name="jenis_kelamin" required="" class="form-control"> -->
                            <select class="custom-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option selected disabled>-Pilih-</option>
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-2">
                            <label>label</label>
                            <!-- <input type="text" name="jenis_kelamin" required="" class="form-control"> -->
                            <select class="custom-select" id="label" name="label" required>
                                <option selected disabled>-Pilih-</option>
                                <option value="layak">Layak</option>
                                <option value="tidak_layak">tidak layak</option>
                            </select>
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