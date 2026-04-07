<?php
session_start();
include "koneksi.php";

$id = $_GET['id'];
$id_user = $_SESSION['id_user'];

$data = mysqli_query($conn, "
SELECT * FROM artikel 
WHERE id_artikel='$id' AND id_user='$id_user'
");

$d = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Artikel</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

<h3>Edit Artikel</h3>

<form action="update_artikel.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $d['id_artikel']; ?>">

    <input type="text" name="judul" class="form-control mb-3" 
           value="<?= $d['judul']; ?>" required>

    <textarea name="isi" class="form-control mb-3" rows="5" required><?= $d['isi']; ?></textarea>

    <!-- tampilkan gambar lama -->
    <img src="../admin/upload/<?= $d['gambar']; ?>" width="120" class="mb-3"><br>

    <input type="file" name="gambar" class="form-control mb-3">

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="artikel.php" class="btn btn-secondary">Kembali</a>

</form>

</div>

</body>
</html>