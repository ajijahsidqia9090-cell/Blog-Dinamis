<?php
include "koneksi.php";

$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tag WHERE id_tag='$id'"));
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Tag</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

<h3>✏️ Edit Tag</h3>

<form method="POST">

<input type="hidden" name="id" value="<?= $data['id_tag']; ?>">

<div class="mb-3">
<label>Nama Tag</label>
<input type="text" name="nama_tag" value="<?= $data['nama_tag']; ?>" class="form-control" required>
</div>

<button type="submit" name="update" class="btn btn-primary">Update</button>
<a href="tag.php" class="btn btn-secondary">Kembali</a>

</form>

</div>

</body>
</html>

<?php
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama_tag'];

    mysqli_query($conn, "UPDATE tag SET 
        nama_tag='$nama'
        WHERE id_tag='$id'
    ");

    header("Location: tag.php");
}
?>