<?php

session_start();
include '../koneksi.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    $data = mysqli_fetch_assoc($query);

    if($data){

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