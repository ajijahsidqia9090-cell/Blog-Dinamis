<?php
include "koneksi.php";

// 🔒 validasi id
if(!isset($_GET['id'])){
    die("ID tidak ditemukan");
}

$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE id_user='$id'"));
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit User</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: #f1f5f9;
}
.card{
    border-radius:15px;
}
</style>

</head>

<body>

<div class="container mt-5 d-flex justify-content-center">

<div class="col-md-6">

<div class="card shadow p-4">

<h3 class="mb-4 text-center">✏️ Edit User</h3>

<form method="POST">

<input type="hidden" name="id" value="<?= $data['id_user']; ?>">

<!-- USERNAME -->
<div class="mb-3">
<label class="form-label">Username</label>
<input type="text" name="username" value="<?= $data['username']; ?>" class="form-control" required>
</div>

<!-- PASSWORD -->
<div class="mb-3">
<label class="form-label">Password</label>
<input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak diubah">
</div>

<!-- ROLE -->
<div class="mb-3">
<label class="form-label">Role</label>
<select name="role" class="form-select" required>
    <option value="admin" <?= $data['role']=='admin'?'selected':''; ?>>👑 Admin</option>
    <option value="author" <?= $data['role']=='author'?'selected':''; ?>>✍️ Author</option>
    <option value="pengguna" <?= $data['role']=='pengguna'?'selected':''; ?>>👤 Pengguna</option>
</select>
</div>

<!-- EMAIL -->
<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" value="<?= $data['email']; ?>" class="form-control" required>
</div>

<!-- BUTTON -->
<div class="d-flex justify-content-between">
    <a href="pengguna.php" class="btn btn-secondary">⬅ Kembali</a>
    <button type="submit" name="update" class="btn btn-primary">💾 Update</button>
</div>

</form>

</div>

</div>

</div>

</body>
</html>

<?php
// 🔄 PROSES UPDATE
if(isset($_POST['update'])){
    $id       = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role     = $_POST['role'];
    $email    = $_POST['email'];

    if(!empty($password)){
        // kalau password diisi → update + MD5
        $password = md5($password);

        $query = "UPDATE users SET 
            username='$username',
            password='$password',
            role='$role',
            email='$email'
            WHERE id_user='$id'
        ";
    } else {
        // kalau password kosong → password tidak diubah
        $query = "UPDATE users SET 
            username='$username',
            role='$role',
            email='$email'
            WHERE id_user='$id'
        ";
    }

    mysqli_query($conn, $query);

    echo "<script>
        alert('Data berhasil diupdate!');
        window.location='pengguna.php';
    </script>";
}
?>