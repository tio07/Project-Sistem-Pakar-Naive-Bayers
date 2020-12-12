                <main class="app-layout-content">
                    <!-- Page Content -->
                    <div class="container-fluid p-y-md">
                        <!-- Bootstrap Style -->
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Normal Form -->
                                <div class="card">
                                    <div class="card-header">
                                        <h4><?= $header;?></h4>
                                    </div>
                                    <?= validation_errors('<p style="color:red">','</p>');?>
                                    <div class="card-block">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Fullname</label>
                                                <input class="form-control" type="text" name="fullname" placeholder="Masukkan Fullname Admin..." />
                                            </div>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input class="form-control" type="text" name="username" placeholder="Masukkan Username..." />
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control" type="password" name="password" placeholder="Masukkan Password..." />
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="text" name="email"placeholder="Masukkan Email..." />
                                            </div>
                                            <div class="form-group m-b-0">
                                                <button class="btn btn-primary" type="submit" name="submit" value="submit">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- End Normal Form -->
                            </div>
                        </div>
                    </div>
                    <!-- .container-fluid -->
                    <!-- End Page Content -->

                </main>