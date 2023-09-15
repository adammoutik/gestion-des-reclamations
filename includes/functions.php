<?php
function emptyInputsR($username, $password, $firstName, $lastName, $departementId, $role){
    if(empty($username) || empty($password) || empty($firstName) || empty($lastName) || empty($departementId) || empty($role)){
        return true;
    }else{
        return false;
    }
}

function invalidPwd($password){
    if(!preg_match("/^[a-zA-Z0-9,@]*$/",$password)){
        return true;
    }else{
        return false;
    }
}

function invalidPwdForm($password){
    if(strlen($password) < 8){
        return true;
    }else{
        return false;
    }
}

function invalidDepartmentId($departmentId){
    return $departmentId < 0 || $departmentId > 5;
}

function invalidEmployee($conn , $firstName , $lastName){
    $sql = "SELECT * FROM `employee` WHERE `efname` = ? AND `elname` = ? ;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "ERROR: ". mysqli_stmt_error($stmt, $conn);
    }
    mysqli_stmt_bind_param($stmt,"ss",$firstName, $lastName);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($result)) {
        return true;
    }else{
        return false;
    }
    mysqli_stmt_close($stmt);
}

function takenUid($conn, $username, $password){
    $sql = "SELECT * FROM `users` WHERE `username` = ? ;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "ERROR: ". mysqli_stmt_error($stmt);
    }
    mysqli_stmt_bind_param($stmt,"s",$username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($result)) {
        return $row;
    }else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $username, $password, $firstName, $lastName ,$departementId, $role){
    require_once "db.in.php";
    $sql = "INSERT INTO users(username, pwd, fname, lname, departmentId, role, registration_date) VALUES(? , ? , ? , ? , ? , ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    $date = date("Y-m-d");
    $hash = password_hash($password,PASSWORD_DEFAULT);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "ERROR: ". mysqli_stmt_error($stmt);
    }
    mysqli_stmt_bind_param($stmt,"sssssss",$username, $hash, $firstName, $lastName, $departementId, $role, $date );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function emptyInputsL($username, $password){
    if(empty($username) || empty($password)){
        return true;
    }else{
        return false;
    }
}


function loginUser($conn, $username, $password){
    $row = takenUid($conn, $username, $password);
    if(!$row){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
        $hashed = $row["pwd"];
        $chkpwd = password_verify($password, $hashed); 
        if($chkpwd){
            session_start();
            $_SESSION["username"]=$username;
            $_SESSION["firstname"] = $row["fname"];
            $_SESSION["lname"]=$row["lname"];
            $_SESSION["id"]=$row["eid"];
            $_SESSION["dep"] = getDepartementName($row["departmentId"]);
            $_SESSION["crec"] = $row["completedRecs"];

            header("location: ../index.php");
            
        }else{
            header("location: ../login.php?error=wrongpwd");
            exit();
        }
    }


    function getAccountStatus($conn, $username, $password){
        $row = takenUid($conn, $username, $password);
        $status = $row["active"];
        return $status;
    }

    function getPriority($prio){
        switch ($prio) {
            case 'client':
                return 1;
            case 'departement':
                return 2;
            case 'urgent':
                return 0;
            default:
                return -1;
        }
    }
    function getDepartementName($id){
        switch ($id) {
            case 1:
                return "Finance";
            case 2:
                return "Marketing";
            case 3:
                return "HR";
            case 4:
                return "Operations";
            case 5:
                return "IT";
            default:
                return -1;
        }
    }

    function getDepartmentId($departmentName) {
        switch ($departmentName) {
            case "Finance":
                return 1;
            case "Marketing":
                return 2;
            case "HR":
                return 3;
            case "Operations":
                return 4;
            case "IT":
                return 5;
            default:
                return -1;
        }
    }
    

    function setStatus($conn, $id, $etat, $review){
        $query = "SELECT eid FROM reclamatio WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        }
        $date = date('Y-m-d H:i:s');
        $query = "UPDATE reclamatio SET etat = '$etat', review = '$review', date_ferm = '$date'  WHERE id = '$id'";
        if(mysqli_query($conn, $query)){
            if($etat = 'Done'){
                incrementCompletedRecs($conn, $row['eid']);
            }
        }
    }
function assignReclamation($conn, $reclamationId, $employeeId)
{
    // Check if the reclamation is already assigned to someone
    $query = "SELECT eid FROM reclamatio WHERE id = '$reclamationId'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    }
    
    // Update the reclamation table with the assigned employee ID
    $query = "UPDATE reclamatio SET eid = '$employeeId', etat = 'En cours' WHERE id = '$reclamationId'";
    if (mysqli_query($conn, $query)) {
        echo '<script type="text/javascript">

            window.onload = function () { alert("SUCCESSFULLY"); }

</script>';
    } else {
        echo "Error assigning reclamation: " . mysqli_error($conn);
    }
}

function getRec($id){
    require_once "fetch.in.php";
    while($rows=mysqli_fetch_assoc($resultat)){
        if($rows['id'] == $id){
            return $rows;
        }
    }
}

function getUserById( $id) {
    require "includes/db.in.php";
    $sql = "SELECT fname, lname FROM users WHERE eid = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "ERROR: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } else {
        return false;
    }
}

function incrementCompletedRecs($conn, $eid){
    $sql = "UPDATE users SET completedRecs = completedRecs + 1 WHERE eid = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        die("ERROR : ");
    }
    mysqli_stmt_bind_param($stmt, "i", $eid);
    mysqli_stmt_execute($stmt);
}
?>

    