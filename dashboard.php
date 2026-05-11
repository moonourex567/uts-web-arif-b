<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: auth/login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial;
        }

        body{
            background:#f5f5f5;
        }

        .navbar{
            background:#ff914d;
            padding:15px;
            display:flex;
            justify-content:space-between;
        }

        .navbar h2{
            color:white;
        }

        .navbar a{
            color:white;
            text-decoration:none;
            background:#ff7b21;
            padding:10px 15px;
            border-radius:8px;
        }

        .container{
            width:90%;
            margin:auto;
            margin-top:30px;
        }

        .card{
            background:white;
            padding:20px;
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
        }

    </style>

</head>
<body>

<div class="navbar">

    <h2>🐾 Dashboard Klinik Hewan</h2>

    <a href="auth/logout.php">
        Logout
    </a>

</div>

<div class="container">

    <div class="card">

        <h1>Selamat Datang</h1>
        <p>Sistem Pendataan Klinik Hewan</p>

    </div>

</div>

</body>
</html>