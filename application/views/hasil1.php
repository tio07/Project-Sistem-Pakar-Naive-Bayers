<!DOCTYPE html>
<html>
<head>
	<title>Hasil Konsultasi</title>
</head>
<body>
<center>Hasil Konsultasi</center>
    <div class="row">
    	<?php 
        $key = $get->row();
        ?>
            <div class="col-md-6">
                <h6>Username : <?= $key->username; ?></h6>
                <h6>Nama Pasien : <?= $key->fullname; ?></h6>
                <h6>Jenis Kelamin : <?= $key->jk; ?></h6>
            </div>
            <div class="col-md-6">
                <h6 class="float-right">Tanggal Konsultasi : <?= $key->tgl_kon; ?></h6>
            </div>
        </div>
        <br>
        <br>
        <p>Berdasarkan hasil analisa menurut gejala yang dipilih, maka di dapatlah hasil sebagai berikut :</p>
        <p>
            Nama hama / penyakit adalah <b><?= $key->nm_penyakit; ?></b> <br>
            Keterangan penyakit : <br>
            <b> ... </b> <br><br>
            Dengan tingkat kepastian : <b><?= $key->hasil; ?> %</b>
        </p>
        <p><u>Solusi untuk penyakit adalah : </u></p>
        <p></p>
</body>
</html>