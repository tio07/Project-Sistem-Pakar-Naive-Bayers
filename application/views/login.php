                    <!-- Page header -->
                    <div class="page-header bg-green bg-inverse">
                        <div class="container">
                            <!-- Section Content -->
                            <div class="p-y-lg text-center">
                                <h1 class="display-2">Login</h1>
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
                                        <h3 class="card-header h4">Login</h3>
                                        <?php
                                          if($this->session->flashdata('alert')){
                                            echo '<div class="alert alert-warning alert-message">';
                                            echo $this->session->flashdata('alert');
                                            echo '</div>';
                                          }
                                        ?>
                                        <?php
                                          if($this->session->flashdata('success')){
                                            echo '<div class="alert alert-success alert-message">';
                                            echo $this->session->flashdata('success');
                                            echo '</div>';
                                          }
                                        ?>
                                        <div class="card-block">
                                            <form class="form-horizontal" method="post">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label class="sr-only">Username</label>
                                                        <input class="form-control" type="text" name="username" placeholder="Username" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label class="sr-only">Password</label>
                                                        <input class="form-control" type="password" name="password" placeholder="Password" />
                                                    </div>
                                                </div>

                                                <button class="btn btn-primary btn-block" type="submit" name="submit" value="submit">Login</button>
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
<script class="text/javascript">
    $('.alert-message').alert().delay(4000).slideUp('slow');
</script>