<div class="row">
    <div class="container-fluid">
        <div class="col">
            <div class="card shadow">
                <div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
                <div class="card-body">
                    <form action="<?= site_url('C_dashboard/add_admin'); ?>" method="POST">
                        <h5>Tambah Admin Baru</h5>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-3">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required>
                                <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group col-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                                <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                                <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group col-3">
                                <label>Konfirmasi Password</label>
                                <input type="password" name="confirm_password" class="form-control" required>
                                <?= form_error('confirm_password', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-3">
                                <label>Sebagai</label>
                                <select class="custom-select" name="level" required>
                                    <option selected disabled>-Pilih-</option>
                                    <option value="admin">Admin</option>
                                </select>
                                <?= form_error('level', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>