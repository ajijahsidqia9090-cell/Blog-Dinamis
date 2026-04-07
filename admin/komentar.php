<?php
include "../koneksi.php";

$data = mysqli_query($conn, "
SELECT komentar.*, artikel.judul 
FROM komentar 
LEFT JOIN artikel ON komentar.id_artikel = artikel.id_artikel
ORDER BY id_komentar DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Komentar</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

<h3>💬 Data Komentar</h3>

<a href="dashboard.php" class="btn btn-secondary mb-3">← Dashboard</a>

<table class="table table-bordered table-striped">
<thead class="table-dark">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Artikel</th>
    <th>Komentar</th>
    <th>Tanggal</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
<?php $no=1; while($d = mysqli_fetch_assoc($data)){ ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $d['nama']; ?></td>
    <td><?= $d['judul']; ?></td>
    <td><?= $d['komentar']; ?></td>
    <td><?= $d['tanggal']; ?></td>
    <td>
        <a href="hapus_komentar.php?id=<?= $d['id_komentar']; ?>" 
           class="btn btn-danger btn-sm"
           onclick="return confirm('Yakin hapus komentar?')">
           Hapus
        </a>
    </td>
</tr>
<?php } ?>
</tbody>

</table>

</div>

</body>
</html>