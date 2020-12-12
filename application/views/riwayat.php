                    <!-- Page header -->
                    <div class="page-header bg-app bg-inverse">
                        <div class="container">
                            <div class="p-y-lg text-center">
                                <h1 class="display-2">Riwayat Konsultasi</h1>
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
                                            <table class="table table-hover table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width: 5px;">No</th>
                                                        <th>Nama Penyakit</th>
                                                        <th width="20%">Hasil</th>
                                                        <th class="text-center" style="width: 10%;">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $i=1;
                                                        foreach ($get->result() as $key) :
                                                    ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i++; ?></td>
                                                        <td><?= $key->nm_penyakit; ?></td>
                                                        <td class="hidden-xs"><?= $key->hasil; ?> %</td>
                                                        <td class="hidden-xs">
                                                            <a href="<?= base_url(); ?>home/cetak/<?= $key->id_konsul; ?>" class="btn btn-primary" type="submit" value="submit" name="submit" data-toggle="tooltip" title="Cetak Hasil Konsultasi" style="color: #fff;" target="_blank">Cetak</a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                </tbody>
                                            </table>
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