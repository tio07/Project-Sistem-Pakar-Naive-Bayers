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
                            <form method="POST" action="" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-block">
                                            <p>Silahkan Pilih Berdasarkan Gejala Yang Dialami :</p>
                                            <table class="table table-hover table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width: 50px;">No</th>
                                                        <th width="18%">Kode Gejala</th>
                                                        <th>Penyakit</th>
                                                        <th class="text-center" style="width: 139px;">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $i=1;
                                                        foreach ($data->result() as $rule) :
                                                    ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i++; ?></td>
                                                        <td><?= $rule->id_gejala; ?></td>
                                                        <td class="hidden-xs"><?= $rule->nm_gejala; ?></td>
                                                        <td class="text-center">
                                                            <div class="form-group">
                                                                <label class="radio-inline">
                                                                <input type="checkbox" name="gejala[]" value="<?= $rule->id_gejala; ?>" type="radio"/> Iya
                                                                </label>
                                                                <label class="radio-inline">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                            <button class="btn btn-primary" type="submit" value="submit" name="submit">Konsultasi</button>
                                        </div>
                                        <!-- .card-block -->
                                    </div>
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