<?php
include('header.php');
  session_start();
  if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
  require_once "includes/functions.php";
  require_once "includes/db.in.php";
  $username = $_SESSION["username"];
  $password = NULL;
  $status = getAccountStatus($conn, $username, $password);

  if($status){
    include('active.php');
  }else{
    include('inactive.php');
  }

?>