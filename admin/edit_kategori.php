<?php
include "koneksi.php";

$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori='$id'"));
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Kategori</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

<h3>✏️ Edit Kategori</h3>

<form method="POST">

<input type="hidden" name="id" value="<?= $data['id_kategori']; ?>">

<div class="mb-3">
<label>Nama Kategori</label>
<input type="text" name="nama_kategori" value="<?= $data['nama_kategori']; ?>" class="form-control" required>
</div>

<button type="submit" name="update" class="btn btn-primary">Update</button>
<a href="kategori.php" class="btn btn-secondary">Kembali</a>

</form>

</div>

</body>
</html>

<?php
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama_kategori'];

    mysqli_query($conn, "UPDATE kategori SET 
        nama_kategori='$nama'
        WHERE id_kategori='$id'
    ");

    header("Location: kategori.php");
}
?>