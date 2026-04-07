<?php
include "koneksi.php";

$data = mysqli_query($conn, "SELECT * FROM kategori ORDER BY id_kategori DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Kategori</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

<h3>📂 Data Kategori</h3>

<div class="mb-3">
    <a href="tambah_kategori.php" class="btn btn-primary">+ Tambah Kategori</a>
    <a href="dashboard.php" class="btn btn-dark">⬅ Dashboard</a>
</div>

<table class="table table-bordered table-striped">
<thead class="table-dark">
<tr>
    <th>No</th>
    <th>Nama Kategori</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
<?php $no=1; while($d = mysqli_fetch_array($data)){ ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $d['nama_kategori']; ?></td>
    <td>
        <a href="edit_kategori.php?id=<?= $d['id_kategori']; ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="hapus_kategori.php?id=<?= $d['id_kategori']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
    </td>
</tr>
<?php } ?>
</tbody>

</table>

</div>

</body>
</html>