                <main class="app-layout-content">

                    <!-- Page Content -->
                    <div class="container-fluid p-y-md">
                        <!-- Dynamic Table Full -->
                        <div class="card">
                            <div class="card-header" style="width: 20%">
                                <a href="<?= base_url(); ?>users/tambah_admin" class="btn btn-primary btn-block" type="button" >Tambah Admin</a>
                            </div>
                            <div class="card-block">
                                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th class="hidden-xs">Email</th>
                                            <th class="hidden-xs" style="width: 10%;">Status</th>
                                            <th class="text-center" style="width: 11%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=1;
                                            foreach ($data->result() as $admin) :
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td class="font-500"><?= $admin->username; ?></td>
                                            <td class="hidden-xs"><?= $admin->fullname; ?></td>
                                            <td class="hidden-xs"><?= $admin->email; ?></td>
                                            <td class="hidden-xs">
                                                <?php if($admin->level == 1){?>
                                                    <a href="<?= base_url();?>users/status_admin/2/<?= $admin->id_admin;?>" class="btn btn-success">Aktif</a>
                                                <?php } else { ?>
                                                    <a href="<?= base_url();?>users/status_admin/1/<?= $admin->id_admin;?>" class="btn btn-danger">Tidak Aktif</a>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?= base_url(); ?>users/hapus_admin/<?= $admin->id_admin;?>" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Hapus User Admin" onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')"><i class="ion-close"></i></a>
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