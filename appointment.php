<?php          
    include("dbconn.php");
    include("session.php");
    $did = $_GET['dnid'];
    $pid = $_GET['pnid'];
    // echo "<pre>";
    // print_r($_GET);
    // echo "</pre>";
    mysqli_query($conn,"insert into appointment (p_nid ,d_nid,appointment,date) values ('$pid','$did','yes',NOW())");
    header("location:doctorprofile.php?id=".$did);
        
    
?>