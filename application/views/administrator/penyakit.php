                <main class="app-layout-content">

                    <!-- Page Content -->
                    <div class="container-fluid p-y-md">
                        <!-- Dynamic Table Full -->
                        <div class="card">
                            <div class="card-header" style="width: 20%">
                                <a href="<?= base_url(); ?>penyakit/tambah" class="btn btn-primary btn-block" type="button" >Tambah Penyakit</a>
                            </div>
                            <div class="card-block">
                                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Kode Penyakit</th>
                                            <th class="hidden-xs">Nama Penyakit</th>
                                            <th class="text-center" style="width: 10%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=1;
                                            foreach ($data->result() as $penyakit) :
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td class="font-500"><?= $penyakit->id_penyakit; ?></td>
                                            <td class="hidden-xs"><?= $penyakit->nm_penyakit; ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?= base_url(); ?>penyakit/edit/<?= $penyakit->id_penyakit; ?>" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Penyakit"><i class="ion-edit"></i></a>
                                                    <a href="<?= base_url(); ?>penyakit/hapus/<?= $penyakit->id_penyakit;?>" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Hapus Penyakit" onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')"><i class="ion-close"></i></a>
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