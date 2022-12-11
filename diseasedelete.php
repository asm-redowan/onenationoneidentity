<?php
    include('dbconn.php');
    include('session.php');
    echo "<pre>";
    print_r($_GET);
    
    echo "</pre>";
    $diseasename = $_GET['diseasename'];
    $preid = $_GET['preid'];    
    mysqli_query($conn,"delete from detectdisease where prescription_id = '$preid' and disease_name = '$diseasename'");
    header ('location:prescription.php?preid='.$preid);
   

?>