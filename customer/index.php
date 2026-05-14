<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

if($_SESSION['role'] != 'customer'){
    header("Location: ../dashboard.php");
    exit;
}

$nama = $_SESSION['nama'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Klinik Hewan</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            background:
                linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)),
                url('https://images.unsplash.com/photo-1519052537078-e6302a4968d4?auto=format&fit=crop&w=1600&q=80');
            background-size:cover;
            background-position:center;
            min-height:100vh;
        }

        .navbar{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:15px 40px;
            background: rgba(255,145,77,0.9);
            color:white;
        }

        .navbar h1{
            font-size:28px;
        }

        .logout{
            text-decoration:none;
            background:#ff7b21;
            color:white;
            padding:10px 20px;
            border-radius:10px;
            font-weight:bold;
            font-size:14px;
        }

        .logout:hover{
            background:#ff5e00;
        }

        .container{
            width:85%;
            margin:30px auto;
        }

        .welcome-box{
            background: rgba(255,255,255,0.15);
            padding:35px;
            border-radius:20px;
            backdrop-filter: blur(8px);
            color:white;
            margin-bottom:35px;
        }

        .welcome-box h2{
            font-size:38px;
            color:#ffb366;
            margin-bottom:15px;
        }

        .welcome-box p{
            font-size:18px;
            line-height:1.6;
        }

        .cards{
            display:flex;
            gap:25px;
            flex-wrap:wrap;
            justify-content:center;
        }

        .card{
            width:320px;
            background: rgba(255,255,255,0.18);
            border-radius:20px;
            padding:25px;
            text-align:center;
            color:white;
            backdrop-filter: blur(8px);
            transition:0.3s;
        }

        .card:hover{
            transform:translateY(-8px);
        }

        .card h3{
            color:#ffb366;
            font-size:28px;
            margin-bottom:12px;
        }

        .card p{
            font-size:16px;
            margin-bottom:20px;
            line-height:1.5;
        }

        .btn{
            display:inline-block;
            padding:12px 22px;
            background:#ff914d;
            color:white;
            text-decoration:none;
            border-radius:10px;
            font-size:15px;
            font-weight:bold;
        }

        .btn:hover{
            background:#ff7b21;
        }

        footer{
            text-align:center;
            color:white;
            margin-top:40px;
            padding-bottom:20px;
            font-size:14px;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <h1>🐾 Customer Klinik Hewan</h1>
        <a href="../auth/logout.php" class="logout">Logout</a>
    </div>

    <div class="container">

        <div class="welcome-box">
            <h2>😺 Selamat Datang, <?php echo $nama; ?> 👋</h2>
            <p>
                Gunakan layanan klinik hewan untuk melihat produk kesehatan,
                makanan sehat, dan booking berobat dengan mudah.
            </p>
        </div>

        <div class="cards">

            <div class="card">
                <h3>🛒 Lihat Produk</h3>
                <p>Lihat berbagai obat dan makanan sehat terbaik untuk hewan peliharaanmu.</p>
                <a href="../produk/index.php" class="btn">Lihat Produk</a>
            </div>

            <div class="card">
                <h3>💉 Booking Klinik</h3>
                <p>Booking pemeriksaan dan pengobatan hewan langsung di klinik.</p>
                <a href="../hewan/index.php" class="btn">Booking Berobat</a>
            </div>

        </div>

        <footer>
            🐾 Klinik Hewan | Customer Dashboard
        </footer>

    </div>

</body>
</html>