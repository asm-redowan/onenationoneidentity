<?php 
    include ('dbconn.php');
    // print_r($_GET);
    $serial=$_GET['serial'];
    $precription_id = $_GET['id'];

    mysqli_query($conn,"delete from testreport where serial ='$serial'");
    header("location:hosprescriptionview.php?id=".$precription_id);

?>