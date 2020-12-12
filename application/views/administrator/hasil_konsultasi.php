                <main class="app-layout-content">

                    <!-- Page Content -->
                    <div class="container-fluid p-y-md">
                        <!-- Dynamic Table Full -->
                        <div class="card">
                            <div class="card-block">
                                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama Petani</th>
                                            <th class="hidden-xs" width="15%">Tanggal Konsultasi</th>
                                            <th class="hidden-xs">Penyakit Tanaman</th>
                                            <th class="hidden-xs">Hasil</th>
                                            <th class="text-center" style="width: 11%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=1;
                                            foreach ($data->result() as $hasil) :
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td class="font-500"><?= $hasil->fullname; ?></td>
                                            <td class="hidden-xs"><?= date_indo($hasil->tgl_konsul); ?></td>
                                            <td class="hidden-xs"><?= $hasil->nm_penyakit; ?></td>
                                            <td class="hidden-xs"><?= $hasil->hasil; ?> %</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?= base_url(); ?>hasil/cetak/<?= $hasil->id_konsul; ?>" class="btn btn-xs btn-default" target="_blank" type="button" data-toggle="tooltip" title="Cetak Hasil Konsultasi"><i class="ion-printer"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- .card-block -->
                        </div>
                        <!-- .card -->
                        <!-- End Dynamic Table Full -->

                    </div>
                    <!-- .container-fluid -->
                    <!-- End Page Content -->

                </main>