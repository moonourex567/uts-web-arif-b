<?php
include '../koneksi.php';

$data = mysqli_query($conn,

"SELECT booking.*, dokter.nama_dokter

FROM booking

LEFT JOIN dokter
ON booking.dokter_id = dokter.id");
?>

<!DOCTYPE html>
<html>
<head>

<title>Data Booking Customer</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial;
}

body{
    background-image:url('https://images.unsplash.com/photo-1517849845537-4d257902454a');
    background-size:cover;
    background-position:center;
    min-height:100vh;
    color:white;
}

.overlay{
    background:rgba(0,0,0,0.5);
    min-height:100vh;
    padding:40px;
}

.container{
    width:90%;
    margin:auto;
}

.kembali{
    background:#3498db;
    color:white;
    padding:14px 24px;
    border-radius:12px;
    text-decoration:none;
    font-weight:bold;
    display:inline-block;
    margin-bottom:30px;
}

.judul{
    text-align:center;
    margin-bottom:40px;
}

.judul h1{
    font-size:65px;
    color:#6ec6ff;
}

.card{
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(10px);
    border-radius:25px;
    padding:30px;
}

table{
    width:100%;
    border-collapse:collapse;
    overflow:hidden;
    border-radius:20px;
}

th{
    background:#3498db;
    padding:18px;
    font-size:20px;
}

td{
    background:rgba(255,255,255,0.15);
    padding:18px;
    text-align:center;
    font-size:18px;
}

.assign{
    background:orange;
    color:white;
    padding:10px 16px;
    border-radius:10px;
    text-decoration:none;
    font-weight:bold;
}

.status{
    background:green;
    padding:8px 14px;
    border-radius:10px;
}

</style>

</head>

<body>

<div class="overlay">

<div class="container">

<a href="admin.php" class="kembali">
⬅ Kembali ke Dashboard Admin
</a>

<div class="judul">

<h1>
📋 Data Booking Customer
</h1>

</div>

<div class="card">

<table>

<tr>

<th>No</th>
<th>Nama Customer</th>
<th>Nama Hewan</th>
<th>Jenis Hewan</th>
<th>Keluhan</th>
<th>Tanggal</th>
<th>Dokter</th>
<th>Status</th>
<th>Aksi</th>

</tr>

<?php
$no = 1;

while($d = mysqli_fetch_assoc($data)){
?>

<tr>

<td><?= $no++ ?></td>

<td><?= $d['nama_customer'] ?></td>

<td><?= $d['nama_hewan'] ?></td>

<td><?= $d['jenis_hewan'] ?></td>

<td><?= $d['keluhan'] ?></td>

<td><?= $d['tanggal'] ?></td>

<td>
<?= $d['nama_dokter'] ?? '-' ?>
</td>

<td>
<span class="status">
<?= $d['status'] ?>
</span>
</td>

<td>

<a class="assign"
href="assign_dokter.php?id=<?= $d['id'] ?>">

Assign Dokter

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</div>

</body>
</html>