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

$data = mysqli_query($conn,"SELECT * FROM booking ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Booking Customer</title>

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
            color:white;
            padding:30px;
        }

        h1{
            text-align:center;
            margin-bottom:30px;
            color:#7fd3ff;
            font-size:38px;
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
    </style>
</head>
<body>

<a href="../dashboard.php" class="back">⬅ Kembali ke Dashboard Admin</a>

<h1>📋 Data Booking Customer</h1>

<table border="1">

    <tr>
        <th>No</th>
        <th>Nama Customer</th>
        <th>Nama Hewan</th>
        <th>Jenis Hewan</th>
        <th>Keluhan</th>
        <th>Tanggal Booking</th>
    </tr>

    <?php
    $no = 1;
    while($row = mysqli_fetch_assoc($data)){
    ?>

    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['nama_customer']; ?></td>
        <td><?php echo $row['nama_hewan']; ?></td>
        <td><?php echo $row['jenis_hewan']; ?></td>
        <td><?php echo $row['keluhan']; ?></td>
        <td><?php echo $row['tanggal']; ?></td>
    </tr>

    <?php } ?>

</table>

</body>
</html>