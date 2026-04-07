<?php
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM artikel WHERE id_artikel='$id'");

header("Location: artikel.php");
?>