<?php

if(isset($_POST['submit']) && isset($_POST['password'])){
    require_once "db.in.php";
    require_once "functions.php";
    $pass = $_POST['password'];
    $passC = $_POST['confirmPassword'];
    $uid = $_POST['uid'];
    if($pass == $passC && !invalidPwd($pass) && !invalidPwdForm($pass)){
        $sql = "UPDATE users SET pwd = ? WHERE uid = ?";
    $stmt = mysqli_stmt_init($conn);
    $hash = password_hash($pass,PASSWORD_DEFAULT);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "ERROR: ". mysqli_stmt_error($stmt);
    }
    mysqli_stmt_bind_param($stmt,"si",$hash, $uid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('Location : ../admin.php');
    exit;
    }else{
        echo "passwords do not match";
    }
}