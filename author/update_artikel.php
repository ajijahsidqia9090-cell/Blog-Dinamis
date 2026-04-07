<?php
session_start();
include "koneksi.php";

$id = $_POST['id'];
$id_user = $_SESSION['id_user'];

$judul = $_POST['judul'];
$isi   = $_POST['isi'];

$nama = $_FILES['gambar']['name'];
$tmp  = $_FILES['gambar']['tmp_name'];

if($nama != ""){

    $ext = pathinfo($nama, PATHINFO_EXTENSION);
    $nama_baru = time().".".$ext;

    move_uploaded_file($tmp, "../admin/upload/".$nama_baru);

    mysqli_query($conn, "
    UPDATE artikel SET 
    judul='$judul',
    isi='$isi',
    gambar='$nama_baru'
    WHERE id_artikel='$id' AND id_user='$id_user'
    ");

}else{

    mysqli_query($conn, "
    UPDATE artikel SET 
    judul='$judul',
    isi='$isi'
    WHERE id_artikel='$id' AND id_user='$id_user'
    ");
}

header("Location: artikel.php");