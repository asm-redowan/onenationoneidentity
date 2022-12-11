<?php include('dbconn.php'); ?>
<?php include('session.php'); ?>
<?php
    $patient_row = "";
    if(isset($_POST['go'])){
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        header("location:searchdoctor.php?search=".$search);
    }
?>