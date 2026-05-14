<?php
session_start();
include '../koneksi.php';

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Klinik Hewan</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            background:
                linear-gradient(rgba(0,40,80,0.55), rgba(0,40,80,0.55)),
                url('https://images.unsplash.com/photo-1548681528-6a5c45b66b42?auto=format&fit=crop&w=1600&q=80');
            background-size:cover;
            background-position:center;
            min-height:100vh;
            color:white;
        }

        .navbar{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:18px 40px;
            background: rgba(52,152,219,0.88);
        }

        .navbar h1{
            font-size:28px;
        }

        .back-btn{
            text-decoration:none;
            color:white;
            background:#217dbb;
            padding:10px 20px;
            border-radius:10px;
            font-weight:bold;
        }

        .container{
            width:90%;
            margin:30px auto;
        }

        .title-box{
            text-align:center;
            margin-bottom:35px;
        }

        .title-box h2{
            font-size:40px;
            color:#7fd3ff;
            margin-bottom:10px;
        }

        .title-box p{
            font-size:18px;
        }

        .produk-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
            gap:25px;
        }

        .card{
            background:rgba(255,255,255,0.12);
            padding:25px;
            border-radius:20px;
            backdrop-filter:blur(8px);
            box-shadow:0 8px 18px rgba(0,0,0,0.3);
            transition:0.3s;
        }

        .card:hover{
            transform:translateY(-8px);
        }

        .card h3{
            font-size:26px;
            color:#7fd3ff;
            margin-bottom:12px;
        }

        .kategori{
            font-size:15px;
            margin-bottom:10px;
            color:#d6f1ff;
        }

        .harga{
            font-size:22px;
            font-weight:bold;
            margin-bottom:12px;
        }

        .deskripsi{
            font-size:15px;
            line-height:1.6;
            margin-bottom:15px;
        }

        .btn-order{
            display:inline-block;
            padding:10px 20px;
            background:#3498db;
            color:white;
            text-decoration:none;
            border-radius:10px;
            font-weight:bold;
        }

        .btn-order:hover{
            background:#217dbb;
        }

        footer{
            text-align:center;
            margin-top:40px;
            padding-bottom:20px;
            font-size:14px;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <h1>🐾 Produk Klinik Hewan</h1>

        <?php if($_SESSION['role'] == 'admin'){ ?>
            <a href="admin.php" class="back-btn">Kembali Admin</a>
        <?php } else { ?>
            <a href="../customer/index.php" class="back-btn">Kembali Customer</a>
        <?php } ?>
    </div>

    <div class="container">

        <div class="title-box">
            <h2>🛒 Daftar Produk Hewan</h2>
            <p>Obat dan makanan sehat terbaik untuk hewan peliharaanmu.</p>
        </div>

        <div class="produk-grid">

            <?php while($row = mysqli_fetch_assoc($data)){ ?>

                <div class="card">

                    <h3><?php echo $row['nama_produk']; ?></h3>

                    <div class="kategori">
                        Kategori: <?php echo $row['kategori']; ?>
                    </div>

                    <div class="harga">
                        Rp <?php echo number_format($row['harga'],0,',','.'); ?>
                    </div>

                    <div class="deskripsi">
                        <?php echo $row['deskripsi']; ?>
                    </div>

                    <?php if($_SESSION['role'] == 'customer'){ ?>
                        <a href="order.php?id=<?php echo $row['id']; ?>" class="btn-order">
                            Order Sekarang
                        </a>
                    <?php } ?>

                </div>

            <?php } ?>

        </div>

        <footer>
            🐾 Klinik Hewan | Produk Customer
        </footer>

    </div>

</body>
</html>