<?php


//get user data by id

function getUserData($eid){
    require_once "db.in.php";
    $sql = "SELECT * FROM users WHERE eid = $eid;";
    $result = mysqli_execute_query($conn,$sql);
    if ($result) {
        $row=mysqli_fetch_assoc($result);
    }
    return $row;
}