<?php

include_once "db.in.php";
include_once "functions.php";

$titre = $_POST['titre'];
$departmentIdIndex = $_POST['departmentIdIndex'];
$description = $_POST['description'];
$priorite = $_POST['priorite'];

$depId = getDepartmentId($departmentIdIndex);

// Prepare the SQL insert statement
$sql = "INSERT INTO reclamatio (titre, departmentId, description, priorite)
        VALUES (?, ?, ?, ?);";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind the parameters
$stmt->bind_param("siss", $titre, $depId, $description, $priorite);

// Execute the statement
if ($stmt->execute()) {
  // Insertion successful
  header('Location: http://' . $_SERVER['HTTP_HOST'] . '/hotel/addRec.php?success=added');
} else {
  // Insertion failed
  header('Location: http://' . $_SERVER['HTTP_HOST'] . '/hotel/addRec.php?error=' . $stmt->error);
}

// Close the statement and database connection
$stmt->close();
?>

