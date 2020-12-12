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
                                                <label>Kode Gejala</label>
                                                <input class="form-control" type="text" name="id_gejala" value="<?= $id_gejala;?>" placeholder="Masukkan Kode Gejala..." />
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Gejala</label>
                                                <textarea class="ckeditor" name="nm_gejala" id="ckeditor"><?= $nm_gejala; ?></textarea>
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