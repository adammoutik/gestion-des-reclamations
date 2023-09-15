<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: ../login.php");exit(0);
    }
    $uid = $_GET['uid'];
    require_once "db.in.php";
    require_once "admin.in.php";
    activeAccount($conn, $uid);
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/hotel/admin.php');
    