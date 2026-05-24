<?php
include '../koneksi.php';

$data = mysqli_query($conn,
"SELECT * FROM orders ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>

<title>Data Order Customer</title>

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
    color:white;
}

h1{
    text-align:center;
    color:#ffb36b;
    margin-bottom:30px;
    font-size:50px;
}

.kembali{
    background:#3498db;
    color:white;
    padding:12px 20px;
    border-radius:10px;
    text-decoration:none;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:30px;
    overflow:hidden;
    border-radius:20px;
}

th{
    background:#ff914d;
    padding:15px;
    font-size:18px;
}

td{
    background:rgba(255,255,255,0.15);
    padding:15px;
    text-align:center;
    backdrop-filter:blur(10px);
}

</style>

</head>
<body>

<a href="admin.php" class="kembali">
⬅ Kembali
</a>

<h1>
🛒 Data Order Customer
</h1>

<table>

<tr>

<th>No</th>
<th>Nama Customer</th>
<th>Produk</th>
<th>Kategori</th>
<th>Harga</th>
<th>Jumlah</th>
<th>Total</th>

</tr>

<?php
$no = 1;

while($d = mysqli_fetch_assoc($data)){
?>

<tr>

<td><?= $no++ ?></td>

<td><?= $d['nama_customer'] ?></td>

<td><?= $d['nama_produk'] ?></td>

<td><?= $d['kategori'] ?></td>

<td>
Rp <?= number_format($d['harga']) ?>
</td>

<td><?= $d['jumlah'] ?></td>

<td>
Rp <?= number_format($d['total']) ?>
</td>

</tr>

<?php } ?>

</table>

</body>
</html>