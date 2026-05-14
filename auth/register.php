<?php
session_start();
include '../koneksi.php';

if(isset($_POST['register'])){

    $nama = mysqli_real_escape_string($conn,$_POST['nama']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Default role customer
    $role = "customer";

    // Cek email sudah ada atau belum
    $cek = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($cek) > 0){

        echo "<script>alert('Email sudah terdaftar!');</script>";

    } else {

        $insert = mysqli_query($conn,"INSERT INTO users (nama,email,password,role)
        VALUES ('$nama','$email','$password','$role')");

        if($insert){
            echo "<script>
                alert('Registrasi berhasil! Silakan login.');
                window.location='login.php';
            </script>";
        } else {
            echo "<script>alert('Registrasi gagal!');</script>";
        }
    }
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
            background:linear-gradient(to right,#ffb88c,#de6262);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .register-box{
            width:420px;
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
            margin-bottom:18px;
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
        <h1>🐾 Register Customer</h1>
        <p>Buat akun customer klinik hewan</p>
    </div>

    <form method="POST">

        <div class="input-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" required>
        </div>

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" required>
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