                <main class="app-layout-content">

                    <!-- Page Content -->
                    <div class="container-fluid p-y-md">
                        <!-- Dynamic Table Full -->
                        <div class="card">
                            <div class="card-header" style="width: 20%">
                                <a href="<?= base_url(); ?>rule/tambah" class="btn btn-primary btn-block" type="button" >Tambah Rule</a>
                            </div>
                            <div class="card-block">
                                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="5%">No</th>
                                            <th width="30%">Penyakit</th>
                                            <th>Gejala</th>
                                            <th class="text-center" style="width: 11%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=1;
                                            foreach ($data->result() as $rule) :
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td class="font-500"><?= $rule->nm_penyakit; ?></td>
                                            <td class="font-500"><?= $rule->nm_gejala; ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?= base_url(); ?>rule/edit/<?= $rule->id_rule; ?>" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit rule"><i class="ion-edit"></i></a>
                                                    <a href="<?= base_url(); ?>rule/hapus/<?= $rule->id_rule;?>" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Hapus Rule" onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')"><i class="ion-close"></i></a>
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