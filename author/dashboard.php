<?php
session_start();
include "koneksi.php";

/* CEK LOGIN AUTHOR */
if(!isset($_SESSION['login']) || $_SESSION['role'] != 'author'){
    header("Location: index.php");
    exit;
}

$id_user = $_SESSION['id_user'];

/* TOTAL ARTIKEL MILIK AUTHOR */
$q_artikel = mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM artikel WHERE id_user='$id_user'");
$artikel = mysqli_fetch_assoc($q_artikel);

/* TOTAL KOMENTAR DI ARTIKEL AUTHOR */
$q_komentar = mysqli_query($conn, "
    SELECT COUNT(*) as jumlah 
    FROM komentar 
    JOIN artikel ON komentar.id_artikel = artikel.id_artikel
    WHERE artikel.id_user='$id_user'
");
$komentar = mysqli_fetch_assoc($q_komentar);

/* ARTIKEL TERBARU AUTHOR */
$data = mysqli_query($conn, "
    SELECT * FROM artikel 
    WHERE id_user='$id_user' 
    ORDER BY id_artikel DESC 
    LIMIT 3
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Author</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #dbeafe, #eff6ff);
}

.navbar {
    border-bottom: 2px solid #3b82f6;
}

.card {
    border-radius: 15px;
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-5px);
}

.img-fixed {
    height: 200px;
    object-fit: cover;
}

.btn {
    border-radius: 8px;
}
</style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4">
    
    <span class="fw-bold">✍️ Author Panel</span>

    <div class="ms-auto d-flex align-items-center">
        <a href="dashboard.php" class="btn btn-outline-primary btn-sm me-2">Dashboard</a>
        <a href="artikel.php" class="btn btn-outline-dark btn-sm me-3">Artikel</a>

        <span class="me-3">
            👤 <?= $_SESSION['username']; ?> (Author)
        </span>

        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>

</nav>

<!-- CONTENT -->
<div class="container mt-4">

    <h3 class="mb-4 fw-bold">Dashboard Author</h3>

    <!-- STATISTIK -->
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm p-3 text-center">
                <h6>Total Artikel</h6>
                <h2><?= $artikel['jumlah']; ?></h2>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card shadow-sm p-3 text-center">
                <h6>Total Komentar</h6>
                <h2><?= $komentar['jumlah']; ?></h2>
            </div>
        </div>
    </div>

    <!-- ARTIKEL TERBARU -->
    <div class="row">
        <?php while($row = mysqli_fetch_assoc($data)) { ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">

                <img src="../admin/upload/<?= $row['gambar']; ?>" class="card-img-top img-fixed">

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?= $row['judul']; ?></h5>
                    <small class="text-muted mb-2"><?= $row['tanggal']; ?></small>

                    <p class="card-text flex-grow-1">
                        <?= substr($row['isi'], 0, 80); ?>...
                    </p>
                </div>

            </div>
        </div>
        <?php } ?>
    </div>

</div>

<?php include "menu.php"; ?>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include "footer.php"; ?>

</body>
</html>