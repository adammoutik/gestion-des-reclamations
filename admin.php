<?php
    include('header.php');
    include('nav.php');
    if(!isset($_SESSION['username']) || $_SESSION['username'] != "admin"){
        header("Location: index.php");exit(0);
    }
    

?>

<div class="admin-container">

    <table class="admin-table">
        <thead>
            
            <tr>
                
                <th>Nom & Prenom</th>
                <th>Username</th>
                <th>departement</th>
                <th>changement du mot de pass</th>
                <th>supression du compte</th>
                <th>l'etat du compte</th>
            </tr>
        </thead>
            
            <?php
            require "includes/admin.in.php";
            require_once "includes/db.in.php";
            require_once "includes/functions.php";
            $result = showUsers($conn);
            if($result){
                while($rows = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                    <td><?php echo "{$rows['lname']} {$rows['fname']}"; ?></td>
                    <td><?php echo  $rows['username'];  ?></td>
                    <td><?php $dep = getDepartementName($rows['departmentId']);
                    if($dep == -1 && $rows['username'] != "admin")echo "departement inconnu";elseif($rows['username'] == "admin")echo "Admin";else echo $dep;?></td>
                    <td><?php echo "<button><a href='changepwd.php?uid={$rows['uid']}'>Change Password</a></button>" ?></td>
                    <td><?php echo "<button><a href='includes/deleteacc.in.php?uid={$rows['uid']}'>Delete</a></button>" ?></td>
                    <td><?php
                    if($rows['active'] == 0){
                        echo "<button><a href='includes/activate.in.php?uid={$rows['uid']}'>Activer</a></button>";
                    }else{
                        echo "activé";
                    }
                        ?> </td>
                    </tr>
                    <?php
                }
            }
            ?>
            
    </table>
</div>
<style>
    body {
        background-color: #1c1c1e;
    }
    .admin-container{
                  display: flex;
          justify-content: center;
          align-items: center;
            height: 100vh;
            width: 100%;
    }
    .admin-container table {
        margin-top: 35px;
    }

    .text-success{
            background-color: #45a049;
        }
        .text-danger{
            background-color: red;
        }
    .admin-table {
        
        top: 150px;
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }

    .admin-table th,
    .admin-table td {
        padding: 8px;
        border: 1px solid #E0EFDE;
        color: #E0EFDE;
        text-align: center;
    }

    .admin-table button {
        padding: 6px 10px;
        color: #fff;
        border: none;
        cursor: pointer;
        background-color: grey;
    }

    .admin-table button:hover {
        background-color: #45a049;
    }
    a,a:active {
        text-decoration: none;
        color: #000;
    }


</style>


<?php

    include('footer.php');

?>