<?php

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $departmentId = $_POST["department"];
    $role = $_POST["role"];

    require_once "db.in.php";
    require_once "functions.php";
    
    if(invalidPwd($password) !== false){
        header("location: ../register.php?error=invalidpwd");
        exit();
    }
    if(invalidPwdForm($password) !== false){
        header("location: ../register.php?error=invalidpwdform");
        exit();
    }
    if(takenUid($conn, $username, $password) !== false){
        header("location: ../register.php?error=usernametaken");
        exit();
    }
    if(invalidEmployee($conn, $fname, $lname) !== false){
        header("location: ../register.php?error=invalide");
        exit();
    }
    if(invalidDepartmentId($departmentId) !== false){
        header("location: ../register.php?error=invalidd");
        exit();
    }


    
    createUser($conn, $username, $password, $fname, $lname,$departmentId, $role);
    header("location: ../index.php");
    exit();
}else{
    header("location: ../login.php");
}