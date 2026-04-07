<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);
$captcha = $_POST['captcha'];

if($captcha != $_SESSION['captcha']){
    echo "<script>
    alert('captcha salah');
    window.location='index.php';
    </script>";
    exit;
}

$query = mysqli_query($conn,"SELECT * FROM users WHERE username ='$username' and password ='$password' ");

$cek = mysqli_num_rows($query);

if($cek > 0){

$data = mysqli_fetch_assoc($query);

$_SESSION['username'] = $data['username'];
$_SESSION['password'] = $data['password'];
$_SESSION['nama'] = $data['nama'];
$_SESSION['level'] = $data['level'];

    echo "<script>
    alert('login berhasil');
    window.location='index.php';
    </script>";

} else {
    echo "<script>
    alert('Username atau Password salah!');
    window.location='index.php';
    </script>";
}
?>