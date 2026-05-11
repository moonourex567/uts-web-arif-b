<?php
session_start();
include '../koneksi.php';

if(isset($_POST['register'])){

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO users VALUES(
        NULL,
        '$nama',
        '$email',
        '$password'
    )");

    echo "
    <script>
        alert('Register berhasil!');
        window.location='login.php';
    </script>
    ";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Klinik Hewan</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial;
        }

        body{
            background:linear-gradient(to right, #ffb88c, #de6262);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .register-box{
            width:400px;
            background:white;
            padding:35px;
            border-radius:20px;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);
        }

        .title{
            text-align:center;
            margin-bottom:25px;
        }

        .title h1{
            color:#ff914d;
            margin-bottom:10px;
        }

        .title p{
            color:gray;
            font-size:14px;
        }

        .input-group{
            margin-bottom:20px;
        }

        .input-group label{
            display:block;
            margin-bottom:8px;
            color:#444;
        }

        .input-group input{
            width:100%;
            padding:12px;
            border:1px solid #ccc;
            border-radius:10px;
            outline:none;
            font-size:14px;
        }

        .input-group input:focus{
            border-color:#ff914d;
        }

        .btn-register{
            width:100%;
            padding:12px;
            border:none;
            background:#ff914d;
            color:white;
            border-radius:10px;
            cursor:pointer;
            font-size:16px;
            transition:0.3s;
        }

        .btn-register:hover{
            background:#ff7b21;
        }

        .login{
            text-align:center;
            margin-top:20px;
            font-size:14px;
        }

        .login a{
            color:#ff914d;
            text-decoration:none;
            font-weight:bold;
        }

    </style>

</head>
<body>

<div class="register-box">

    <div class="title">
        <h1>🐾 Register</h1>
        <p>Buat akun Klinik Hewan</p>
    </div>

    <form method="POST">

        <div class="input-group">
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Masukkan nama">
        </div>

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Masukkan email">
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password">
        </div>

        <button type="submit" name="register" class="btn-register">
            Register
        </button>

    </form>

    <div class="login">
        Sudah punya akun?
        <a href="login.php">Login</a>
    </div>

</div>

</body>
</html>