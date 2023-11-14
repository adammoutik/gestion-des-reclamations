<?php

include_once "db.in.php";
include_once "functions.php";

$titre = $_POST['titre'];
$departmentIdIndex = $_POST['departmentIdIndex'];
$description = $_POST['description'];
$priorite = $_POST['priorite'];

$depId = getDepartmentId($departmentIdIndex);

$sql = "INSERT INTO reclamatio (titre, departmentId, description, priorite)
        VALUES (?, ?, ?, ?);";

$stmt = $conn->prepare($sql);

$stmt->bind_param("siss", $titre, $depId, $description, $priorite);

if ($stmt->execute()) {
  header('Location: http://' . $_SERVER['HTTP_HOST'] . '/hotel/addRec.php?success=added');
} else {
  header('Location: http://' . $_SERVER['HTTP_HOST'] . '/hotel/addRec.php?error=' . $stmt->error);
}

// close stmt
$stmt->close();
?>

