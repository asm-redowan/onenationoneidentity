<?php
    include('dbconn.php');
    include('session.php');
    // echo "<pre>";
    // print_r($_GET);
    
    // echo "</pre>";
    $drug_name = $_GET['drug_name'];
    $preid = $_GET['preid'];    
    mysqli_query($conn,"delete from drug where prescription_id = '$preid' and drug_name = '$drug_name'");
    header ('location:prescription.php?preid='.$preid);
   

?>