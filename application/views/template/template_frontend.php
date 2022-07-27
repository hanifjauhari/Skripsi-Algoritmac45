<!DOCTYPE HTML>
<html lang="en">

<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/front-user/css/reset.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/front-user/css/plugins.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/front-user/css/style.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/front-user/css/color.css">

    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/front-user/css/dashboard-style.css">
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="https://rekreartive.com/wp-content/uploads/2018/10/Logo-Polinema-Politeknik-Negeri-Malang-PNG-1140x1138.png">



    <script src="<?php echo base_url() ?>assets/front-user/js/jquery.min.js"></script>



    <!-- Plugins -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/modal-cross/prowl.css') ?>" />


    <style>
        .text-main {

            color: #616161
        }

        .text-muted {

            color: #9e9e9e;
        }

        .text-center {

            text-align: center;
        }



        /* alert */
        .alert {

            padding: 16px;
            border-radius: 5px;
            margin-bottom: 32px;
            text-align: left;
        }


        /* Alert Danger */
        .alert-danger {

            background-color: #ffebee;
            border: 1px solid #ffcdd2;
            color: #b71c1c;
        }


        /* Alert Success */
        .alert-success {

            background-color: #e8f5e9;
            border: 1px solid #c8e6c9;
            color: #33691e;
        }

        /* Alert Warning */
        .alert-warning {

            background-color: #fffde7;
            border: 1px solid #ffe082;
            color: #ff9800;
        }
    </style>
</head>

<body>
    <!--loader-->
    <div class="loader-wrap">
        <div class="loader-inner">
            <div class="loader-inner-cirle"></div>
        </div>
    </div>
    <!--loader end-->
    <!-- main start  -->
    <div id="main">
        <!-- header -->
        <header class="main-header">
            <!-- logo-->
            <a href="index.html" class="logo-holder">

            </a>
            <!-- logo end-->
            <!-- header-search_btn-->

            <!-- header-search_btn end-->

            <!-- <a href="<?php echo base_url('find') ?>" class="add-list color-bg">Cari Lawan <span><i class="fal fa-layer-plus"></i></span></a> -->

            <?php if (empty($this->session->userdata('sess_username'))) { ?>
                <div class="show-reg-form modal-open avatar-img" data-srcav="<?php echo base_url() ?>assets/front-user/images/avatar/3.jpg"><i class="fal fa-user"></i>Login</div>
            <?php } ?>
            <!-- header opt end-->

            <?php if ($this->session->userdata('sess_username')) { ?>
                <!-- header opt -->
                <div class="header-user-menu">
                    <div class="header-user-name">
                        <span><img src="<?php echo $this->session->userdata('sess_foto') ?>" alt=""></span>
                        Hello, <?php echo ($this->session->userdata('sess_username')) ?>
                    </div>
                    <ul>
                        <li><a href="<?php echo base_url('user/profile') ?>"> Profile Saya</a></li>
                        <!-- <li><a href="<?php echo base_url('find') ?>"> Cari Lawan</a></li> -->
                        <li><a href="<?php echo base_url('login/processlogout') ?>">Log Out</a></li>
                    </ul>
                </div>
                <!-- header opt end-->
            <?php } ?>

            <!-- nav-button-wrap-->
            <div class="nav-button-wrap color-bg">
                <div class="nav-button">
                    <span></span><span></span><span></span>
                </div>
            </div>
            <!-- nav-button-wrap end-->
            <!--  navigation -->
            <div class="nav-holder main-menu">
                <nav>
                    <ul class="no-list-style">
                        <li>
                            <a href="<?php echo base_url() ?>" class="act-link">Halaman Utama</a>
                        </li>
                        <!-- <li>
                            <a href="<?php echo base_url('main/futsal') ?>">Tentang Website</a>
                        </li> -->
                        <li>
                            <a href="<?php echo base_url('main/about') ?>">Tentang Kami</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- navigation  end -->
            <!-- header-search_container -->

        </header>
        <!-- header end-->







        <?php

        $menu = $this->uri->segment(1);
        // apabila terdapat di menu user
        if ($menu == "user") {

            $data = array(

                'namemodule'    => $namemodule,
                'namefileview'  => $namefileview
            );
            $this->load->view('template/template_user', $data);
        } else { // halaman utama | pencarian lawan | tentang aplikasi

            $this->load->view($namemodule . '/' . $namefileview);
        }

        ?>






        <!--footer -->
        <footer class="main-footer fl-wrap">

            <!--sub-footer-->
            <div class="sub-footer  fl-wrap">
                <div class="container">
                    <div class="copyright"> &#169; Match Futsal <?php echo date('Y') ?> . All rights reserved.</div>
                    <div class="subfooter-nav">
                        <ul class="no-list-style">
                            <li><a href="#">Terms of use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--sub-footer end -->
        </footer>
        <!--footer end -->
        <!--map-modal -->
        <div class="map-modal-wrap">
            <div class="map-modal-wrap-overlay"></div>
            <div class="map-modal-item">
                <div class="map-modal-container fl-wrap">
                    <div class="map-modal fl-wrap">
                        <div id="singleMap" data-latitude="40.7" data-longitude="-73.1"></div>
                    </div>
                    <h3><span>Location for : </span><a href="#">Listing Title</a></h3>
                    <div class="map-modal-close"><i class="fal fa-times"></i></div>
                </div>
            </div>
        </div>
        <!--map-modal end -->
        <!--register form -->
        <div class="main-register-wrap modal">
            <div class="reg-overlay"></div>
            <div class="main-register-holder tabs-act">
                <div class="main-register fl-wrap  modal_main">
                    <div class="main-register_title">Selamat Datang <span><strong>Di Lembaga Manajemen Infaq</strong></span></div>
                    <div class="close-reg"><i class="fal fa-times"></i></div>

                    <?php if ($this->input->get('page') == "" || $this->input->get('page') == "starter") { ?>
                        <ul class="tabs-menu fl-wrap no-list-style">
                            <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i> Masuk</a></li>
                            <!-- <li><a href="#tab-2"><i class="fal fa-user-plus"></i> Daftar</a></li> -->
                        </ul>
                    <?php } ?>
                    <!--tabs -->
                    <div class="tabs-container">
                        <div class="tab">
                            <!--tab -->
                            <div id="tab-1" class="tab-content first-tab">
                                <?= $this->session->flashdata('message') ?>
                                <div class="custom-form">
                                    <?php if ($this->input->get('page') == "forgot") { ?>
                                        <!-- Halaman permintaan lupa password -->

                                        <form action="<?php echo base_url('login/proseslupapassword') ?>" method="POST" name="registerform">

                                            <label>Email <span>*</span> </label>
                                            <input name="email" type="email" onClick="this.select()" value="" required="">

                                            <button type="submit" class="btn float-btn color2-bg"> Proses <i class="fas fa-caret-right"></i></button>

                                        </form>
                                        <div class="lost_password">
                                            <a href="<?php echo base_url() ?>?page=starter">Halaman Login?</a>
                                        </div>



                                    <?php } else if ($this->input->get('page') == "validate") { ?>


                                        <!-- Halaman permintaan lupa password -->

                                        <form action="<?php echo base_url('login/verifyaccount') ?>" method="POST" name="registerform">

                                            <label>Kode Aktivasi <span>*</span> </label>

                                            <input type="hidden" name="email" value="<?php echo $this->input->get('email') ?>">
                                            <input name="kode" type="text" onClick="this.select()" value="" required="">


                                            <label>Kata Sandi Baru <span>*</span> </label>
                                            <input name="password" type="password" required="">

                                            <button type="submit" class="btn float-btn color2-bg"> Simpan <i class="fas fa-caret-right"></i></button>

                                        </form>
                                        <div class="lost_password">
                                            <a href="<?php echo base_url() ?>?page=starter">Halaman Login?</a>
                                        </div>



                                    <?php } else { ?>
                                        <form action="<?= base_url('C_auth/login') ?>" method="POST" name="registerform">
                                            <!-- Halaman permintaan login utama -->
                                            <?php

                                            $username = "";

                                            if ($this->input->get('username')) {

                                                $username = $this->input->get('username');
                                            }
                                            ?>
                                            <label>Username <span>*</span> </label>
                                            <input name="username" type="text" onClick="this.select()" value="<?= $username ?>" required>

                                            <label>Password <span>*</span> </label>
                                            <input name="password" type="password" name="password" onClick="this.select()" required>
                                            <button type="submit" class="btn float-btn color2-bg"> Log In<i class="fas fa-caret-right"></i></button>

                                            <div class="clearfix"></div>
                                            <div class="filter-tags">
                                                <input id="check-a3" type="checkbox" name="check">
                                                <label for="check-a3">Remember me</label>
                                            </div>
                                        </form>
                                        <div class="lost_password">
                                            <a href="<?php echo base_url() ?>?page=forgot">Lupa Kata Sandi?</a>
                                        </div>

                                    <?php  } ?>
                                </div>
                            </div>
                            <!--tab end -->
                            <!--tab -->
                            <!-- <div class="tab">
                                <div id="tab-2" class="tab-content">
                                    <div class="custom-form">
                                        <form action="<?= base_url('C_auth/register') ?>" method="POST">
                                            <label>Nama Lengkap <span>*</span> </label>
                                            <input name="name" type="text" onClick="this.select()" value="" placeholder="Masukkan nama lengkap">


                                            <label>Email <span>*</span></label>
                                            <input name="email" type="email" placeholder="Masukkan email aktif" onClick="this.select()" value="" required="" />


                                            <label>Username <span>*</span></label>
                                            <input name="username" type="text" placeholder="Masukkan username aktif" onClick="this.select()" value="" required="" />

                                            <label>Kata Sandi <span>*</span></label>
                                            <input name="password" type="password" placeholder="Masukkan kata sandi" onClick="this.select()" value="">


                                            <div class="filter-tags ft-list">
                                                <input id="check-a2" type="checkbox" name="check">
                                                <label for="check-a2">I agree to the <a href="#">Privacy Policy</a></label>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="filter-tags ft-list">
                                                <input id="check-a" type="checkbox" name="check">
                                                <label for="check-a">I agree to the <a href="#">Terms and Conditions</a></label>
                                            </div>
                                            <div class="clearfix"></div>
                                            <button type="submit" class="btn float-btn color2-bg"> Register <i class="fas fa-caret-right"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div> -->
                            <!--tab end -->
                        </div>
                        <!--tabs end -->
                        <div class="wave-bg">
                            <div class='wave -one'></div>
                            <div class='wave -two'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--register form end -->
        <a class="to-top"><i class="fas fa-caret-up"></i></a>
    </div>
    <!-- Main end -->
    <!--=============== scripts  ===============-->

    <script src="<?php echo base_url() ?>assets/front-user/js/plugins.js"></script>
    <script src="<?php echo base_url() ?>assets/front-user/js/scripts.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAz75BNA0oYrDLhu4MxK-yut4XzfYAeY6I&amp;libraries=places&amp;callback=initAutocomplete"></script>         -->

    <!-- <script src="<?php echo base_url() ?>assets/front-user/js/map-single.js"></script>              -->
    <script src="<?php echo base_url('assets/plugins/modal-cross/prowl.js') ?>"></script>
    <!-- 
    <script>
        $(function() {

            <?php

            $page = $this->input->get('page');
            if ($page && $page == "starter" || $page == "forgot" || $page == "validate") : ?>

                $('.modal , .reg-overlay').fadeIn(200);
                $(".modal_main").addClass("vis_mr");
                $("html, body").addClass("hid-body");

            <?php endif; ?>


            $('.close-reg , .reg-overlay').on("click", function() {
                modal.hide();
            });




            // range slider 
            $('.range-radius').ionRangeSlider({

                <?php

                $from = 10;

                if ($this->input->get('radius')) {

                    $from = $this->input->get('radius');
                }

                ?>

                min: 5,
                max: 20,
                from: <?php echo $from ?>
            });
        })
    </script> -->
</body>

</html>