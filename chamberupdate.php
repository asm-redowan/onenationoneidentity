<?php
    include('dbconn.php');
    include('session.php');

    if(isset($_POST['updatecham']))
    {   
        $updatelocation = trim($_POST['updatelocation']," ");
        $updatestart = $_POST['updatestart'];
        $updateend  = $_POST['updateend'];
        $updatedate = $_POST['updatedate'];
        $location = trim($_POST['location']," ");
        $start = $_POST['start'];
        $end  = $_POST['end'];
        $day = $_POST['day'];

        $query = mysqli_query($conn,"SELECT * FROM doctorchamber where d_nid = '$user_id' and start_time = '$start' and end_time ='$end' and day = '$day'");
        $check = mysqli_fetch_array($query);
        if($check){
            header("location:doctorprofile.php?id=".$user_id);
        }
        

        $query_run = mysqli_query($conn, "UPDATE doctorchamber SET location_='$updatelocation', start_time='$updatestart', end_time='$updateend', day='$updatedate' WHERE d_nid = '$user_id' and start_time = '$start' and end_time = '$end' and day = '$day' and location_ = '$location' ");

        if($query_run)
        {
            
            header("Location:doctorprofile.php?id=".$user_id);
            
            
        }
        else
        {
            header("Location:doctorprofile.php?id=".$user_id);
            
        }
    }
?>