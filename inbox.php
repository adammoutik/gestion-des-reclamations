<?php
session_start();
    include('header.php');
    include('nav.php');
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit;
    }
?>



<div class="container-list">
    <table id="students-table">
            <thead>
                <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Lieu</th>
                <th>Departement</th>
                <th>Status</th>
                <th>Priorité</th>
                <th>Actions</th>
                </tr>
                <?php 
                require_once "includes/fetch.in.php";
                require_once "includes/db.in.php";
                require_once "includes/functions.php";
                while($rows=mysqli_fetch_assoc($resultat)) 
                { 
                    $id = getDepartementName($rows['departmentId']);
                    if($rows['eid'] == $_SESSION['id']){
                ?> 
                <tr> <td><?php echo $rows['id']; ?></td> 
                <td><?php echo $rows['titre']; ?></td> 
                <td><?php echo $rows['description']; ?></td>
                <td><?php echo $id; ?></td>
                <td class="liste"><?php echo $rows['etat']; ?></td>
                <td><?php echo $rows['priorite']; ?></td>
                <form action="rec-details.php" method="get">
                    <input type="hidden" name="rid" value="<?php echo $rows['id']; ?>">
                    <input type="hidden" name="eid" value="<?php echo $rows['eid']; ?>">
                <td>
                        <button type="submit">Actions</button>
                </td>
                </form>
                
                </tr> 
            <?php 
                    }
                        } 
                    ?> 

                    
    </table>
    <script src="js/statusColor.js">

                </script>
    <style>
        .container-list{
            position: relative;
            height: 100vh;
            background-color: #1c1c1e;
        }
                .text-success{
            background-color: #45a049;
        }
        .text-danger{
            background-color: red;
        }
    #students-table {
        position: absolute;
        top: 150px;
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }

    #students-table th,
    #students-table td {
        padding: 8px;
        border: 1px solid #E0EFDE;
        color: #E0EFDE;
    }


    .btn-update {
        padding: 6px 10px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    .btn-update:hover {
        background-color: #45a049;
    }
</style>

</div>



<?php

    include('footer.php');

?>

