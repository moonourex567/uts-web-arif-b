<?php
session_start();
include '../koneksi.php';

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

if($_SESSION['role'] != 'admin'){
    header("Location: ../customer/index.php");
    exit;
}

$data = mysqli_query($conn,

"SELECT booking.*, dokter.nama_dokter

FROM booking

LEFT JOIN dokter
ON booking.dokter_id = dokter.id

ORDER BY booking.id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Booking Hewan Customer</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:
    linear-gradient(rgba(0,40,80,0.55), rgba(0,40,80,0.55)),
    url('https://images.unsplash.com/photo-1511044568932-338cba0ad803?auto=format&fit=crop&w=1600&q=80');

    background-size:cover;
    background-position:center;
    min-height:100vh;
    color:white;
    padding:30px;
}

h1{
    text-align:center;
    margin-bottom:30px;
    color:#7fd3ff;
    font-size:45px;
}

.back{
    display:inline-block;
    margin-bottom:20px;
    padding:10px 20px;
    background:#3498db;
    color:white;
    text-decoration:none;
    border-radius:10px;
    font-weight:bold;
}

table{
    width:100%;
    border-collapse:collapse;
    background:rgba(255,255,255,0.12);
    backdrop-filter:blur(8px);
    border-radius:15px;
    overflow:hidden;
}

th, td{
    padding:15px;
    text-align:center;
}

th{
    background:rgba(52,152,219,0.8);
    color:white;
}

tr:nth-child(even){
    background:rgba(255,255,255,0.08);
}

tr:hover{
    background:rgba(255,255,255,0.15);
}

.assign{
    background:orange;
    color:white;
    padding:10px 15px;
    border-radius:10px;
    text-decoration:none;
    font-weight:bold;
}

.status{
    background:green;
    padding:8px 12px;
    border-radius:10px;
}

</style>

</head>
<body>

<a href="../dashboard.php" class="back">
⬅ Kembali ke Dashboard
</a>

<h1>
🐾 Booking Hewan Customer
</h1>

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

while($row = mysqli_fetch_assoc($data)){
?>

<tr>

<td><?= $no++ ?></td>

<td><?= $row['nama_customer'] ?></td>

<td><?= $row['nama_hewan'] ?></td>

<td><?= $row['jenis_hewan'] ?></td>

<td><?= $row['keluhan'] ?></td>

<td><?= $row['tanggal'] ?></td>

<td>
<?= $row['nama_dokter'] ?? '-' ?>
</td>

<td>
<span class="status">
<?= $row['status'] ?>
</span>
</td>

<td>

<a class="assign"
href="../produk/assign_dokter.php?id=<?= $row['id'] ?>">

Assign Dokter

</a>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>