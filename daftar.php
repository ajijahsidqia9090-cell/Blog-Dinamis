<?php
include "koneksi.php";

if(isset($_POST['daftar'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    mysqli_query($conn, "
    INSERT INTO users (username, password, role)
    VALUES ('$username', '$password', 'user')
    ");

    echo "<script>alert('Daftar berhasil'); window.location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Daftar</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5" style="max-width:400px;">
<h3>Daftar</h3>

<form method="POST">

<input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
<input type="password" name="password" class="form-control mb-2" placeholder="Password" required>

<button class="btn btn-success w-100" name="daftar">Daftar</button>

</form>

</div>

</body>
</html>