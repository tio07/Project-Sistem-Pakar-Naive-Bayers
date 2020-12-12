                    <!-- Page header -->
                    <div class="page-header bg-green bg-inverse">
                        <div class="container">
                            <!-- Section Content -->
                            <div class="p-y-lg text-center">
                                <h1 class="display-2">Daftar</h1>
                            </div>
                            <!-- End Section Content -->
                        </div>
                    </div>
                    <!-- End Page header -->

                    <!-- Page content -->
                    <div class="page-content">
                        <div class="container">
                            <div class="row">
                                <!-- Sign up -->
                                <div class="col-md-4">
                                    <div class="card">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <h3 class="card-header h4">Registrasi</h3>
                                        <div class="card-block">
                                            <?= validation_errors('<p style="color:red">', '</p>'); ?>
                                            <form class="form-horizontal" method="post">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label class="sr-only">Nama Lengkap</label>
                                                        <input class="form-control" type="text" name="fullname" placeholder="Nama Lengkap" />
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label class="sr-only" for="frontend_signup_username">Username</label>
                                                        <input class="form-control" type="text" name="username" placeholder="Username" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label class="sr-only">Email</label>
                                                        <input class="form-control" type="email" name="email" placeholder="Email" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label class="sr-only" >Password</label>
                                                        <input class="form-control" type="password" name="pass1" id="password" placeholder="Password" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label class="sr-only" >Ketik Ulang Password</label>
                                                        <input class="form-control" type="password" name="pass2" id="password" placeholder="Ketik Ulang Password" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label class="radio-inline">
                                                        <input type="radio" name="jk" value="L" type="radio" id="lk" /> Laki-laki
                                                        </label>
                                                        <label class="radio-inline">
                                                        <input type="radio" name="jk" value="P" type="radio" id="pr" /> Perempuan
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label class="sr-only">No Handphone</label>
                                                        <input class="form-control" type="text" name="telp" placeholder="No Handphone" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label class="sr-only">Alamat</label>
                                                        <input class="form-control" name="alamat" type="text" placeholder="Alamat" />
                                                    </div>
                                                </div>

                                                <a class="btn btn-danger" type="submit">Kembali</a>
                                                <button class="btn btn-primary" type="submit" value="submit" name="submit">Daftar</button>
                                            </form>
                                        </div>
                                        <!-- .card-block -->
                                    </div>
                                    <!-- .card -->
                                </div>
                                <!-- .col-md-6 -->
                                <!-- End sign up -->

                            </div>
                            <!-- .row -->
                        </div>
                        <!-- .container -->
                    </div>
                    <!-- End page content -->