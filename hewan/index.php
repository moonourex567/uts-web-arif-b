<?php
include '../koneksi.php';

$data = mysqli_query($conn,"SELECT * FROM hewan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Hewan</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="navbar">
    <a href="../dashboard.php">Dashboard</a>
    <a href="tambah.php">Tambah Hewan</a>
</div>

<div class="container">

<div class="card">

<h2>Data Hewan</h2>

<table>
    <tr>
        <th>No</th>
        <th>Nama Hewan</th>
        <th>Jenis</th>
        <th>Umur</th>
        <th>Warna</th>
        <th>Aksi</th>
    </tr>

<?php
$no = 1;

while($d = mysqli_fetch_array($data)){
?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $d['nama_hewan']; ?></td>
    <td><?= $d['jenis']; ?></td>
    <td><?= $d['umur']; ?></td>
    <td><?= $d['warna']; ?></td>
    <td>
        <a href="edit.php?id=<?= $d['id']; ?>">Edit</a>
        |
        <a href="hapus.php?id=<?= $d['id']; ?>">Hapus</a>
    </td>
</tr>

<?php } ?>

</table>

</div>
</div>

</body>
</html>