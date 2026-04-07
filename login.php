<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5" style="max-width:400px;">
<h3>Login</h3>

<form action="login.php" method="POST">

<input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
<input type="password" name="password" class="form-control mb-2" placeholder="Password" required>

<button class="btn btn-primary w-100">Login</button>

</form>

</div>

</body>
</html>

<?php
session_start();
include "koneksi.php";

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $q = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    $data = mysqli_fetch_assoc($q);

    if($data){
        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['username'];

        header("Location: index.php");
    } else {
        echo "<script>alert('Login gagal');</script>";
    }
}
?>