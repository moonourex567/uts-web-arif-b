<?php
include '../koneksi.php';

$data = mysqli_query($conn,
"SELECT * FROM produk ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Kelola Produk</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial;
}

body{

    background:
    linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
    url('https://images.unsplash.com/photo-1519052537078-e6302a4968d4');

    background-size:cover;
    background-position:center;
    min-height:100vh;
    padding:30px;
}

.top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
}

h1{
    color:#ffb36b;
}

.btn{
    background:#ff914d;
    color:white;
    padding:12px 20px;
    border-radius:10px;
    text-decoration:none;
}

.card-box{
    display:flex;
    flex-wrap:wrap;
    gap:20px;
}

.card{
    width:260px;
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(10px);
    padding:20px;
    border-radius:20px;
    color:white;
}

.card h2{
    color:#ffb36b;
    margin-bottom:10px;
}

.kategori{
    background:#ff914d;
    color:white;
    padding:5px 10px;
    border-radius:10px;
    display:inline-block;
    margin-bottom:10px;
}

.harga{
    margin:10px 0;
    font-size:20px;
}

.edit{
    background:#4CAF50;
    color:white;
    padding:8px 15px;
    border-radius:10px;
    text-decoration:none;
}

.hapus{
    background:red;
    color:white;
    padding:8px 15px;
    border-radius:10px;
    text-decoration:none;
}

.aksi{
    margin-top:15px;
}

.menu{
    margin-top:40px;
}

</style>

</head>
<body>

<div class="top">

<h1>🐾 Kelola Produk Hewan</h1>

<a href="tambah.php" class="btn">
+ Tambah Produk
</a>

</div>

<div class="card-box">

<?php while($d = mysqli_fetch_array($data)){ ?>

<div class="card">

<h2>
<?= $d['nama_produk']; ?>
</h2>

<div class="kategori">
<?= $d['kategori']; ?>
</div>

<div class="harga">
Rp <?= number_format($d['harga']); ?>
</div>

<p>
<?= $d['deskripsi']; ?>
</p>

<div class="aksi">

<a href="edit.php?id=<?= $d['id']; ?>"
class="edit">
Edit
</a>

<a href="hapus.php?id=<?= $d['id']; ?>"
class="hapus">
Hapus
</a>

</div>

</div>

<?php } ?>

</div>

<div class="menu">

<a href="order_admin.php" class="btn">
🛒 Lihat Order Customer
</a>

</div>

</body>
</html>