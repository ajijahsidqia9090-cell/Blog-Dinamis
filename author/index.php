<?php
session_start();

if(isset($_SESSION['login']) && $_SESSION['role'] == 'author'){
    header("Location: dashboard.php");
    exit;
}else{
    header("Location: login.php");
    exit;
}