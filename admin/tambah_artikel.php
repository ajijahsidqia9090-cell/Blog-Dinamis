<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi.php";

// 🔥 AMBIL DATA KATEGORI
$kategori = mysqli_query($conn, "SELECT * FROM kategori");
if(!$kategori){
    die("Error kategori: " . mysqli_error($conn));
}

// 🔥 AMBIL DATA TAG
$tag = mysqli_query($conn, "SELECT * FROM tag");
if(!$tag){
    die("Error tag: " . mysqli_error($conn));
}

// 🔥 PROSES SIMPAN
if(isset($_POST['submit'])){

    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $id_kategori = $_POST['id_kategori'];

    // 🔥 WAJIB (karena ada di database)
    $id_user = 1; // nanti bisa diganti session

    // 🔥 UPLOAD GAMBAR
    $gambar = "";

    if(!empty($_FILES['gambar']['name'])){

        $nama_file = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];

        $ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png'];

        if(!in_array($ext, $allowed)){
            die("Format gambar harus JPG/JPEG/PNG");
        }

        // rename biar unik
        $gambar = time() . "." . $ext;

        // buat folder kalau belum ada
        if(!is_dir("upload")){
            mkdir("upload");
        }

        move_uploaded_file($tmp, "upload/".$gambar);
    }

    // 🔥 INSERT (SUDAH FIX)
    $simpan = mysqli_query($conn, "INSERT INTO artikel 
    (judul, isi, gambar, tanggal, id_user, id_kategori) 
    VALUES 
    ('$judul','$isi','$gambar',NOW(),'$id_user','$id_kategori')
    ");

    if(!$simpan){
        die("Error: " . mysqli_error($conn));
    }

    $id_artikel = mysqli_insert_id($conn);

    // 🔥 SIMPAN TAG
    if(isset($_POST['tag'])){
        foreach($_POST['tag'] as $id_tag){
            mysqli_query($conn, "INSERT INTO artikel_tag (id_artikel, id_tag)
            VALUES ('$id_artikel','$id_tag')");
        }
    }

    echo "<script>
        alert('Artikel berhasil ditambah!');
        window.location='artikel.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Artikel</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f8fafc;
}
.card {
    border-radius: 15px;
}
</style>

</head>

<body>

<div class="container mt-5">

<div class="card p-4 shadow">

<h3 class="mb-3">➕ Tambah Artikel</h3>

<form method="POST" enctype="multipart/form-data">

    <!-- JUDUL -->
    <input type="text" name="judul" class="form-control mb-3" placeholder="Judul Artikel" required>

    <!-- KATEGORI -->
    <select name="id_kategori" class="form-control mb-3" required>
        <option value="">-- Pilih Kategori --</option>
        <?php while($k = mysqli_fetch_assoc($kategori)) { ?>
            <option value="<?= $k['id_kategori']; ?>">
                <?= $k['nama_kategori']; ?>
            </option>
        <?php } ?>
    </select>

    <!-- TAG -->
    <label class="mb-1">Tag:</label><br>
    <?php while($t = mysqli_fetch_assoc($tag)) { ?>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tag[]" value="<?= $t['id_tag']; ?>">
            <label class="form-check-label"><?= $t['nama_tag']; ?></label>
        </div>
    <?php } ?>

    <!-- ISI -->
    <textarea name="isi" class="form-control mt-3" rows="5" placeholder="Isi artikel..." required></textarea>

    <!-- GAMBAR -->
    <input type="file" name="gambar" class="form-control mt-3">

    <!-- BUTTON -->
    <button type="submit" name="submit" class="btn btn-primary mt-3">💾 Simpan</button>
    <a href="artikel.php" class="btn btn-secondary mt-3">← Kembali</a>

</form>

</div>

</div>

</body>
</html>