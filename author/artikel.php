<?php
session_start();
include "koneksi.php";

/* CEK LOGIN AUTHOR */
if(!isset($_SESSION['login']) || $_SESSION['role'] != 'author'){
    header("Location: index.php");
    exit;
}

$id_user = $_SESSION['id_user'];

/* AMBIL ARTIKEL MILIK SENDIRI */
$data = mysqli_query($conn, "
    SELECT * FROM artikel 
    WHERE id_user='$id_user'
    ORDER BY id_artikel DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Artikel Saya</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f8fafc;
}

/* CARD */
.card {
    border-radius: 15px;
    overflow: hidden;
    transition: 0.3s;
}
.card:hover {
    transform: translateY(-5px);
}

/* GAMBAR */
.img-artikel {
    height: 200px;
    object-fit: cover;
}

/* BUTTON */
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
        <a href="artikel.php" class="btn btn-primary btn-sm me-3">Artikel</a>

        <span class="me-3">
            👤 <?= $_SESSION['username']; ?> (Author)
        </span>

        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>

</nav>

<div class="container mt-4">

    <!-- JUDUL -->
    <h3 class="mb-3">Artikel Saya</h3>

    <!-- TOMBOL -->
    <div class="d-flex gap-2 mb-4">
        <a href="tambah_artikel.php" class="btn btn-success">
            + Tambah Artikel
        </a>

        <a href="dashboard.php" class="btn btn-secondary">
            ← Kembali
        </a>
    </div>

    <!-- LIST ARTIKEL -->
    <div class="row g-4">

        <?php while($d = mysqli_fetch_assoc($data)){ ?>

        <div class="col-md-4">

            <div class="card shadow-sm h-100">

                <!-- GAMBAR (FIX PATH) -->
                <img src="../admin/upload/<?= $d['gambar']; ?>" 
                     class="img-artikel"
                     onerror="this.src='https://via.placeholder.com/300x200?text=No+Image'">

                <div class="card-body d-flex flex-column">

                    <h6 class="fw-bold"><?= $d['judul']; ?></h6>

                    <p class="text-muted small">
                        <?= date('d M Y', strtotime($d['tanggal'])); ?>
                    </p>

                    <p class="text-muted small">
                        <?= substr($d['isi'],0,80); ?>...
                    </p>

                    <!-- BUTTON -->
                    <div class="mt-auto">
                        <a href="edit_artikel.php?id=<?= $d['id_artikel']; ?>" 
                           class="btn btn-warning btn-sm">Edit</a>

                        <a href="hapus_artikel.php?id=<?= $d['id_artikel']; ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Hapus artikel ini?')">
                           Hapus
                        </a>
                    </div>

                </div>

            </div>

        </div>

        <?php } ?>

    </div>

</div>

</body>
</html>