<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include '../koneksi.php';

if(isset($_POST['login'])){

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = $_POST['password'];

    $cek = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($cek) > 0){

        $data = mysqli_fetch_assoc($cek);

        if(password_verify($password, $data['password'])){

            $_SESSION['login'] = true;
            $_SESSION['nama'] = $data['nama'];

            header("Location: ../dashboard.php");
            exit;

        }else{
            echo "<script>alert('Password salah');</script>";
        }

    }else{
        echo "<script>alert('Email tidak ditemukan');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Klinik Hewan</title>

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

        .login-box{
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
        }

        .btn-login{
            width:100%;
            padding:12px;
            border:none;
            background:#ff914d;
            color:white;
            border-radius:10px;
            cursor:pointer;
        }

        .register{
            text-align:center;
            margin-top:20px;
        }

    </style>

</head>
<body>

<div class="login-box">

    <div class="title">
        <h1>🐾 Klinik Hewan</h1>
        <p>Sistem Pendataan Klinik Hewan</p>
    </div>

    <form method="POST">

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit" name="login" class="btn-login">
            Login
        </button>

    </form>

    <div class="register">
        Belum punya akun?
        <a href="register.php">Register</a>
    </div>

</div>

</body>
</html>