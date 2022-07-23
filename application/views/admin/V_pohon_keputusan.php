<div class="content">
    <!--typography-page -->
    <div class="typo-w3">
        <div class="container">
            <h2 class="tittle">Pohon Keputusan</h2>
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <a href="" class="btn btn-danger" onClick="return confirm('Anda yakin akan hapus pohon keputusan?')">
                            Hapus Pohon Keputusan
                        </a>
                        <!--<a href="?menu=pohon_tree" >Lihat Pohon Keputusan</a> |-->
                        <a href="<?= site_url('C_pohonkeputusan/test_rules'); ?>" class="btn btn-default">Uji Rule</a>
                    </p>

                    <table class='table table-bordered table-hover'>
                        <thead class="table-dark">
                            <th>Id</th>
                            <th>Aturan</th>
                        </thead>
                        <?php $i = 1; 
                        foreach ($pohon_keputusan as $data) { ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td>IF <?= $data->aturan; ?> THEN Label = '<?= $data->keputusan; ?>'</td>
                            </tr>
                        <?php }?>
                    </table>
                </div>
            </div>
        </div>
    </div>