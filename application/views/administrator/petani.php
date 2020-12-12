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
                                            <th class="hidden-xs">Alamat</th>
                                            <th class="hidden-xs">Telp / NoHp</th>
                                            <th class="hidden-xs" style="width: 10%;">Status</th>
                                            <th class="text-center" style="width: 11%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=1;
                                            foreach ($data->result() as $petani) :
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td class="font-500"><?= $petani->fullname; ?></td>
                                            <td class="hidden-xs"><?= $petani->alamat; ?></td>
                                            <td class="hidden-xs"><?= $petani->telp; ?></td>
                                            <td class="hidden-xs">
                                                <?php if($petani->status == 1){?>
                                                    <a href="<?= base_url();?>users/status/2/<?= $petani->id_petani;?>" class="btn btn-success">Aktif</a>
                                                <?php } else { ?>
                                                    <a href="<?= base_url();?>users/status/1/<?= $petani->id_petani;?>" class="btn btn-danger">Tidak Aktif</a>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?= base_url(); ?>users/hapus_petani/<?= $petani->id_petani;?>" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Hapus User Petani" onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')"><i class="ion-close"></i></a>
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