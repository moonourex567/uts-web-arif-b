<?php
include '../koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM produk WHERE id='$id'");

$d = mysqli_fetch_array($data);

if(isset($_POST['submit'])){

    $nama = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query($conn,
    "UPDATE produk SET

    nama_produk='$nama',
    kategori='$kategori',
    harga='$harga',
    deskripsi='$deskripsi'

    WHERE id='$id'
    ");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Produk</title>

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

input, textarea, select{
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

<h1>Edit Produk</h1>

<form method="POST">

<input type="text"
name="nama_produk"
value="<?= $d['nama_produk']; ?>">

<select name="kategori">

<option>
<?= $d['kategori']; ?>
</option>

<option>Obat</option>
<option>Makanan</option>

</select>

<input type="number"
name="harga"
value="<?= $d['harga']; ?>">

<textarea
name="deskripsi"><?= $d['deskripsi']; ?></textarea>

<button type="submit"
name="submit">
Update Produk
</button>

</form>

</div>

</body>
</html>