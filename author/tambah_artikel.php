<?php
session_start();
include "../admin/koneksi.php";

// 🔥 CEK LOGIN
if(!isset($_SESSION['id_user'])){
    die("Harus login dulu!");
}

// 🔥 AMBIL DATA
$kategori = mysqli_query($conn, "SELECT * FROM kategori");
$tag = mysqli_query($conn, "SELECT * FROM tag");

if(isset($_POST['submit'])){

    $judul = $_POST['judul'];
    $isi   = $_POST['isi'];
    $id_kategori = $_POST['id_kategori'];
    $id_user = $_SESSION['id_user'];

    // 🔥 UPLOAD GAMBAR
    $gambar = "";

    if(!empty($_FILES['gambar']['name'])){

        $nama = $_FILES['gambar']['name'];
        $tmp  = $_FILES['gambar']['tmp_name'];

        $ext = strtolower(pathinfo($nama, PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png'];

        if(!in_array($ext, $allowed)){
            die("Format harus JPG/JPEG/PNG");
        }

        $gambar = time().".".$ext;

        // upload ke folder admin
        move_uploaded_file($tmp, "../admin/upload/".$gambar);
    }

    // 🔥 SIMPAN ARTIKEL
    $simpan = mysqli_query($conn, "
    INSERT INTO artikel (judul, isi, gambar, tanggal, id_user, id_kategori)
    VALUES ('$judul','$isi','$gambar', NOW(), '$id_user', '$id_kategori')
    ");

    if(!$simpan){
        die("Error: " . mysqli_error($conn));
    }

    $id_artikel = mysqli_insert_id($conn);

    // 🔥 SIMPAN TAG
    if(isset($_POST['tag'])){
        foreach($_POST['tag'] as $id_tag){
            mysqli_query($conn, "
            INSERT INTO artikel_tag (id_artikel, id_tag)
            VALUES ('$id_artikel','$id_tag')
            ");
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
</head>

<body>

<div class="container mt-5">

<div class="card p-4 shadow">

<h3>✍️ Tambah Artikel (Author)</h3>

<form method="POST" enctype="multipart/form-data">

    <!-- JUDUL -->
    <input type="text" name="judul" class="form-control mb-3" placeholder="Judul" required>

    <!-- KATEGORI -->
    <select name="id_kategori" class="form-control mb-3" required>
        <option value="">Pilih Kategori</option>
        <?php while($k = mysqli_fetch_assoc($kategori)) { ?>
            <option value="<?= $k['id_kategori']; ?>">
                <?= $k['nama_kategori']; ?>
            </option>
        <?php } ?>
    </select>

    <!-- TAG -->
    <label>Tag:</label><br>
    <?php while($t = mysqli_fetch_assoc($tag)) { ?>
        <div class="form-check form-check-inline">
            <input type="checkbox" name="tag[]" value="<?= $t['id_tag']; ?>">
            <label><?= $t['nama_tag']; ?></label>
        </div>
    <?php } ?>

    <!-- ISI -->
    <textarea name="isi" class="form-control mt-3" rows="5" placeholder="Isi Artikel" required></textarea>

    <!-- GAMBAR -->
    <input type="file" name="gambar" class="form-control mt-3">

    <!-- BUTTON -->
    <button type="submit" name="submit" class="btn btn-success mt-3">Simpan</button>
    <a href="artikel.php" class="btn btn-secondary mt-3">Kembali</a>

</form>

</div>

</div>

</body>
</html>