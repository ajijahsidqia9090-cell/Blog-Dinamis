<?php
include "koneksi.php";

// 🔥 DEBUG
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 🔥 QUERY
$data = mysqli_query($conn, "
SELECT artikel.*, kategori.nama_kategori 
FROM artikel
LEFT JOIN kategori ON artikel.id_kategori = kategori.id_kategori
ORDER BY artikel.id_artikel DESC
");

if(!$data){
    die("Query error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Artikel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8fafc;
        }
        .card {
            border-radius: 15px;
        }
        img {
            border-radius: 10px;
        }
    </style>
</head>

<body>

<div class="container mt-5">

    <div class="card shadow p-4">

        <!-- JUDUL SAJA -->
        <div class="mb-3">
            <h4>📄 Data Artikel</h4>

            <!-- Tombol bersebelahan -->
            <div class="d-flex gap-2 mt-2">
                <a href="tambah_artikel.php" class="btn btn-primary">
                    ➕ Tambah Artikel
                </a>
                <a href="dashboard.php" class="btn btn-dark">
                    ⬅ Kembali
                </a>
            </div>
        </div>


        <table class="table table-bordered table-hover align-middle">

            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tag</th>
                    <th>Gambar</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php 
            $no = 1;
            while($d = mysqli_fetch_assoc($data)) { 
            ?>

                <tr>
                    <td><?= $no++; ?></td>

                    <td><?= $d['judul']; ?></td>

                    <!-- KATEGORI -->
                    <td>
                        <?= !empty($d['nama_kategori']) 
                            ? $d['nama_kategori'] 
                            : '<span class="text-muted">-</span>'; ?>
                    </td>

                    <!-- TAG -->
                    <td>
                        <?php
                        $tags = mysqli_query($conn, "
                            SELECT tag.nama_tag 
                            FROM artikel_tag
                            JOIN tag ON artikel_tag.id_tag = tag.id_tag
                            WHERE artikel_tag.id_artikel = ".$d['id_artikel']."
                        ");

                        if(mysqli_num_rows($tags) > 0){
                            while($t = mysqli_fetch_assoc($tags)){
                                echo "<span class='badge bg-primary me-1'>".$t['nama_tag']."</span>";
                            }
                        } else {
                            echo "<span class='text-muted'>-</span>";
                        }
                        ?>
                    </td>

                    <!-- GAMBAR -->
                    <td>
                        <?php 
                        if(!empty($d['gambar']) && file_exists("upload/".$d['gambar'])) { ?>
                            <img src="upload/<?= $d['gambar']; ?>" width="80">
                        <?php } else { ?>
                            <span class="text-muted">Tidak ada</span>
                        <?php } ?>
                    </td>

                    <!-- TANGGAL -->
                    <td><?= date('d-m-Y', strtotime($d['tanggal'])); ?></td>

                    <!-- AKSI -->
                    <td>
                        <a href="edit_artikel.php?id=<?= $d['id_artikel']; ?>" 
                           class="btn btn-warning btn-sm">
                           ✏️ Edit
                        </a>

                        <a href="hapus_artikel.php?id=<?= $d['id_artikel']; ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin hapus artikel ini?')">
                           🗑️ Hapus
                        </a>
                    </td>

                </tr>

            <?php } ?>

            </tbody>

        </table>


</body>
</html>