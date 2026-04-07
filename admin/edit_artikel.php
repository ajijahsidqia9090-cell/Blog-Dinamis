<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi.php";

$id = $_GET['id'] ?? 0;

// 🔥 CEK DATA
$data = mysqli_fetch_array(mysqli_query($conn, "
SELECT * FROM artikel WHERE id_artikel='$id'
"));

if(!$data){
    die("Data tidak ditemukan!");
}

// 🔥 AMBIL KATEGORI & TAG
$kategori = mysqli_query($conn, "SELECT * FROM kategori");
$tag = mysqli_query($conn, "SELECT * FROM tag");

// 🔥 TAG TERPILIH
$tag_terpilih = [];
$q_tag = mysqli_query($conn, "SELECT id_tag FROM artikel_tag WHERE id_artikel='$id'");
while($t = mysqli_fetch_assoc($q_tag)){
    $tag_terpilih[] = $t['id_tag'];
}

// 🔥 PROSES UPDATE
if(isset($_POST['update'])){

    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $id_kategori = $_POST['id_kategori'];

    // 🔥 CEK GAMBAR
    if(!empty($_FILES['gambar']['name'])){

        $nama_file = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];

        $ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
        $nama_baru = time() . '.' . $ext;

        move_uploaded_file($tmp, "upload/".$nama_baru);

        $update = mysqli_query($conn, "UPDATE artikel SET 
            judul='$judul',
            isi='$isi',
            gambar='$nama_baru',
            id_kategori='$id_kategori'
            WHERE id_artikel='$id'
        ");

    } else {

        $update = mysqli_query($conn, "UPDATE artikel SET 
            judul='$judul',
            isi='$isi',
            id_kategori='$id_kategori'
            WHERE id_artikel='$id'
        ");
    }

    if(!$update){
        die("Error update: " . mysqli_error($conn));
    }

    // 🔥 RESET TAG
    mysqli_query($conn, "DELETE FROM artikel_tag WHERE id_artikel='$id'");

    if(isset($_POST['tag'])){
        foreach($_POST['tag'] as $id_tag){
            mysqli_query($conn, "
                INSERT INTO artikel_tag (id_artikel, id_tag)
                VALUES ('$id','$id_tag')
            ");
        }
    }

    echo "<script>
        alert('Artikel berhasil diupdate!');
        window.location='artikel.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Artikel</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
<div class="card p-4 shadow">

<h3 class="mb-3">✏️ Edit Artikel</h3>

<form method="POST" enctype="multipart/form-data">

    <!-- JUDUL -->
    <input type="text" name="judul" value="<?= $data['judul']; ?>" class="form-control mb-3" required>

    <!-- KATEGORI -->
    <select name="id_kategori" class="form-control mb-3" required>
        <option value="">-- Pilih Kategori --</option>
        <?php while($k = mysqli_fetch_assoc($kategori)) { ?>
            <option value="<?= $k['id_kategori']; ?>"
                <?= ($data['id_kategori'] == $k['id_kategori']) ? 'selected' : ''; ?>>
                <?= $k['nama_kategori']; ?>
            </option>
        <?php } ?>
    </select>

    <!-- TAG -->
    <label>Tag:</label><br>
    <?php while($t = mysqli_fetch_assoc($tag)) { ?>
        <div class="form-check form-check-inline">
            <input type="checkbox" name="tag[]" value="<?= $t['id_tag']; ?>"
                <?= in_array($t['id_tag'], $tag_terpilih) ? 'checked' : ''; ?>>
            <label><?= $t['nama_tag']; ?></label>
        </div>
    <?php } ?>

    <!-- ISI -->
    <textarea name="isi" class="form-control mt-3" rows="5"><?= $data['isi']; ?></textarea>

    <!-- GAMBAR -->
    <div class="mt-3">
        <label>Gambar Lama:</label><br>
        <?php if(!empty($data['gambar'])) { ?>
            <img src="upload/<?= $data['gambar']; ?>" width="120">
        <?php } else { ?>
            <span class="text-muted">Tidak ada</span>
        <?php } ?>
    </div>

    <input type="file" name="gambar" class="form-control mt-2">

    <!-- BUTTON -->
    <button type="submit" name="update" class="btn btn-success mt-3">Update</button>
    <a href="artikel.php" class="btn btn-secondary mt-3">Kembali</a>

</form>

</div>
</div>

</body>
</html>