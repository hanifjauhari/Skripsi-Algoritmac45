<div class="content">
    <!--typography-page -->
    <div class="typo-w3">
        <div class="container">
            <h2 class="tittle">Uji Pohon Keputusan</h2>
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <table class='table table-bordered table-hover'>
                        <thead class="table-dark">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Pekerjaan</th>
                            <th>Penghasilan</th>
                            <th>Pengeluaran</th>
                            <th>Jumlah Tanggungan</th>
                            <th>Keputusan Asli</th>
                            <th>Keputusan Hasil</th>
                            <th>Id Rule</th>
                            <th>Ketepatan</th>
                        </thead>
                        <tbody>
                            <?= $result; ?>
                        </tbody>
                    </table>
                    <br>
                    <?= $accuracy; ?>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>