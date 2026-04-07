<?php
include "koneksi.php";

$data = mysqli_query($conn, "SELECT * FROM users ORDER BY id_user DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Data User</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

<h3>👤 Data User</h3>

<a href="tambah_pengguna.php" class="btn btn-primary mb-3">+ Tambah User</a>
<a href="dashboard.php" class="btn btn-dark mb-3">⬅ Dashboard</a>

<table class="table table-bordered">
<tr class="table-dark">
    <th>No</th>
    <th>Username</th>
    <th>Password</th>
    <th>Role</th>
    <th>Email</th>
    <th>Aksi</th>
</tr>

<?php $no=1; while($d=mysqli_fetch_array($data)){ ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $d['username']; ?></td>
    <td><?= $d['password']; ?></td>
    <td><?= $d['role']; ?></td>
    <td><?= $d['email']; ?></td>
    <td>
        <a href="edit_pengguna.php?id=<?= $d['id_user']; ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="hapus_pengguna.php?id=<?= $d['id_user']; ?>" class="btn btn-danger btn-sm">Hapus</a>
    </td>
</tr>
<?php } ?>

</table>

</div>
</body>
</html>