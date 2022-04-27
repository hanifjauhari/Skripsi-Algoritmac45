<div class="content">
    <!--typography-page -->
    <div class="typo-w3">
        <div class="container">
            <h2 class="tittle">Mining</h2>
            <div class="row">
                <div class="col-md-12">
                    <!--UPLOAD EXCEL FORM-->
                    <form method="post" enctype="multipart/form-data" action="">
                        <div class="form-group">
                            <div class="input-group">
                                <label>Import data from excel</label>
                                <input name="file_data_latih" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="submit" type="submit" value="Upload Data" class="btn btn-success">
                            <button name="delete" type="submit" class="btn btn-danger" onclick="">
                                <i class="fa fa-trash-o"></i> Delete All Data Latih
                            </button>
                        </div>
                        <div class="form-group">
                            <!--<input name="submit" type="submit" value="Upload Data" class="btn btn-success">-->
                            <button name="proses_mining" type="submit" class="btn btn-default" onclick="">
                                <i class="fa fa-check"></i> Proses Mining
                            </button>
                        </div>
                    </form>

                    <table class='table table-bordered table-striped  table-hover'>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Usia</th>
                            <th>Sekolah</th>
                            <th>Jawaban A</th>
                            <th>Jawaban B</th>
                            <th>Jawaban C</th>
                            <th>Jawaban D</th>
                            <th>Kelas Asli</th>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- //typography-page -->

</div>