                    <!-- Page header -->
                    <div class="page-header bg-app bg-inverse">
                        <div class="container">
                            <div class="p-y-lg text-center">
                                <h1 class="display-2">Konsultasi</h1>
                                <p class="text-muted">Silahkan Pilih Gejala Yang Terjadi Pada Tanaman Anda</p>
                            </div>
                        </div>
                    </div>
                    <!-- End page header -->

                    <div class="section bg-white">
                        <div class="container p-y-s b-b">

                            <div class="row">
                                <div class="col-md-8">
                                    <p style="text-align: justify;">Disini, anda dapat melakukan diagnosa mandiri untuk mengetahui apakah tanaman anda mengidap penyakit tertentu atau tidak. Anda hanya perlu menjawab setiap pertanyaan berkaitan dengan kondisi yang terjadi pada tanaman anda saat ini. Kemudian sistem akan melakukan prediksi berdasarkan jawaban anda.</p>
                                    
                                    <a href="<?=base_url();?>konsultasi/pertanyaan" class="btn btn-primary" type="submit" value="submit" name="submit">Mulai Periksa</a>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="m-t-0" style="font-weight: bold;">Biodata :</h4>
                                    <p>Nama : <?= ucwords($this->session->userdata('fullname'));?></p>
                                    <p>Alamat : <?= ucwords($this->session->userdata('alamat'));?></p>
                                    <p>Telp : <?= ucwords($this->session->userdata('telp'));?></p>
                                    <p>Email : <?= ucwords($this->session->userdata('email'));?></p>
                                </div>
                            </div>
                            <!-- .row -->
                        </div>
                        <!-- .container -->
                    </div>
                    <!-- .section -->