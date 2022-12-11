
<?php          
    include("dbconn.php");
    include("session.php");
    if (isset($_POST['insertchamber'])){
        $location = $_POST['location'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $day = $_POST['day'];
        $query = mysqli_query($conn,"SELECT * FROM doctorchamber where d_nid = '$user_id' and start_time = '$start' and end_time ='$end' and day = '$day'");
        $check = mysqli_fetch_array($query);
        if($check){
            header("location:doctorprofile.php?id=".$user_id);
        }
        
        mysqli_query($conn,"insert into doctorchamber (d_nid,location_,start_time,end_time,day) values ('$user_id','$location','$start','$end','$day')");
        header("location:doctorprofile.php?id=".$user_id);

    }
?>