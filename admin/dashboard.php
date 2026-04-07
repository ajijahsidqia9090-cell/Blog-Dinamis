<?php

include "koneksi.php";

/* TOTAL DATA */
$q_artikel = mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM artikel");
$artikel = mysqli_fetch_assoc($q_artikel);

$q_user = mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM users");
$user = mysqli_fetch_assoc($q_user);

$q_kategori = mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM kategori");
$kategori = mysqli_fetch_assoc($q_kategori);

$menu = $_GET['menu'] ?? 'home';
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4">
    
    <a class="navbar-brand fw-bold" href="#">
        🚀 Admin Panel
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        
        <ul class="navbar-nav ms-auto align-items-center">

            <li class="nav-item">
                <a class="nav-link <?= $menu=='home'?'active':'' ?>" href="index.php">🏠 Dashboard</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?menu=artikel">📰 Artikel</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?menu=pengguna">👤 Pengguna</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    📂 Master Data
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?menu=kategori">📁 Kategori</a></li>
                    <li><a class="dropdown-item" href="?menu=tag">🏷️ Tag</a></li>
                    <li><a class="dropdown-item" href="?menu=komentar">💬 Komentar</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <span class="nav-link">
                    👋 <?= $_SESSION['username'] ?? 'User'; ?>
                </span>
            </li>

            <li class="nav-item">
                <a class="btn btn-danger ms-2" href="logout.php">Logout</a>
            </li>

        </ul>

    </div>
</nav>

<div class="container mt-4">

<?php if($menu == 'home'){ ?>

<!-- CARD TOTAL -->
<div class="row mb-4">

<div class="col-md-4">
    <div class="card text-center shadow">
        <div class="card-body">
            <h5>Total Artikel</h5>
            <h2><?= $artikel['jumlah']; ?></h2>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card text-center shadow">
        <div class="card-body">
            <h5>Total User</h5>
            <h2><?= $user['jumlah']; ?></h2>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card text-center shadow">
        <div class="card-body">
            <h5>Total Kategori</h5>
            <h2><?= $kategori['jumlah']; ?></h2>
        </div>
    </div>
</div>

</div>

<!-- CHART -->
<div class="card shadow">
    <div class="card-body">
        <h5 class="mb-3">📊 Statistik Data</h5>
        <canvas id="myChart"></canvas>
    </div>
</div>

<script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Artikel', 'User', 'Kategori'],
        datasets: [{
            label: 'Jumlah Data',
            data: [
                <?= $artikel['jumlah']; ?>,
                <?= $user['jumlah']; ?>,
                <?= $kategori['jumlah']; ?>
            ]
        }]
    }
});
</script>

<?php } else { ?>

<!-- MENU -->
<?php include "menu.php"; ?>

<?php } ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include "footer.php"; ?>

</body>
</html>