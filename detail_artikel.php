<?php
session_start();
include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM artikel WHERE id_artikel='$id'");
$a = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
<title>Detail Artikel</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

<h2><?= $a['judul']; ?></h2>
<p><?= $a['isi']; ?></p>

<hr>

<h4>Komentar</h4>

<!-- FORM KOMENTAR -->
<?php if(isset($_SESSION['login'])){ ?>
<form action="simpan_komentar.php" method="POST">
    <input type="hidden" name="id_artikel" value="<?= $id ?>">
    <textarea name="komentar" class="form-control" required></textarea><br>
    <button class="btn btn-primary">Kirim Komentar</button>
</form>
<?php } else { ?>
<p>
Silakan <a href="login.php">Login</a> atau 
<a href="daftar.php">Daftar</a> untuk komentar
</p>
<?php } ?>

<hr>

<!-- TAMPIL KOMENTAR -->
<?php
$k = mysqli_query($conn, "
SELECT * FROM komentar 
WHERE id_artikel='$id'
ORDER BY id_komentar DESC
");

while($kom = mysqli_fetch_assoc($k)){
?>
<div class="card mb-2">
    <div class="card-body">
        <b><?= $kom['nama']; ?></b><br>
        <?= $kom['komentar']; ?><br>
        <small class="text-muted"><?= $kom['tanggal']; ?></small>
    </div>
</div>
<?php } ?>

</div>

</body>
</html>