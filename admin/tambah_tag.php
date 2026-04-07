<!DOCTYPE html>
<html>
<head>
<title>Tambah Tag</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

<h3>➕ Tambah Tag</h3>

<form method="POST" action="simpan_tag.php">

<div class="mb-3">
<label>Nama Tag</label>
<input type="text" name="nama_tag" class="form-control" required>
</div>

<button type="submit" class="btn btn-success">Simpan</button>
<a href="tag.php" class="btn btn-secondary">Kembali</a>

</form>

</div>

</body>
</html>