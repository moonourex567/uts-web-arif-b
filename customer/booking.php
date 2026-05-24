<?php
include '../koneksi.php';

if(isset($_POST['submit'])){

    $nama_customer = $_POST['nama_customer'];
    $nama_hewan = $_POST['nama_hewan'];
    $jenis_hewan = $_POST['jenis_hewan'];
    $keluhan = $_POST['keluhan'];
    $tanggal = $_POST['tanggal'];

    mysqli_query($conn,
    "INSERT INTO booking
    (nama_customer,nama_hewan,jenis_hewan,keluhan,tanggal)

    VALUES

    ('$nama_customer',
    '$nama_hewan',
    '$jenis_hewan',
    '$keluhan',
    '$tanggal')");

    echo "Booking berhasil";
}
?>

<h2>Booking Konsultasi Hewan</h2>

<form method="POST">

<input type="text"
name="nama_customer"
placeholder="Nama Customer">

<br><br>

<input type="text"
name="nama_hewan"
placeholder="Nama Hewan">

<br><br>

<input type="text"
name="jenis_hewan"
placeholder="Jenis Hewan">

<br><br>

<textarea
name="keluhan"
placeholder="Keluhan Hewan">
</textarea>

<br><br>

<input type="date"
name="tanggal">

<br><br>

<button type="submit"
name="submit">
Booking
</button>

</form>