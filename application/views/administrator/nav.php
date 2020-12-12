<!-- Drawer -->
                <aside class="app-layout-drawer">

                    <!-- Drawer scroll area -->
                    <div class="app-layout-drawer-scroll">
                        <!-- Drawer logo -->
                        <div id="logo" class="drawer-header">
                            <a href="index.html"><img class="img-responsive" src="<?= base_url();?>assets/img/logo-admin.png" title="Naive Bayes Classifier" alt="Naive Bayes Classfier" /></a>
                        </div>

                        <!-- Drawer navigation -->
                        <nav class="drawer-main">
                            <ul class="nav nav-drawer">

                                <li class="nav-item active">
                                    <a href="<?=base_url();?>admin"><i class="ion-ios-speedometer-outline"></i> Dashboard</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="<?=base_url();?>penyakit"><i class="ion-ios-medkit-outline"></i> Penyakit</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?=base_url();?>gejala"><i class="ion-ios-search"></i> Gejala</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?=base_url();?>rule"><i class="ion-ios-paper-outline"></i> Rule</a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?=base_url();?>hasil"><i class="ion-ios-chatboxes-outline"></i> Konsultasi</a>
                                </li>

                                <li class="nav-item nav-item-has-subnav">
                                    <a href="javascript:void(0)"><i class="ion-ios-people-outline"></i> Users</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="<?=base_url();?>users/petani">Petani</a>
                                        </li>

                                        <li>
                                            <a href="<?=base_url();?>users/admin">Admin</a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <!-- End drawer navigation -->

                        <div class="drawer-footer">
                            <p class="copyright">Yunita Cahaya Khairani &copy; 2020</p>
                        </div>
                    </div>
                    <!-- End drawer scroll area -->
                </aside>
                <!-- End drawer -->