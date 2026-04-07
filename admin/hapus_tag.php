<?php
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM tag WHERE id_tag='$id'");

header("Location: index.php?menu=tag");
?>