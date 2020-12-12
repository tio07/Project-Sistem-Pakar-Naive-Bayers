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
                                                <label>Kode Penyakit</label>
                                                <input class="form-control" type="text" name="id_penyakit" value="<?= $id_penyakit;?>" placeholder="Masukkan Kode Penyakit..." />
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Penyakit</label>
                                                <input class="form-control" type="text" name="nm_penyakit" value="<?= $nm_penyakit;?>" placeholder="Masukkan Nama Penyakit..." />
                                            </div>
                                            <div class="form-group">
                                                <label>Keterangan Penyakit</label>
                                                <textarea class="ckeditor" name="ket_penyakit" id="ckeditor"><?= $ket_penyakit; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Solusi Penyakit</label>
                                                <textarea class="ckeditor" name="solusi" id="ckeditor"><?= $solusi; ?></textarea>
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