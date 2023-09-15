<?php

include('header.php');
include('nav.php');
?>

<?php
    require_once "includes/functions.php";
    include_once "includes/db.in.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $rid = $_POST['rid'];
        $eid = $_POST['eid'];
        
        assignReclamation($conn, $rid, $eid);
        
    }
    
    include('list.php');
    
?>



<?php
    include('footer.php');
?>