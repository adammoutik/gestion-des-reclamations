<?php

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once "db.in.php";
    require_once "functions.php";

    if(emptyInputsL($username, $password) !== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }


    loginUser($conn, $username, $password);

}else{
    header("location: ../login.php?btn=true");
        exit();
}