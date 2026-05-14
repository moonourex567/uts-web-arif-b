<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Klinik Hewan</title>

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
            url('https://images.unsplash.com/photo-1517849845537-4d257902454a');

            background-size:cover;
            background-position:center;
            height:100vh;
            color:white;
        }

        .navbar{
            width:100%;
            background:rgba(255,255,255,0.1);
            backdrop-filter:blur(10px);
            padding:20px 50px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .navbar h2{
            color:#ffb36b;
        }

        .menu a{
            color:white;
            text-decoration:none;
            margin-left:20px;
            transition:0.3s;
        }

        .menu a:hover{
            color:#ffb36b;
        }

        .container{
            padding:50px;
        }

        .welcome{
            margin-bottom:30px;
        }

        .welcome h1{
            font-size:45px;
            margin-bottom:10px;
        }

        .card-wrapper{
            display:flex;
            gap:20px;
            flex-wrap:wrap;
        }

        .card{
            width:220px;
            background:rgba(255,255,255,0.1);
            backdrop-filter:blur(8px);
            padding:25px;
            border-radius:20px;
            box-shadow:0 5px 15px rgba(0,0,0,0.2);
            transition:0.3s;
        }

        .card:hover{
            transform:translateY(-5px);
        }

        .card h3{
            margin-bottom:10px;
            color:#ffb36b;
        }

        .card p{
            font-size:30px;
            font-weight:bold;
        }

        .btn{
            display:inline-block;
            margin-top:30px;
            background:#ff914d;
            color:white;
            padding:12px 25px;
            border-radius:10px;
            text-decoration:none;
            transition:0.3s;
        }

        .btn:hover{
            background:#ff7b21;
        }

    </style>

</head>
<body>

<div class="navbar">

    <h2>🐾 Klinik Hewan</h2>

    <div class="menu">
        <a href="dashboard.php">Dashboard</a>
        <a href="hewan/index.php">Data Hewan</a>
        <a href="auth/logout.php">Logout</a>
    </div>

</div>

<div class="container">

    <div class="welcome">
        <h1>Dashboard Klinik Hewan</h1>
        <p>
            Selamat datang,
            <?= $_SESSION['nama']; ?>
        </p>
    </div>

    <div class="card-wrapper">

        <div class="card">
            <h3>Total Hewan</h3>
            <p>12</p>
        </div>

        <div class="card">
            <h3>Total Dokter</h3>
            <p>4</p>
        </div>

        <div class="card">
            <h3>Pemeriksaan</h3>
            <p>20</p>
        </div>

        <div class="card">
            <h3>Pemilik</h3>
            <p>8</p>
        </div>

    </div>

    <a href="hewan/index.php" class="btn">
        Kelola Data Hewan
    </a>

</div>

</body>
</html>