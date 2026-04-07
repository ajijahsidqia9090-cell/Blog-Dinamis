<?php
session_start();
include "koneksi.php";

$id = $_GET['id'];
$id_user = $_SESSION['id_user'];

mysqli_query($conn, "
DELETE FROM artikel 
WHERE id_artikel='$id' AND id_user='$id_user'
");

header("Location: artikel.php");