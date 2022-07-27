<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Data Mustahik</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_data->allData; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Layak
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_data->dataWorth; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tasks Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Jumlah Tidak Layak
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_data->dataUnworth; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="text-center"><h3>Cara Penggunaan</h3></div>
    <center><div class="progress col-xl-1 mt-3" style="height: 3px;">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
    </div></center>
    <div class="text-center mt-3"><p>Berikut adalah tahap dalam menggunakan aplikasi pencarian lawan lembaga.</p></div>
    <div class="row">
        <div class="col-md-3 mx-auto">
            <div class="bg-white border border-info rounded text-center">
                <i class="fas fa-user-plus fa-3x text-info text-center mt-3" style="opacity: 0.3;"></i>
                <div class="font-weight-bold mt-2">Penginputan Data Mustahik</div>
                <div class="text-xs font-weight-normal text-dark mx-2 mt-2 mb-3">
                    Lakukanlah penginputan mustahik ke dalam aplikasi
                </div>
            </div>
        </div>
        <span class="fas fa-long-arrow-alt-right fa-2x my-auto"></span>
        <div class="col-md-3 mx-auto">
            <div class="bg-white border border-info rounded text-center">
                <i class="fas fa-spinner fa-3x text-info text-center mt-3" style="opacity: 0.3;"></i>
                <div class="font-weight-bold mt-2">Proses Mining</div>
                <div class="text-xs font-weight-normal text-dark mx-2 mt-2 mb-3">
                    Setelah melakukan penginputan, lakukanlah proses mining
                </div>
            </div>
        </div>
        <span class="fas fa-long-arrow-alt-right fa-2x my-auto"></span>
        <div class="col-md-3 mx-auto">
            <div class="bg-white border border-info rounded text-center">
                <i class="fas fa-handshake fa-3x text-info text-center mt-3" style="opacity: 0.3;"></i>
                <div class="font-weight-bold mt-2">Hasil akhir</div>
                <div class="text-xs font-weight-normal text-dark mx-2 mt-2 mb-3">
                    Setelah proses mining selesai, maka akan menghasilkan suatu pohon keputusan
                </div>
            </div>
        </div>
        </div>
        
    </div>
</div>
</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?php echo base_url('login/processlogout') ?> ">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets1/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets1/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets1/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets1/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>