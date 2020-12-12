                    <!-- Page header -->
                    <div class="page-header bg-app bg-inverse">
                        <div class="container">
                            <div class="p-y-lg text-center">
                                <h1 class="display-2">Konsultasi</h1>
                                <p class="text-muted">Disini, anda dapat melakukan diagnosa mandiri untuk mengetahui apakah tanaman anda mengidap penyakit tertentu atau tidak. Anda hanya perlu menjawab setiap pertanyaan berkaitan dengan kondisi yang terjadi pada tanaman anda saat ini. Kemudian sistem akan melakukan prediksi berdasarkan jawaban anda.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End page header -->

                    <div class="section bg-white">
                        <div class="container p-y-s b-b">
                            <form method="POST" action="<?=base_url();?>konsultasi/proses" target="_blank" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-8">
                                    <p style="text-align: justify;">Berdasarkan hasil analisa menurut gejala yang dipilih, maka di dapatlah hasil sebagai berikut :</p>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input class="form-control" type="hidden" name="id_petani" value="<?= ucwords($this->session->userdata('user_id'));?>" placeholder="Id Petani" />
                                            <input class="form-control" type="hidden" name="tgl_konsul" value="<?= date('Y-m-d') ?>"/>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-block">
                                            <table class="table table-hover table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width: 5px;">No</th>
                                                        <th>Penyakit</th>
                                                        <th>Kemungkinan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td>Penyakit Busuk Pangkal Batang</td>
                                                        <td><?= $x1; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">2</td>
                                                        <td>Penyakit Busuk Tandan</td>
                                                        <td><?= $x2; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">3</td>
                                                        <td>Penyakit Akar Blast Disease</td>
                                                        <td><?= $x3; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">4</td>
                                                        <td>Penyakit Batang Dry Basal Rot</td>
                                                        <td><?= $x4; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">5</td>
                                                        <td>Penyakit Busuk Pupus</td>
                                                        <td><?= $x5; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- .card-block -->
                                    </div>
                                    <p>Kesimpulan</p>
                                    <p>Berdasarkan hasil analisa menurut gejala yang dipilih, maka di dapatlah hasil sebagai berikut :</p>
                                    <p>Nama penyakit adalah <b><?= $nm_penyakit;?></b></p>
                                    Keterangan penyakit : <br>
                                    <b> <?= $ket_penyakit ?></b>
                                     <p>Dengan tingkat keparahan untuk penyakit <?= $nm_penyakit;?> adalah <?= $hasil;?> %</p>
                                     <p>Solusi untuk penyakit adalah :</p>
                                     <?= $solusi ;?>
                                     <input class="form-control" type="hidden" name="id_penyakit" value="<?= $id_penyakit;?>"/>
                                     <input class="form-control" type="hidden" name="hasil" value="<?= $hasil;?>"/>
                                    <button class="btn btn-primary" type="submit" value="submit" name="submit">Simpan & Cetak Hasil Konsultasi</button>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="m-t-0" style="font-weight: bold;">Biodata :</h4>
                                    <p>Nama : <?= ucwords($this->session->userdata('fullname'));?></p>
                                    <p>Alamat : <?= ucwords($this->session->userdata('alamat'));?></p>
                                    <p>Telp : <?= ucwords($this->session->userdata('telp'));?></p>
                                    <p>Email : <?= ucwords($this->session->userdata('email'));?></p>
                                </div>
                            </div>
                            </form>
                            <!-- .row -->
                        </div>
                        <!-- .container -->
                    </div>
                    <!-- .section -->