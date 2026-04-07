<?php
session_start();
include "koneksi.php";

$data = mysqli_query($conn, "SELECT * FROM artikel ORDER BY id_artikel DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>My Blog</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.card img{
    height:200px;
    object-fit:cover;
}
.card:hover{
    transform: scale(1.02);
    transition:0.3s;
}
</style>

</head>

<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark">
<div class="container">
<a class="navbar-brand">My Blog</a>

<div>
<?php if(isset($_SESSION['login'])){ ?>
    <span class="text-white"><?= $_SESSION['username']; ?></span>
    <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
<?php } else { ?>
    <a href="login.php" class="btn btn-primary btn-sm">Login</a>
    <a href="daftar.php" class="btn btn-success btn-sm">Daftar</a>
<?php } ?>
</div>

</div>
</nav>

<!-- CONTENT -->
<div class="container mt-4">

<h3 class="mb-4">📰 Daftar Artikel</h3>

<div class="row">

<?php while($d = mysqli_fetch_assoc($data)){ ?>

<div class="col-md-4 mb-4">

<div class="card shadow-sm h-100">

<!-- GAMBAR -->
<img src="admin/upload/<?= $d['gambar']; ?>" 
     onerror="this.src='https://via.placeholder.com/300x200';">

<div class="card-body d-flex flex-column">

<h5 class="card-title"><?= $d['judul']; ?></h5>

<p class="text-muted small mb-3">
<?= substr($d['isi'],0,80); ?>...
</p>

<a href="detail_artikel.php?id=<?= $d['id_artikel']; ?>" 
   class="btn btn-primary mt-auto">
   Baca Artikel
</a>

</div>

</div>

</div>

<?php } ?>

</div>

</div>

</body>
</html>