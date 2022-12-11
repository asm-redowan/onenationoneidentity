<?php
    include('dbconn.php');
    include('session.php');

    $preid = $_GET['preid'];    
    $test_id = $_GET['test_id'];    
    mysqli_query($conn,"delete from doctorgivetest where prescription_id = '$preid' and test_id = '$test_id'");
    header ('location:prescription.php?preid='.$preid);
   

?>