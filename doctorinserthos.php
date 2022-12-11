<?php
        include ('dbconn.php');
        include('session.php');
        $id = $_GET['id'];
        $hosid = $_GET['hosid'];
        
        mysqli_query($conn,"INSERT INTO doctorworking(d_nid,hospital_id,joined_date) VALUES('$id','$hosid',CURRENT_DATE)");
        mysqli_query($conn,"DELETE FROM docregistry where hospital_id = '$hosid' and d_nid = '$id'");
        header("location:hospitaldoctor.php");

    ?>

        
