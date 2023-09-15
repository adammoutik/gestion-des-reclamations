<?php


function modifyPassword($conn, $uid, $password){
    $sql = "UPDATE TABLE users SET `password` = ? WHERE `uid` = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        //error
    }else{
        mysqli_stmt_bind_param($stmt,"si", $passowrd, $uid);
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}


function activeAccount($conn, $uid){
    $sql = "UPDATE users SET `active` = 1 WHERE uid = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
       echo mysqli_stmt_error($stmt);
    }else{
        mysqli_stmt_bind_param($stmt,"i", $uid);
        mysqli_stmt_execute($stmt);
    }
    
    mysqli_stmt_close($stmt);
}

function showUsers($conn){
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function deleteAcc($conn, $uid){
    $sql = "DELETE FROM `users` WHERE `users`.`uid` = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "<script>alert('Supression non reussi');</script>";
    }else{
        mysqli_stmt_bind_param($stmt,"i", $uid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        echo "<script>alert('Supression Reussi');</script>";
    }
    
}