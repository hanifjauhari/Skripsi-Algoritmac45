
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo @$title ? $title : 'Futsal Malang' ?></title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="<?php echo base_url() ?>assets/css/nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="<?php echo base_url() ?>assets/css/demo/nifty-demo-icons.min.css" rel="stylesheet">

    <!--jQuery [ REQUIRED ]-->
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>


    <!--=================================================-->



    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="<?php echo base_url() ?>assets/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>assets/plugins/pace/pace.min.js"></script>
    <script>
        var serverside = '<?php echo base_url() ?>';
    </script>


    <!-- Theme -->
    <link rel="stylesheet" href="<?php echo base_url('assets/themes/theme-navy.min.css') ?>">

    <!--Demo [ DEMONSTRATION ]-->
    <link href="<?php echo base_url() ?>assets/css/demo/nifty-demo.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/') ?>plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
    <!--Ion Icons [ OPTIONAL ]-->
    <link href="<?php echo base_url('assets/') ?>plugins/ionicons/css/ionicons.min.css" rel="stylesheet">
    
    <!--Font Awesome [ OPTIONAL ]-->
    <link href="<?php echo base_url('assets/') ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">


    <!--DataTables [ OPTIONAL ]-->
    <link href="<?php echo base_url('assets/') ?>plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url('assets/') ?>plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css" rel="stylesheet">


    <link rel="shortcut icon" href="<?php echo base_url('assets/img/futsal2.png') ?>" />


</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->


<body>


    <?php
        
        $footerFixed = "";
        $uriSegment = $this->uri->segment(1);
        $mainnav = "mainnav-lg";

        $view = $this->input->get('v');

    ?>
    <div id="container" class="effect aside-float aside-bright <?php echo $mainnav.' '.$footerFixed ?>">
        
        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="" class="navbar-brand text-center">    
                        <img src="<?php echo base_url('assets/img/futsal2.png') ?>" alt="Polinema" class="brand-icon" style="padding: 10px">
                        <div class="brand-title">
                            <span class="brand-text">Futsal</span>
                        </div>
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->


                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content">
                    <ul class="nav navbar-top-links">

                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="demo-pli-list-view"></i>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Navigation toogle button-->

                    </ul>
                    <ul class="nav navbar-top-links">


                        <!--User dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li id="dropdown-user" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="ic-user pull-right">
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <!--You can use an image instead of an icon.-->
                                    <!--<img class="img-circle img-user media-object" src="<?php echo base_url() ?>assets/img/profile-photos/1.png" alt="Profile Picture">-->
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <i class="demo-pli-male"></i>
                                </span>
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <!--You can also display a user name in the navbar.-->
                                <!--<div class="username hidden-xs">Aaron Chavez</div>-->
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            </a>


                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                                <ul class="head-list">
                                    <li>
                                        <a href="<?php echo base_url('admin/setting') ?>"><i class="demo-pli-male icon-lg icon-fw"></i> Profile</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('login/processlogout') ?>"><i class="demo-pli-unlock icon-lg icon-fw"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End user dropdown-->
 
                    </ul>
                </div>
                <!--================================-->
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

            <!--Small Bootstrap Modal-->
            <!--===================================================-->
            <div id="process-loader" class="modal fade" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="">
                        <div class="load6" style="color: #fff">
                            <div class="loader" style="color: #69f0ae"></div>
                            <h4 class="text-center" style="color: #00e676">Sedang Memproses</h4>
                            <div class="text-center"><small>Tunggu beberapa saat, kami sedang mengerjakan</small></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--===================================================-->
            <!--End Small Bootstrap Modal-->



            <?php $this->load->view( $namemodule.'/'.$namefileview ) ?>


            

            
            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <nav id="mainnav-container">
                <div id="mainnav">



                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">

                                <!--Profile Widget-->
                                <!--================================-->
                                <div id="mainnav-profile" class="mainnav-profile">
                                    <div class="profile-wrap text-center">
                                        <div class="pad-btm">
                                        <?php
                                            
                                            $full_name = "";
                                            $caption   = "";
                                            $level = $this->session->userdata('sess_level');

                                            if ( $level == "admin" ) {

                                                
                                                $full_name = $this->session->userdata('sess_username');
                                                $caption   = "Sistem Informasi Match Futsal";
                                                $img = 'admin';
                                                
                                            } else {

                                                $gender = $this->session->userdata('sess_gender');
                                                $img = ($gender == "L") ? '1' : '8';

                                                $full_name = "Febrian Awanda";
                                                $caption   = "Super Admin";
                                            }
                                        ?>

                                            <img class="img-circle img-md" src="<?php echo base_url() ?>assets/img/profile-photos/<?php echo $img ?>.png" alt="Profile Picture">
                                        </div>
                                        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                            <p class="mnp-name"><?php echo ucwords($full_name) ?></p>
                                            <span class="mnp-desc">
                                                <?php echo ucwords($caption); ?>
                                            </span>
                                        </a>
                                    </div>
                                    <div id="profile-nav" class="collapse list-group bg-trans">
                                        <a href="<?php echo base_url('admin/setting') ?>" class="list-group-item">
                                            <i class="demo-pli-male icon-lg icon-fw"></i> Pengaturan Akun
                                        </a>
                                        <a href="<?php echo base_url('login/processlogout') ?>" class="list-group-item">
                                            <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                                        </a>
                                    </div>
                                </div>




                                <ul id="mainnav-menu" class="list-group">
						
						            <!--Nav-->
						            <li class="list-header">Menu Navigasi</li>
                                    
						
						            <!--Menu list item-->
						            <li class="<?php echo $this->uri->segment(2) == "dashboard" ? 'active-sub' : '' ?>">
						                <a href="<?php echo base_url('admin/dashboard') ?>">
						                    <i class="demo-pli-home"></i>
						                    <span class="menu-title">Halaman Utama</span>
						                </a>
						            </li>
						            
                                    <!--Menu list item-->
						            <li class="<?php echo $this->uri->segment(2) == "lapangan" ? 'active-sub' : '' ?>">
						                <a href="<?php echo base_url('admin/lapangan') ?>">
						                    <i class="ti-agenda"></i>
						                    <span class="menu-title">Data Lapangan</span>
						                </a>
						            </li>



                                    <!--Menu list item-->
                                    <li class="list-header">Pengguna</li>

						            <li class="<?php echo $this->uri->segment(2) == "pengguna" ? 'active-sub' : '' ?>">
						                <a href="<?php echo base_url('admin/pengguna') ?>">
						                    <i class="ti-user"></i>
						                    <span class="menu-title">Akun Pengguna</span>
						                </a>
						            </li>
						            
                                    <li class="<?php echo $this->uri->segment(2) == "tim" ? 'active-sub' : '' ?>">
						                <a href="<?php echo base_url('admin/tim') ?>">
						                    <i class="fa fa-flag-o"></i>
						                    <span class="menu-title">Tim Futsal</span>
						                </a>
						            </li>


                                    <li class="<?php echo $this->uri->segment(2) == "setting" ? 'active-sub' : '' ?>">
						                <a href="<?php echo base_url('admin/setting') ?>">
						                    <i class="fa fa-gear"></i>
						                    <span class="menu-title">Pengaturan</span>
						                </a>
						            </li>
                                
                                </ul>


                            </div>
                        </div>
                    </div>
                    <!--================================-->
                    <!--End menu-->

                </div>
            </nav>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->

        </div>

        
        <?php

            
            $statusFooter = true;

            switch( $view ) {

                case "add":
                    $statusFooter = false;
                    break;

                case "update":
                    $statusFooter = false;
                    break;

            }


            if ( $uriSegment == "punishment" || $uriSegment == "email" || $uriSegment == "open-order" || $uriSegment == "close-order" ) $statusFooter = false;
            if ( $statusFooter ) { 
        ?>
        <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">

            <!-- Visible when footer positions are fixed -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="show-fixed pad-rgt pull-right">
                You have <a href="#" class="text-main"><span class="badge badge-danger">3</span> pending action.</a>
            </div>




            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <p class="pad-lft">&#0169; <?php echo date('Y') ?> | TA - Tanding Futsal Malang</p>



        </footer>
        <?php } ?>
        <!--===================================================-->
        <!-- END FOOTER -->


        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->


    
    
    
    <!--JAVASCRIPT-->
    <!--=================================================-->


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="<?php echo base_url() ?>assets/js/nifty.min.js"></script>

    
    <!--DataTables [ OPTIONAL ]-->
    <script src="<?php echo base_url() ?>assets/plugins/datatables/media/js/jquery.dataTables.js"></script>
	<script src="<?php echo base_url() ?>assets/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
	<script src="<?php echo base_url() ?>assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>


    <!--=================================================-->
    
    
    <script>

        // Data table
        // Basic Data Tables with responsive plugin
        // -----------------------------------------------------------------
        $('#active-datatable').dataTable( {
            "responsive": true,
            "language": {
                "paginate": {
                "previous": '<i class="demo-psi-arrow-left"></i>',
                "next": '<i class="demo-psi-arrow-right"></i>'
                }
            }
        } );

    </script>



    <?php if ( $this->session->flashdata('msg') == "greeting" ) { 
            
        $username = ucfirst( $this->session->flashdata('msg-name') );
    ?>
    <script>
    

        $(function() {

            var msg = '<div class="media-left"><span class="icon-wrap icon-wrap-xs icon-circle alert-icon"><i class="ti-face-smile icon-2x"></i></span></div><div class="media-body"><h4 class="alert-title">Hallo !</h4><p class="alert-message">Selamat datang <?php echo $username ?>.</p></div>';

            $.niftyNoty({
                type: 'info',
                container : 'floating',
                html : msg,
                closeBtn : true,
                timer : 6000,
                floating: {
                    position: 'top-right',
                    animationIn: 'jellyIn',
                    animationOut: 'fadeOutRight'
                },
            });
        });
    
    </script>

    <?php } ?>
    
    

</body>
</html>
