<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);
$captcha = $_POST['captcha'];

if($captcha != $_SESSION['captcha']){
    echo "<script>
    alert('captcha salah');
    window.location='login.php';
    </script>";
    exit;
}

$query = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($query);

if($cek > 0){

    $data = mysqli_fetch_assoc($query);

    $_SESSION['login'] = true;
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['role'] = $data['role'];
    $_SESSION['id_user'] = $data['id_user'];

    header("Location: dashboard.php");
    exit;

} else {
    echo "<script>
    alert('Username atau Password salah!');
    window.location='login.php';
    </script>";
}
?>