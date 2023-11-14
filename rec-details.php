

<?php
include('header.php');
include('nav.php');
require "includes/functions.php";
$rows = getRec( $_GET['rid']);
$_SESSION['rid'] = $_GET['rid'];
?>



<form action="includes/update-rec.php" method="GET" id="rec-update-form" class="form__group field">
        <input class="form__field" type="text" name="rid" id="r-id" value="<?php echo $rows['id']; ?>" hidden>

            <label class="form__label" for="r-titre">Sujet:</label>
        <input class="form__field" type="text" name="rtitre" id="r-titre" value="<?php echo $rows['titre']; ?>" readonly >

            <label class="form__label" for="r-dep">Departement:</label>
        <input class="form__field" type="text" name="rdep" id="r-dep" value="<?php echo getDepartementName($rows['departmentId']);?>" readonly >

            <label class="form__label" for="r-des">Lieu et Description:</label>
        <input class="form__field" type="text" name="rdes" id="r-des" value="<?php echo $rows['description'] ?>" readonly >

        <?php

            
        ?>
            <label class="form__label" for="r-eid">Employé Reponsable:</label>
        <input class="form__field" type="text" name="reid" id="r-eid" value="<?php   
        // we get the eid from the details href attribute as GET request 
            if(isset($_GET['eid'])){
                $eid = $_GET['eid'];
                 $uname = getUserById($eid);
            echo "{$uname['fname']} {$uname['lname']}";
            }
           ?>" readonly >

            <label class="form__label" for="r-dateo">Date d'ouverture:</label>
        <input class="form__field" type="text" name="rdateo" id="r-dateo" value="<?php echo $rows['date_ouvert'] ?>" readonly >
        <label class="form__label" for="r-dateo">Date de fermuture:</label>
        <input class="form__field" type="text" name="rdateo" id="r-dateo" value="<?php echo $rows['date_ferm'] ?>" readonly >
    <!-- pour identifier si l'accées est pour modifier ou juste pour la lecture seulement -->
        <?php
        if(isset($_GET['action']) || $_SESSION['dep'] != "IT"){
          ?>
          <div class="etat"><label>Êtat :</label> 
        <input name="etat" type="text" value="<?php echo $rows['etat']; ?>" readonly>
    </div>
    <?php
        }else{

        ?>
        <label>Êtat :</label>    <label for="etat-done">Done</label>
        <input type="radio" name="etat" id="etat-done" value="Done" <?php if($rows['etat'] == "Done") echo "checked readonly";else ""; ?>    >

            <label for="etat-echec">Êchec</label>
        <input type="radio" name="etat" id="etat-echec" value="Êchec" <?php if($rows['etat'] == "Echec") echo "checked";elseif($rows['etat'] == "Done") echo "readonly"; ?>  >

            <label for="etat-pending">En cours</label>
        <input type="radio" name="etat" id="etat-pending" value="En cours" <?php if($rows['etat'] == "En cours") echo "checked";elseif($rows['etat'] == "Done") echo "readonly"; ?>  >
          <?php
          }
        
          ?>
        
        <label for="rec-review">Review :</label>
        <textarea name="Review" id="rec-review" cols="30" rows="10" <?php if($rows['etat'] == "Done") echo "readonly";else ""; ?>><?php if(!empty($rows['review']))echo $rows['review']; ?></textarea>
        <?php if(!isset($_GET['action'])){ ?>
        <input type="submit" name="submit" value="UPDATE">
        <?php } ?>

</form>

<style>
    body {
      background-color: #352f44;
      color: white;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form__group {
        display: flex;
      align-items: stretch;
      flex-direction: column;
      background-color: rgba(255, 255, 255, 0.1);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      width: 30%;
    }

  .etat label {
    display: block;
    
  }

  .form__group input {
    outline: none;
    border: none;

  }

  .form__group label {
    font-weight: bold;
  }
/* reset input */
.form__field:required, .form__field:invalid {
  box-shadow: none;
}

input, textarea {
  background-color: #5c5470;
  color: #dbd8e3;
  border-radius: 20px;
  padding: 5px;
}
</Style>




    <?php

    include('footer.php');



    ?>