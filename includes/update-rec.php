<?php
session_start();


if(isset($_GET['submit'])){
    require_once "fetch.in.php";
    require_once "functions.php";
    require_once "db.in.php";
    $rid = $_SESSION['rid'];
    $etat = $_GET['etat'];
    $review = $_GET['Review'];
    setStatus($conn, $rid, $etat, $review);
    header("location: ../inbox.php");
    exit;
}