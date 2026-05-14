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

if(isset($_POST['booking'])){

    $nama_customer = $_SESSION['nama'];
    $nama_hewan = $_POST['nama_hewan'];
    $jenis_hewan = $_POST['jenis_hewan'];
    $keluhan = $_POST['keluhan'];
    $tanggal = $_POST['tanggal'];

    mysqli_query($conn,"INSERT INTO booking
    (nama_customer,nama_hewan,jenis_hewan,keluhan,tanggal)
    VALUES
    ('$nama_customer','$nama_hewan','$jenis_hewan','$keluhan','$tanggal')");

    echo "<script>alert('Booking berhasil!');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Klinik Hewan</title>

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
                url('https://images.unsplash.com/photo-1511044568932-338cba0ad803?auto=format&fit=crop&w=1600&q=80');
            background-size:cover;
            background-position:center;
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            color:white;
        }

        .form-box{
            width:480px;
            background:rgba(255,255,255,0.12);
            padding:35px;
            border-radius:22px;
            backdrop-filter:blur(10px);
            box-shadow:0 8px 20px rgba(0,0,0,0.35);
        }

        h1{
            text-align:center;
            margin-bottom:25px;
            color:#7fd3ff;
            font-size:34px;
        }

        p{
            text-align:center;
            margin-bottom:20px;
            font-size:15px;
            color:#d6f1ff;
        }

        input, textarea{
            width:100%;
            padding:14px;
            margin-bottom:16px;
            border:none;
            border-radius:12px;
            outline:none;
            font-size:15px;
        }

        textarea{
            resize:none;
            height:100px;
        }

        button{
            width:100%;
            padding:14px;
            background:#3498db;
            border:none;
            color:white;
            font-size:17px;
            border-radius:12px;
            cursor:pointer;
            font-weight:bold;
            transition:0.3s;
        }

        button:hover{
            background:#217dbb;
        }

        .back{
            display:block;
            text-align:center;
            margin-top:18px;
            color:#d6f1ff;
            text-decoration:none;
            font-size:15px;
        }

        .back:hover{
            color:white;
        }
    </style>
</head>
<body>

<div class="form-box">

    <h1>💉 Booking Klinik Hewan</h1>
    <p>Isi data hewan peliharaanmu untuk pemeriksaan dan pengobatan.</p>

    <form method="POST">

        <input type="text" name="nama_hewan" placeholder="Nama Hewan" required>

        <input type="text" name="jenis_hewan" placeholder="Jenis Hewan" required>

        <textarea name="keluhan" placeholder="Keluhan / Gejala" required></textarea>

        <input type="date" name="tanggal" required>

        <button type="submit" name="booking">Booking Sekarang</button>

    </form>

    <a href="../customer/index.php" class="back">⬅ Kembali ke Dashboard Customer</a>

</div>

</body>
</html>