<?php
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']); // 🔥 pakai MD5
$email    = $_POST['email'];
$role     = $_POST['role'];

$query = mysqli_query($conn, "
    INSERT INTO users (username, password, role, email) 
    VALUES ('$username','$password','$role','$email')
");

if(!$query){
    die("Error: " . mysqli_error($conn));
}

header("Location: pengguna.php");
exit;
?>