<!DOCTYPE html>

<html class="app-ui">

    <head>
        <!-- Meta -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

        <!-- Document title -->
        <title>Sistem Pakar Naive Bayes</title>

        <meta name="description" content="AppUI - Frontend Template & UI Framework" />
        <meta name="robots" content="noindex, nofollow" />

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="<?= base_url();?>assets_user/img/favicon.png" />
        <link rel="icon" href="<?= base_url();?>assets_user/img/favicon.png" />

        <!-- Google fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,900%7CRoboto+Slab:300,400%7CRoboto+Mono:400" />

        <!-- AppUI CSS stylesheets -->
        <link rel="stylesheet" id="css-font-awesome" href="<?= base_url();?>assets_user/css/font-awesome.css" />
        <link rel="stylesheet" id="css-ionicons" href="<?= base_url();?>assets_user/css/ionicons.css" />
        <link rel="stylesheet" id="css-bootstrap" href="<?= base_url();?>assets_user/css/bootstrap.css" />
        <link rel="stylesheet" id="css-app" href="<?= base_url();?>assets_user/css/app.css" />
        <link rel="stylesheet" id="css-app-custom" href="<?= base_url();?>assets_user/css/app-custom.css" />
        <!-- End Stylesheets -->
    </head>

    <body class="app-ui">
        <div class="app-layout-canvas">
            <div class="app-layout-container">

                <!-- Header -->
                <header class="app-layout-header">
                    <nav class="navbar navbar-default p-y">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar-collapse" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
                                <!-- Header logo -->
                                <a class="navbar-brand" href="javascript:void(0)">
                                    <img class="img-responsive" src="<?= base_url();?>assets_user/img/logo-frontend.png" title="AppUI" alt="AppUI" />
                                </a>
                            </div>

                            <div class="collapse navbar-collapse" id="header-navbar-collapse">
                                <!-- Header navigation menu -->
                                <ul id="main-menu" class="nav navbar-nav navbar-left">

                                    <li class="active">
                                        <a href="<?=base_url();?>">Home</a>
                                    </li>

                                    <li>
                                        <a href="<?=base_url();?>home/penyakit">Penyakit Tanaman Sawit</a>
                                    </li>

                                    <li>
                                        <a href="<?=base_url();?>home/panduan">Panduan</a>
                                    </li>

                                    <?php if($this->session->userdata('user_login')){?>
                                    
                                    <li>
                                        <a href="<?=base_url();?>konsultasi">Konsultasi</a>
                                    </li>

                                    <li>
                                        <a href="<?=base_url();?>home/riwayat">Riwayat Konsultasi</a>
                                    </li>

                                    <li>
                                        <a href="<?= base_url('home/logout');?>">Logout</a>
                                    </li>

                                    <?php }else{ ?>

                                    <li>
                                        <a href="<?= base_url('home/register');?>">Daftar</a>
                                    </li>

                                    <li>
                                        <a href="<?= base_url('home/login');?>">Login</a>
                                    </li>

                                    <?php } ?>
                                </ul>
                                <!-- End header navigation menu -->
                            </div>
                        </div>
                        <!-- .container -->
                    </nav>
                    <!-- .navbar -->
                </header>
                <!-- End header -->

                <main class="app-layout-content">

                    <?= $content;?>

                </main>

                <footer class="app-layout-footer">
                    <div class="container p-y-md">
                        <div class="pull-left text-center text-md-left">
                            Yunita Cahaya Khairani &copy; <span class="js-year-copy"></span>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- .app-layout-container -->
        </div>
        <!-- .app-layout-canvas -->

        <!-- AppUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock and App.js -->
        <script src="<?= base_url();?>assets_user/js/core/jquery.min.js"></script>
        <script src="<?= base_url();?>assets_user/js/core/bootstrap.min.js"></script>
        <script src="<?= base_url();?>assets_user/js/core/jquery.slimscroll.min.js"></script>
        <script src="<?= base_url();?>assets_user/js/core/jquery.scrollLock.min.js"></script>
        <script src="<?= base_url();?>assets_user/js/core/jquery.placeholder.min.js"></script>
        <script src="<?= base_url();?>assets_user/js/app.js"></script>
        <script src="<?= base_url();?>assets_user/js/app-custom.js"></script>

    </body>

</html>