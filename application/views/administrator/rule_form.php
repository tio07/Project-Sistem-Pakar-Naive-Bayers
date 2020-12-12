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
                                                <label>Penyakit</label>
                                                <select class="form-control" name="id_penyakit" size="1">
                                                    <option value="0">-- Pilih Penyakit --</option>
                                                    <?php
                                                        foreach ($penyakit->result() as $row) :

                                                        if($id_penyakit==$row->id_penyakit){
                                                            $select="selected";
                                                        } else{
                                                            $select="";
                                                        }
                                                    ?>

                                                    <option <?php echo $select ;?> value="<?php echo $row->id_penyakit;?>"><?php echo $row->id_penyakit;?> : <?php echo $row->nm_penyakit;?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Gejala</label>
                                                <select class="form-control" name="id_gejala" size="1">
                                                    <option value="0">-- Pilih Gejala --</option>
                                                    <?php
                                                        foreach ($gejala->result() as $row) :

                                                        if($id_gejala==$row->id_gejala){
                                                            $select="selected";
                                                        } else{
                                                            $select="";
                                                        }
                                                    ?>
                                                    <option <?php echo $select ;?> value="<?php echo $row->id_gejala;?>"><?php echo $row->id_gejala;?> : <?php echo $row->nm_gejala;?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Probabilitas</label>
                                                <input class="form-control" type="text" name="prob" value="0" placeholder="Masukkan Nama Penyakit..." />
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