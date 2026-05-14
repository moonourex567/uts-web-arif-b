<?php
session_start();
include '../koneksi.php';

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

if($_SESSION['role'] != 'customer'){
    header("Location: ../dashboard.php");
    exit;
}

if(!isset($_GET['id'])){
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

$produk = mysqli_query($conn,"SELECT * FROM produk WHERE id='$id'");
$data = mysqli_fetch_assoc($produk);

if(isset($_POST['order'])){

    $nama_customer = $_SESSION['nama'];
    $nama_produk = $data['nama_produk'];
    $kategori = $data['kategori'];
    $harga = $data['harga'];
    $jumlah = $_POST['jumlah'];
    $total = $harga * $jumlah;

    mysqli_query($conn,"INSERT INTO orders
    (nama_customer,nama_produk,kategori,harga,jumlah,total)
    VALUES
    ('$nama_customer','$nama_produk','$kategori','$harga','$jumlah','$total')");

    echo "<script>alert('Order berhasil!'); window.location='index.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Produk Hewan</title>

    <style>
        body{
            font-family:Arial;
            background:
                linear-gradient(rgba(0,40,80,0.55), rgba(0,40,80,0.55)),
                url('https://images.unsplash.com/photo-1548681528-6a5c45b66b42?auto=format&fit=crop&w=1600&q=80');
            background-size:cover;
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            color:white;
        }

        .box{
            width:450px;
            background:rgba(255,255,255,0.15);
            padding:30px;
            border-radius:20px;
            backdrop-filter:blur(8px);
        }

        h1{
            text-align:center;
            color:#7fd3ff;
            margin-bottom:20px;
        }

        p{
            margin-bottom:10px;
            font-size:18px;
        }

        input{
            width:100%;
            padding:12px;
            margin:15px 0;
            border:none;
            border-radius:10px;
        }

        button{
            width:100%;
            padding:12px;
            background:#3498db;
            border:none;
            color:white;
            border-radius:10px;
            font-size:16px;
            cursor:pointer;
        }

        button:hover{
            background:#217dbb;
        }

        .back{
            display:block;
            text-align:center;
            margin-top:15px;
            color:white;
            text-decoration:none;
        }
    </style>
</head>
<body>

<div class="box">

    <h1>🛒 Order Produk</h1>

    <p><strong>Produk:</strong> <?php echo $data['nama_produk']; ?></p>
    <p><strong>Kategori:</strong> <?php echo $data['kategori']; ?></p>
    <p><strong>Harga:</strong> Rp <?php echo number_format($data['harga'],0,',','.'); ?></p>

    <form method="POST">

        <input type="number" name="jumlah" placeholder="Jumlah Pesanan" min="1" required>

        <button type="submit" name="order">Pesan Sekarang</button>

    </form>

    <a href="index.php" class="back">⬅ Kembali</a>

</div>

</body>
</html>