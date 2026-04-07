<?php
include "koneksi.php";

$nama = $_POST['nama_tag'];

mysqli_query($conn, "INSERT INTO tag (nama_tag) VALUES ('$nama')");

header("Location: tag.php");
?>