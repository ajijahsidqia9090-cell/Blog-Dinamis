<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "blog";

$conn = mysqli_connect("localhost", "root", "", "blog");

if(!$conn){
    die("Koneksi gagal : ".mysqli_connect_error());
}
?>