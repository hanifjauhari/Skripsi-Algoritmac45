<div class="content">
    <!--typography-page -->
    <div class="typo-w3">
        <div class="container">
            <h2 class="tittle">Daftar Admin</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <a href="<?= site_url('C_dashboard/add_admin'); ?>" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Admin</a>
                    </div>
                    <?= $this->session->flashdata('message'); ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-dark">
                            <td>Username</td>
                            <td>Level</td>
                            <td>Status</td>
                        </thead>

                        <?php 
                        foreach ($list_admin as $list) : ?>

                            <tr>
                                <td><?= $list->username; ?></td>
                                <td><?= $list->level; ?></td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="inlineRadioActive" id="checkBoxRadio<?=$list->id_profile?>" value="aktif-<?=$list->id_profile?>" <?php if($list->status == "aktif") echo 'checked' ?>>
                                        <label class="form-check-label">Aktif</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="inlineRadioNonActive" id="checkBoxRadio<?=$list->id_profile?>" value="nonaktif-<?=$list->id_profile?>" <?php if($list->status == "nonaktif") echo 'checked' ?>>
                                        <label class="form-check-label">Non-Aktif</label>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>