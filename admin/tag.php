<?php
include "koneksi.php";

$data = mysqli_query($conn, "SELECT * FROM tag ORDER BY id_tag DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Tag</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

<h3>🏷️ Data Tag</h3>

<div class="mb-3">
    <a href="tambah_tag.php" class="btn btn-primary">+ Tambah Tag</a>
    <a href="dashboard.php" class="btn btn-dark">⬅ Dashboard</a>
</div>

<table class="table table-bordered table-striped">
<thead class="table-dark">
<tr>
    <th>No</th>
    <th>Nama Tag</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
<?php $no=1; while($d = mysqli_fetch_array($data)){ ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $d['nama_tag']; ?></td>
    <td>
        <a href="edit_tag.php?id=<?= $d['id_tag']; ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="hapus_tag.php?id=<?= $d['id_tag']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
    </td>
</tr>
<?php } ?>
</tbody>

</table>

</div>

</body>
</html>