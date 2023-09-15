<?php

    include('header.php');
    include('nav.php');
?>

<div class="Profile">
    <div class="card">
    <div class="tools">
        <div class="circle">
        <span class="red box"></span>
        </div>
        <div class="circle">
        <span class="yellow box"></span>
        </div>
        <div class="circle">
        <span class="green box"></span>
        </div>
    </div>
    <div class="card__content">
        <div>Username : <?php echo $_SESSION['username'];    ?></div> <br>
        <div>Nom & Prénom : <?php echo $_SESSION['lname'] . " " .  $_SESSION['firstname'];     ?> </div><br>
        <div>Département : <?php  echo $_SESSION["dep"];?> </div><br>

        <?php
    if ($_SESSION['dep'] == "IT") {
        echo "<div>N° de reclamations résout : " . $_SESSION["crec"] . "</div>";
    }
    ?>

    </div>
    </div>
</div>

<style>
    .card__content {
        margin-top: 20%;
        font-family: monospace;
        font-size: 1.2rem;
        text-align: center;
    }
    .card__content div {
        font-weight: bold;
        margin: 2px 10px;
    }
    body {
        background-color: #1c1c1c;
    }
        .card {
    width: 450px;
    height: 450px;
    margin: 150px auto;
    background-color: grey;
    border-radius: 8px;
    z-index: 1;
    }

    .tools {
    display: flex;
    align-items: center;
    padding: 9px;
    }

    .circle {
    padding: 0 4px;
    }

    .box {
    display: inline-block;
    align-items: center;
    width: 10px;
    height: 10px;
    padding: 1px;
    border-radius: 50%;
    }

    .red {
    background-color: #ff605c;
    }

    .yellow {
    background-color: #ffbd44;
    }

    .green {
    background-color: #00ca4e;
    }

</style>

<?php
    
    include('footer.php');

?>