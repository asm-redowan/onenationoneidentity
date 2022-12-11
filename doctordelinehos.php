<?php
        include ('dbconn.php');
        include('session.php');
        $id = $_GET['id'];
        $hosid = $_GET['hosid'];
        mysqli_query($conn,"DELETE FROM docregistry where hospital_id = '$hosid' and d_nid = '$id'");
        header("location:hospitaldoctor.php");

    ?>

        
