

<?php
include('header.php');
include('nav.php');
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}
require "includes/functions.php";
$rows = getRec( $_GET['rid']);
$_SESSION['rid'] = $_GET['rid'];
if($_GET['success'] == "added"){
    echo "<script>alert('Insertion succesful')</script>";
}
?>



  <form method="POST" action="includes/addrec.in.php" class="form__group">
  <label class="form__label" for="titre">Titre:</label>
  <input class="input" type="text" name="titre" id="titre" required>

  <label class="form__label" for="departmentIdIndex">Département:</label>
  <input class="input" type="text" name="departmentIdIndex" id="departmentIdIndex" value="<?php echo $_SESSION['dep']; ?>" readonly>

  <label class="form__label" for="description">Lieu et Description :</label>
  <textarea class="input" name="description" id="description" required cols="20" rows="10"></textarea>

  <label class="form__label" for="priorite">priorité:</label>
  <select name="priorite" id="priorite" required>
    <option value="low">Low</option>
    <option value="medium">Medium</option>
    <option value="high">High</option>
  </select>

  <input type="submit" value="Submit" class="btn-submit">
</form>

<style>
    body {
      background-color: #1c1c1e;
      color: white;
      margin: 0;
      padding: 0;
    }

    .form__group {
      background-color: rgba(255, 255, 255, 0.1);
      padding: 20px;
      border-radius: 10px;
      margin: 80px 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .form__label {
      display: block;
      font-size: 16px;
      margin-bottom: 5px;
    }

    .input {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: none;
      border-radius: 5px;
      background-color: rgba(255, 255, 255, 0.2);
      color: white;
    }

    .input::placeholder {
      color: rgba(255, 255, 255, 0.7);
    }

    .input:focus {
      outline: none;
      background-color: rgba(255, 255, 255, 0.3);
    }

    .btn-submit {
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
    }

    .btn-submit:hover {
      background-color: #0056b3;
    }

    textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: none;
      border-radius: 5px;
      background-color: rgba(255, 255, 255, 0.2);
      color: white;
    }

    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: none;
      border-radius: 5px;
      background-color: rgba(255, 255, 255, 0.2);
      color: white;
    }
    #priorite{
      width: 25%;
    }

</style>



    <?php

    include('footer.php');



    ?>