
    <table id="students-table">
            <thead>
                <tr>
                <th>ID</th>
                <th>Probléme</th>
                <th>Lieu et Description</th>
                <th>Nom Prenom</th>
                <th>Departement</th>
                <th>Date de reclamation</th>
                <th>Etat</th>
                <?php $text = $_SESSION['dep'] == "IT" || $_SESSION['username'] == "admin" ? "<th>Priorite</th>":""; 
                echo $text;
                ?>
                <th>Actions</th>
                </tr>
            </thead>
                <?php 
                require_once "includes/fetch.in.php";
                require_once "includes/db.in.php";
                require_once "includes/functions.php";
                while($rows=mysqli_fetch_assoc($resultat)) 
                { 
                    $id = getDepartementName($rows['departmentId']);
                    if($_SESSION['dep'] != "IT" && $id == $_SESSION['dep']){
                ?> 
                <tr> <td><?php echo $rows['id']; ?></td> 
                <td><?php echo $rows['titre']; ?></td> 
                <td><?php echo $rows['description']; ?></td>
                <td><?php $uname = getUserById($rows['eid']);
        echo "{$uname['fname']} {$uname['lname']}";
        if(empty($uname))echo "En Attente";
        
        ?></td>
                <td><?php echo $id; ?></td>
                <td><?php echo $rows['date_ouvert']; ?></td>
                <td class="liste"><?php echo $rows['etat']; ?></td>
                <form id="assignForm" action="listP.php" method="POST">
                <input type="hidden" name="rid" value="<?php echo $rows['id']; ?>">
                <input type="hidden" name="eid" value="<?php echo $_SESSION['id'];?>"> 
                <td>
                <?php
                        if($rows['etat'] == 'En cours'){
                    ?>
                <span>En attente d'une intervention</span>
                <?php }else if(empty($uname)){
                    echo "Un technicien IT examine le problème";
                }else
                {
                    if($rows['etat'] != 'En cours'){
                        ?>
                        <a href="rec-details.php?rid=<?php echo $rows['id'];  ?>&eid=<?php echo $rows['eid'];  ?>&action=details">Details...</a>
                        <?php
                    }
                    
                    
                }
            }else if($_SESSION['dep'] == "IT" || $_SESSION['username'] == "admin"){
                ?>
                <<tr> <td><?php echo $rows['id']; ?></td> 
                <td><?php echo $rows['titre']; ?></td> 
                <td><?php echo $rows['description']; ?></td>
                <td><?php $uname = getUserById($rows['eid']);
        echo "{$uname['fname']} {$uname['lname']}";
        if(empty($uname))echo "En Attente"; ?>
                <td><?php echo $id; ?></td>
                <td><?php echo $rows['date_ouvert']; ?></td>
                <td class="liste"><?php echo $rows['etat']; ?></td>
                <td><?php echo $rows['priorite']; ?></td>
                
                
                <form id="assignForm" action="listP.php" method="POST">
                <input type="hidden" name="rid" value="<?php echo $rows['id']; ?>"> 
                <input type="hidden" name="eid" value="<?php echo $_SESSION['id'];?>"> 
                <td>
                <?php
                        if($rows['etat'] != 'Done' && $rows['eid'] == NULL){
                    ?>
                <button type="submit" name="submit">Assign Reclamation</button>
                <?php }else{
                    if($rows['etat'] == 'Done' || $rows['etat'] == 'Êchec'){
                        ?>
                        <a href="rec-details.php?rid=<?php echo $rows['id'];  ?>&eid=<?php echo $rows['eid'];  ?>&action=details">Details...</a>
                        <?php
                    }else{
                        echo "Un technicien IT examine le problème";
                    }
                    
                }
            }?>
                </td>
                
                </form>
                
                </tr> 
            <?php 
                        } 
                    ?> 
                    

            

                    
    </table>

    <?php
    if($_SESSION['dep'] == "IT" || $_SESSION['username'] == "admin")
    echo '<button id="export" onclick="exportData()">Enregistrer q un fichier excel</button>';
    ?>
    
    <script src="js/statusColor.js"></script>
    <script src="js/table2excel.js"></script>
    <script src="js/toExcel.js"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 18px;
            height: 100vh;
        }
                .text-success{
            background-color: #45a049;
        }
        .text-danger{
            background-color: red;
        }
    #students-table {
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