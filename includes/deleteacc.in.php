<?php
    session_start();
    if($_SESSION['username'] != "admin"){
        header("Location: ../login.php");exit(0);
    }else{
        require_once "admin.in.php";
        require_once "db.in.php";
        $uid = $_GET['uid'];
        deleteAcc($conn, $uid);
    }

