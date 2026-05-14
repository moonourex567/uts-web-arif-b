<?php
include '../koneksi.php';

if(isset($_POST['submit'])){

    $nama = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query($conn,
    "INSERT INTO produk VALUES(
    NULL,
    '$nama',
    '$kategori',
    '$harga',
    '$deskripsi'
    )");

    echo "<script>alert('Produk berhasil ditambahkan');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Produk</title>

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
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

h1{
    color:#ff914d;
    margin-bottom:20px;
}

input, textarea, select{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:10px;
}

button{
    background:#ff914d;
    color:white;
    border:none;
    padding:12px 20px;
    border-radius:10px;
    cursor:pointer;
}

button:hover{
    background:#ff7b21;
}

</style>

</head>
<body>

<div class="box">

<h1>🐾 Tambah Produk</h1>

<form method="POST">

<input type="text"
name="nama_produk"
placeholder="Nama Produk"
required>

<select name="kategori">

<option value="">-- Pilih Kategori --</option>
<option>Obat</option>
<option>Makanan</option>

</select>

<input type="number"
name="harga"
placeholder="Harga"
required>

<textarea
name="deskripsi"
placeholder="Deskripsi Produk"
required>
</textarea>

<button type="submit"
name="submit">
Simpan Produk
</button>

</form>

</div>

</body>
</html>