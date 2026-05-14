<?php
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM hewan WHERE id='$id'");

$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama_hewan'];
    $jenis = $_POST['jenis'];
    $umur = $_POST['umur'];
    $warna = $_POST['warna'];

    mysqli_query($conn,
    "UPDATE hewan SET
    nama_hewan='$nama',
    jenis='$jenis',
    umur='$umur',
    warna='$warna'
    WHERE id='$id'
    ");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Hewan</title>

    <style>

        body{
            font-family:Arial;
            background:#f5f5f5;
            padding:30px;
        }

        .box{
            width:500px;
            margin:auto;
            background:white;
            padding:30px;
            border-radius:20px;
        }

        input{
            width:100%;
            padding:12px;
            margin-bottom:15px;
        }

        button{
            background:#ff914d;
            color:white;
            border:none;
            padding:12px 20px;
            border-radius:10px;
        }

    </style>

</head>
<body>

<div class="box">

<h1>Edit Hewan</h1>

<form method="POST">

<input type="text"
name="nama_hewan"
value="<?= $d['nama_hewan']; ?>">

<input type="text"
name="jenis"
value="<?= $d['jenis']; ?>">

<input type="number"
name="umur"
value="<?= $d['umur']; ?>">

<input type="text"
name="warna"
value="<?= $d['warna']; ?>">

<button type="submit"
name="update">
Update
</button>

</form>

</div>

</body>
</html>