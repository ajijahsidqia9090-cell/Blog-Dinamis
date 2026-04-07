<?php
include "../koneksi.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM komentar WHERE id_komentar='$id'");

header("Location: komentar.php");