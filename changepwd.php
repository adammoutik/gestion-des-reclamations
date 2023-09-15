<?php
    include('header.php');
    include('nav.php');
    if(!isset($_SESSION['username']) || $_SESSION['username'] != "admin"){
        header("Location: login.php");exit(0);
    }
?>
<form action="includes/changepwd.in.php" method="POST" class="pwd-form">
    <input type="password" name="password" id="pwd" placeholder="Password">
    <input type="password" name="confirmPassword" id="pwd-confirm" placeholder="Retype Password">
    <input type="hidden" name="uid" value="<?php echo $_GET['uid']; ?>">
    <input type="submit" value="Change" name="submit">
</form>

<style>
    .pwd-form {
        margin-top: 150px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
</style>

<?php



?>
