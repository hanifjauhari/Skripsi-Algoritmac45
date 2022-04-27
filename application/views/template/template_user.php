            <?php $this->load->model('M_group'); ?>
            
            <!-- wrapper-->
            <div id="wrapper">
                <!-- content-->
                <div class="content">
                    <!--  section  -->
                    <section class="parallax-section dashboard-header-sec gradient-bg" data-scrollax-parent="true">
                        <div class="container">
                            <div class="dashboard-breadcrumbs breadcrumbs"><a href="#">Halaman Utama</a>
                            <span><?php echo $breadcrumb ?></span></div>
                            <div class="dashboard-header_conatiner fl-wrap dashboard-header_title">
                                <h1>Selamat Datang  : <span>

                                    <?php

                                        
                                        $nama = "SuperAdmin";
                                        if ( $this->session->userdata('sess_level') == "user" ) {

                                            $nama = $this->session->userdata('sess_name');
                                        }

                                        echo $nama;
                                    ?>
                                
                                </span></h1>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="dashboard-header fl-wrap">
                            <div class="container">
                                <div class="dashboard-header_conatiner fl-wrap">
                                    <div class="dashboard-header-avatar">
                                        <img src="<?php echo $this->session->userdata('sess_foto') ?>" alt="Foto sampul">
                                        <a href="<?php echo base_url('user/setting') ?>" class="color-bg edit-prof_btn"><i class="fal fa-edit"></i></a>
                                    </div>
                                    <div class="dashboard-header-stats-wrap">
                                        <div class="dashboard-header-stats">
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper">
                                                    <!--  dashboard-header-stats-item -->
                                                    <div class="swiper-slide">
                                                        <div class="dashboard-header-stats-item">

                                                            <?php


                                                                $dataGrupFutsal = $this->M_group->mengidentifikasiPosisi();
                
                                                                $jmlTim = 0;
                                                                $jmlReview = 0;
                                                                $jmlBertanding  = 0;
                                                                $jmlLawan = 0;
                                                    
                                                                $dataChart = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                                                                
                                                                if ( $dataGrupFutsal->num_rows() > 0 ) {
                                                    
                                                                    $id_grup = $dataGrupFutsal->row()->id_grup;
                                                    
                                                                    $jmlTim     = $this->M_group->getTimGroupFutsal( ['id_grup' => $id_grup] )->num_rows();
                                                                    $jmlReview  = $this->M_group->getReviewGroupFutsal( ['id_grup' => $id_grup] )->num_rows();
                                                                    $jmlBertanding  = $this->M_group->getPertandingan( $id_grup )->num_rows();
                                                                    $jmlLawan = $this->M_group->jumlahLawan( $id_grup )->num_rows(); 
                                                                }
                                                            ?>

                                                            <i class="fal fa-map-marked"></i>
                                                            Jumlah Lawan Futsal
                                                            <span><?php echo $jmlLawan ?></span>
                                                        </div>
                                                    </div>
                                                    <!--  dashboard-header-stats-item end -->
                                                    <!--  dashboard-header-stats-item -->
                                                    <div class="swiper-slide">
                                                        <div class="dashboard-header-stats-item">
                                                            <i class="fal fa-comments-alt"></i>
                                                            Total Review
                                                            <span><?php echo $jmlReview ?></span>
                                                        </div>
                                                    </div>
                                                    <!--  dashboard-header-stats-item end -->
                                                    <!--  dashboard-header-stats-item -->
                                                    <div class="swiper-slide">
                                                        <div class="dashboard-header-stats-item">
                                                            <i class="fal fa-users"></i>
                                                            Anggota Tim
                                                            <span><?php echo $jmlTim ?></span>
                                                        </div>
                                                    </div>
                                                    <!--  dashboard-header-stats-item end -->
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                               
                                </div>
                            </div>
                        </div>
                        <div class="gradient-bg-figure" style="right:-30px;top:10px;"></div>
                        <div class="gradient-bg-figure" style="left:-20px;bottom:30px;"></div>
                        <div class="circle-wrap" style="left:120px;bottom:120px;" data-scrollax="properties: { translateY: '-200px' }">
                            <div class="circle_bg-bal circle_bg-bal_small"></div>
                        </div>
                        <div class="circle-wrap" style="right:420px;bottom:-70px;" data-scrollax="properties: { translateY: '150px' }">
                            <div class="circle_bg-bal circle_bg-bal_big"></div>
                        </div>
                        <div class="circle-wrap" style="left:420px;top:-70px;" data-scrollax="properties: { translateY: '100px' }">
                            <div class="circle_bg-bal circle_bg-bal_big"></div>
                        </div>
                        <div class="circle-wrap" style="left:40%;bottom:-70px;"  >
                            <div class="circle_bg-bal circle_bg-bal_middle"></div>
                        </div>
                        <div class="circle-wrap" style="right:40%;top:-10px;"  >
                            <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
                        </div>
                        <div class="circle-wrap" style="right:55%;top:90px;"  >
                            <div class="circle_bg-bal circle_bg-bal_versmall" data-scrollax="properties: { translateY: '-350px' }"></div>
                        </div>
                    </section>
                    <!--  section  end-->
                    <!--  section  -->
                    <section class="gray-bg main-dashboard-sec" id="sec1">
                        <div class="container">
                            <!--  dashboard-menu-->
                            <div class="col-md-3">
                                <div class="mob-nav-content-btn color2-bg init-dsmen fl-wrap"><i class="fal fa-bars"></i> Dashboard menu</div>
                                <div class="clearfix"></div>
                                <div class="fixed-bar fl-wrap" id="dash_menu">
                                    <div class="user-profile-menu-wrap fl-wrap block_box">
                                        <!-- user-profile-menu-->
                                        <div class="user-profile-menu">
                                            <h3>Main</h3>
                                            <ul class="no-list-style">
                                                <li><a href="<?php echo base_url('user/profile') ?>"><i class="fal fa-chart-line"></i>Dashboard</a></li>
                                                <li><a href="<?php echo base_url('user/group') ?>"><i class="fal fa-users"></i>Tim Futsal</a></li>
                                                <li><a href="<?php echo base_url('user/message') ?>"><i class="fal fa-envelope"></i>Perpesanan</a></li>
                                                <li><a href="<?php echo base_url('user/pertandingan/pengajuan') ?>"><i class="fal fa-feather-alt"></i>Pengajuan Bertanding</a></li>
                                                <li><a href="<?php echo base_url('user/pertandingan/permintaan') ?>"><i class="fal fa-futbol"></i>Permintaan Lawan</a></li>
                                                <li><a href="<?php echo base_url('user/tim') ?>"><i class="fal fa-user-plus"></i>Permintaan Tim Baru</a></li>
                                            </ul>
                                        </div>
                                        <!-- user-profile-menu end-->
                                        <!-- user-profile-menu-->
                                        <div class="user-profile-menu">
                                            <h3>Perbaikan</h3>
                                            <ul  class="no-list-style">
                                                <li><a href="<?php echo base_url('user/setting') ?>"><i class="fal fa-th-list"></i> Pengaturan Umum </a></li>
                                            </ul>
                                        </div>
                                        <!-- user-profile-menu end-->
                                        <a href="<?php echo base_url('login/processlogout') ?>" class="logout_btn color2-bg">Log Out <i class="fas fa-sign-out"></i></a>
                                    </div>
                                </div>
                                <a class="back-tofilters color2-bg custom-scroll-link fl-wrap" href="<?php echo base_url() ?>">Back to Menu<i class="fas fa-caret-up"></i></a>
                                <div class="clearfix"></div>
                            </div>
                            <!-- dashboard-menu  end-->
                            <!-- dashboard content-->
                            <div class="col-md-9">
                                
                                <?php $this->load->view($namemodule.'/'.$namefileview) ?>

                            </div>
                            <!-- dashboard content end-->
                        </div>
                    </section>
                    <!--  section  end-->
                    <div class="limit-box fl-wrap"></div>
                </div>
                <!--content end-->
            </div>
            <!-- wrapper end-->