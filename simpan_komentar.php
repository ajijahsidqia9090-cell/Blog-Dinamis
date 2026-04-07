<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

$id_artikel = $_POST['id_artikel'];
$nama = $_SESSION['username'];
$komentar = $_POST['komentar'];

mysqli_query($conn, "
INSERT INTO komentar (id_artikel, nama, komentar, tanggal)
VALUES ('$id_artikel', '$nama', '$komentar', NOW())
");

echo "<script>
alert('Komentar berhasil dikirim');
window.location='detail_artikel.php?id=$id_artikel';
</script>";