<?php          
    include("dbconn.php");
    include("session.php");
    $did = $_GET['dnid'];
    $pid = $_GET['pnid'];
    
    mysqli_query($conn,"DELETE FROM appointment where p_nid = '$pid' and d_nid = '$did'");
    header("location:doctorprofile.php?id=".$did);
        
    
?>