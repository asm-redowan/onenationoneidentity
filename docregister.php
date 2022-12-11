<?php
        include ('dbconn.php');
        include('session.php');
        $id = $_GET['id'];
        $hosid = $_GET['hosid'];
        $dmdc = $_GET['dmdc'];
        $query4 = mysqli_query($conn,"SELECT * from doctorworking where d_nid ='$id' and hospital_id = '$hosid'");
        $check=mysqli_fetch_array($query4);
        if($check == NULL){
            mysqli_query($conn,"INSERT INTO docregistry(d_nid,hospital_id,dmdc_id) VALUES('$id','$hosid','$dmdc')");
        }
        header("location:hospitalprofile.php?id=".$hosid);

    ?>

        
