<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Pengguna</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

/* Background soft blue */
body {
    background: linear-gradient(135deg, #dbeafe, #eff6ff);
    font-family: 'Segoe UI', sans-serif;
}

/* Card modern */
.card {
    border: none;
    border-radius: 20px;
}

/* Input style */
.form-control, .form-select {
    border-radius: 12px;
}

/* Tombol */
.btn {
    border-radius: 12px;
}

/* Judul */
.title-icon {
    font-size: 22px;
}

</style>

</head>

<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">

<div class="col-md-6">

<div class="card shadow p-4">

    <h3 class="mb-4 text-center">
        👤 <span class="title-icon">Tambah Pengguna</span>
    </h3>

    <form method="POST" action="simpan_pengguna.php">

        <!-- Username -->
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan username..." required>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password..." required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="contoh@gmail.com" required>
        </div>

        <!-- Role -->
        <div class="mb-4">
            <label class="form-label">Role</label>
            <select name="role" class="form-select" required>
                <option value="">-- Pilih Role --</option>
                <option value="admin">👑 Admin</option>
                <option value="author">✍️ Author</option>
                <option value="pengguna">👤 Pengguna</option>
            </select>
        </div>

        <!-- Tombol -->
        <div class="d-flex justify-content-between">
            <a href="pengguna.php" class="btn btn-secondary">⬅ Kembali</a>
            <button type="submit" class="btn btn-success">💾 Simpan</button>
        </div>

    </form>

</div>

</div>

</div>

</body>
</html>