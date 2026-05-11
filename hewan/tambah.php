<?php
include '../koneksi.php';

if(isset($_POST['simpan'])){

    $nama = $_POST['nama_hewan'];
    $jenis = $_POST['jenis'];
    $umur = $_POST['umur'];
    $warna = $_POST['warna'];

    if(empty($nama)){
        echo "Nama hewan wajib diisi";
    }else{

        mysqli_query($conn,"INSERT INTO hewan VALUES(
            NULL,
            '$nama',
            '$jenis',
            '$umur',
            '$warna',
            NULL
        )");

        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Hewan</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="container">

<div class="card">

<h2>Tambah Hewan</h2>

<form method="POST">

<input type="text" name="nama_hewan" placeholder="Nama Hewan">
<br><br>

<input type="text" name="jenis" placeholder="Jenis">
<br><br>

<input type="number" name="umur" placeholder="Umur">
<br><br>

<input type="text" name="warna" placeholder="Warna">
<br><br>

<button type="submit" name="simpan" class="btn">
    Simpan
</button>

</form>

</div>
</div>

</body>
</html>