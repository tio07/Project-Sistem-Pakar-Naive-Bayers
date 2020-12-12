<script>
    window.print()
</script>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cetak Riwayat Konsultasi</title>
    <link rel="icon" href="<?= base_url();?>assets_user/img/favicon.png" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom styles for this template-->
    <link href="<?= base_url();?>assets_user/css/sb-admin.css" rel="stylesheet">
</head>

<body>


    <div class="container">
        <div id="wrapper">

            <div id="content-wrapper">

                <div class="container-fluid">

                    <div class="card mb-3">
                        <div class="card-body">
                            <center>
                                <h2>Hasil Konsultasi</h2>
                                <h3>Penyakit Pada Tanaman Kelapa Sawit</h3>
                            </center>
                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Nama Petani : <?= ucwords($this->session->userdata('fullname'));?></h6>
                                    <h6>Alamat : <?= ucwords($this->session->userdata('alamat'));?></h6>
                                    <h6>Jenis Kelamin : <?php if($this->session->userdata('jk') == 'L') {echo "Laki - laki"; } else { echo "Perempuan"; }?></h6>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="float-right">Tanggal Konsultasi : <?= date_indo($tgl_konsul);?></h6>
                                </div>
                            </div>
                            <br>
                            <br>
                            <p>Berdasarkan hasil analisa menurut gejala yang dipilih, maka di dapatlah hasil sebagai berikut :</p>
                            <p>
                                Nama penyakit adalah <b><?= $nm_penyakit ?></b> <br>
                                Keterangan penyakit : <br>
                                <b> <?= $ket_penyakit ?></b> <br><br>
                                Dengan tingkat kepastian : <b><?= $hasil ?> %</b>
                            </p>
                            <p><u>Solusi untuk penyakit adalah : </u></p>
                            <?= $solusi ;?>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>

</body>

</html>