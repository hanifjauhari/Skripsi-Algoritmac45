<!-- wrapper-->
<div id="">
                <!-- content-->
                <div class="">
                    <section class="gray-bg no-top-padding-sec" id="sec1">
                        <div class="container">

                            <div class="list-main-wrap-title single-main-wrap-title fl-wrap">
                                <h2>Permintaan Pengajuan Sparing Futsal : <span><?php echo $pengajuan['nama'] ?></span></h2>
                            </div>
                            <div class="fl-wrap">
                                <div class="row" style="display: flex; justify-content: center;">
                                    <div class="col-md-12">
                                        <ul id="progressbar" class="no-list-style">
                                            <li class="active"><span class="tolt" data-microtip-position="top" data-tooltip="Informasi Pengajuan">01.</span></li>
                                            <li><span class="tolt" data-microtip-position="top" data-tooltip="Lapangan">02.</span></li>
                                            <li><span class="tolt" data-microtip-position="top" data-tooltip="Konfirmasi">03.</span></li>
                                        </ul>
                                        <div class="bookiing-form-wrap block_box fl-wrap">
                                            <!--   list-single-main-item -->
                                            <div class="list-single-main-item fl-wrap hidden-section tr-sec">
                                                <div class="profile-edit-container">
                                                    <div class="custom-form">
                                                        <form action="<?php echo base_url('user/pertandingan/prosesubah/'. $pengajuan['id_pertandingan']) ?>" method="POST" id="form-request">
                                                            <fieldset class="fl-wrap">
                                                                <div class="list-single-main-item-title fl-wrap">
                                                                    <h3>Informasi Pengajuan</h3>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <label class="vis-label">Tim Futsal Lawan <i class="far fa-user"></i></label>
                                                                        <input type="text" value="<?php echo $pengajuan['nama'] ?>" readonly />

                                                                        <input type="hidden" name="lawan" value="<?php echo $pengajuan['id_grup_lawan'] ?>" />
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <label class="vis-label">Keterangan (Opsional)  </label>
                                                                        <textarea name="keterangan_pengajuan" id="" cols="30" rows="10" placeholder="Masukkan keterangan pengajuan tanding futsal apabila perlu . . ." required=""><?php echo $pengajuan['keterangan_pengajuan'] ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="log-massage">Berisi catatan tambahan atau keterangan</div>
                                                                
                                                                <span class="fw-separator"></span>
                                                                <div class="clearfix"></div>
                                                                <a  href="#"  class="next-form action-button color-bg">Tambah Lokasi Lapangan</a>
                                                            </fieldset>
                                                            <fieldset class="fl-wrap">
                                                                <div class="list-single-main-item-title fl-wrap">
                                                                    <h3>Informasi Lapangan</h3>
                                                                </div>
                                                                <div class="row" style="margin-bottom: 40px">
                                                                    <div class="col-sm-12">
                                                                        <label class="vis-label">Lokasi Lapangan </label>
                                                                        <div class="listsearch-input-item ">
                                                                            <select data-placeholder="Data Lapangan" name="lapangan" class="chosen-select no-search-select" required="">
                                                                                <option value="">-- Pilih Lokasi Lapangan --</option>

                                                                                <?php foreach( $lapangan->result_array() AS $rowLapangan ) : ?>
                                                                                <option value="<?php echo $rowLapangan['id_lapangan'] ?>" <?php if ( $pengajuan['id_lapangan'] == $rowLapangan['id_lapangan'] ) { echo 'selected="selected"'; } ?>><?php echo $rowLapangan['nama_lapangan'] ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <span class="fw-separator"></span>
                                                                <a  href="#"  class="previous-form action-button back-form   color2-bg">Kembali</a>
                                                                <a  href="#"  class="next-form   action-button color-bg">Lanjutnya</a>
                                                            </fieldset>
                                                            <fieldset class="fl-wrap">
                                                                <div class="list-single-main-item-title fl-wrap">
                                                                    <h3>Konfirmasi</h3>
                                                                </div>
                                                                <div class="success-table-container">
                                                                    <div class="success-table-header fl-wrap">
                                                                        <i class="fal fa-check-circle decsth"></i>
                                                                        <h4>Permintaan Anda Sudah Siap.</h4>
                                                                        <div class="clearfix"></div>
                                                                        <p>Klik tombol disamping untuk mengirim pengajuan anda.</p>
                                                                        <a href="javascript:void(0)" id="submit-request" class="color-bg">Ajukan Sekarang</a>
                                                                    </div>
                                                                </div>
                                                                <span class="fw-separator"></span>
                                                                <a  href="#"  class="previous-form action-button  back-form   color2-bg">Kembali</a>
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--   list-single-main-item end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!--content end-->
            </div>
            <!-- wrapper end-->



            <script>
            
                $(function() {

                    $('#submit-request').click(function() {

                        $('#form-request').submit();
                    });
                });
            </script>