<?php 
    include ('dbconn.php');
    include('session.php');

    $location=$_GET['location'];
    $start = $_GET['start_time'];
    $end = $_GET['end_time'];
    $day = $_GET['day'];

    mysqli_query($conn,"delete from doctorchamber where d_nid = '$user_id' and start_time = '$start' and end_time = '$end' and day = '$day' and location_ = '$location'");
    header("location:doctorprofile.php?id=".$user_id);


?>