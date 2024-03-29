<div class="content">
    <!--typography-page -->
    <div class="typo-w3">
        <div class="container">
            <div class="row">
                <h2 class="tittle">Mining</h2>
                <div class="col-md-12">
                    <br>
                    <div class="row">Jumlah data = <?= $count_data->result; ?></div>
                    <div class="row">Jumlah Layak = <?= $count_layak->result; ?> </div>
                    <div class="row">Jumlah Tidak Layak = <?= $count_tidak_layak->result; ?></div>
                    <div class="row">Entropy all = <?= $entropy_all; ?></div>
                    <div class="row">
                        <table class='table table-bordered table-hover'>
                            <thead class="table-dark">
                                <th>Nilai Atribut</th>
                                <th>Jumlah Data</th>
                                <th>Layak</th>
                                <th>Tidak Layak</th>
                                <th>Entropy</th>
                                <th>Gain</th>
                            </thead>
                            <?=$algoritm_c45;?>
                        </table>
                    </div>
                    <br>
                    <?= $attribute_tree; ?>
                    <?= $attribute_tree2; ?>
                    <?= $attribute_tree3; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- //typography-page -->

</div>