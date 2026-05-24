<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: auth/login.php");
    exit;
}

if($_SESSION['role'] != 'admin'){
    header("Location: customer/index.php");
    exit;
}

$nama = $_SESSION['nama'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Dashboard</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{

    background:
    linear-gradient(rgba(8,15,35,0.82), rgba(8,15,35,0.82)),
    url('https://images.unsplash.com/photo-1511044568932-338cba0ad803?auto=format&fit=crop&w=1600&q=80');

    background-size:cover;
    background-position:center;
    min-height:100vh;
    color:white;
}

/* NAVBAR */

.navbar{

    width:100%;
    padding:22px 70px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(12px);
    border-bottom:1px solid rgba(255,255,255,0.08);
}

.logo{
    font-size:28px;
    font-weight:700;
    color:#ffffff;
}

.logo span{
    color:#4db8ff;
}

.logout{

    text-decoration:none;
    color:white;
    background:#ff6b35;
    padding:12px 24px;
    border-radius:12px;
    font-weight:600;
    transition:0.3s;
}

.logout:hover{
    background:#ff4d0d;
}

/* CONTAINER */

.container{
    width:90%;
    max-width:1300px;
    margin:auto;
    padding-top:60px;
}

/* HERO */

.hero{

    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(14px);
    border:1px solid rgba(255,255,255,0.08);
    border-radius:30px;
    padding:60px;
    margin-bottom:50px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
}

.hero h1{

    font-size:55px;
    margin-bottom:20px;
    line-height:1.2;
}

.hero h1 span{
    color:#5ec7ff;
}

.hero p{

    font-size:18px;
    color:#d9e4f0;
    line-height:1.8;
    max-width:850px;
}

/* CARD AREA */

.cards{

    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
    gap:30px;
}

.card{

    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(12px);
    border-radius:28px;
    padding:35px;
    border:1px solid rgba(255,255,255,0.08);
    transition:0.3s;
    box-shadow:0 10px 25px rgba(0,0,0,0.25);
}

.card:hover{
    transform:translateY(-8px);
}

.icon{

    width:75px;
    height:75px;
    border-radius:20px;
    background:rgba(77,184,255,0.15);
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:35px;
    margin-bottom:25px;
}

.card h2{

    font-size:30px;
    margin-bottom:15px;
}

.card p{

    color:#dce5f1;
    line-height:1.8;
    margin-bottom:30px;
    font-size:15px;
}

/* BUTTON */

.btn{

    display:inline-block;
    text-decoration:none;
    background:#4db8ff;
    color:white;
    padding:14px 24px;
    border-radius:14px;
    font-weight:600;
    transition:0.3s;
}

.btn:hover{
    background:#239be6;
}

/* FOOTER */

footer{

    text-align:center;
    margin-top:70px;
    padding-bottom:30px;
    color:#c8d4e3;
    font-size:14px;
}

</style>

</head>

<body>

<div class="navbar">

<div class="logo">
🐾 Vet<span>Care</span> Admin
</div>

<a href="auth/logout.php" class="logout">
Logout
</a>

</div>

<div class="container">

<div class="hero">

<h1>
Selamat Datang,
<span><?php echo $nama; ?></span> 👋
</h1>

<p>
Kelola seluruh sistem klinik hewan mulai dari data booking customer,
assign dokter, hingga pengelolaan produk makanan dan obat hewan
melalui dashboard admin yang modern dan terintegrasi.
</p>

</div>

<div class="cards">

<div class="card">

<div class="icon">
🛒
</div>

<h2>Kelola Produk</h2>

<p>
Tambah produk makanan, vitamin, obat hewan,
edit stok produk, dan pantau data order customer.
</p>

<a href="produk/admin.php" class="btn">
Masuk Menu Produk
</a>

</div>

<div class="card">

<div class="icon">
📋
</div>

<h2>Booking Customer</h2>

<p>
Lihat seluruh booking customer,
assign dokter hewan, serta pantau status pemeriksaan hewan.
</p>

<a href="hewan/admin.php" class="btn">
Lihat Booking
</a>

</div>

<div class="card">

<div class="icon">
🩺
</div>

<h2>Data Dokter</h2>

<p>
Kelola dokter hewan berdasarkan spesialisasi
untuk kucing, anjing, burung, dan hewan lainnya.
</p>

<a href="hewan/admin.php" class="btn">
Kelola Dokter
</a>

</div>

</div>

<footer>

🐾 VetCare Clinic Management System

</footer>

</div>

</body>
</html>