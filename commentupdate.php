<?php
    include('dbconn.php');
    include('session.php');

    if(isset($_POST['updatecom']))
    {   
        $cid = $_POST['com_id'];
        $pid = $_POST['pos_id'];
        
        $updateans = mysqli_real_escape_string($conn,$_POST['updateans']);
        // $updateans = str_replace("'","\'",$updateans);
        

        $query = "UPDATE commentpost SET content='$updateans' WHERE comment_id='$cid' and post_id='$pid' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:home.php#".$cid.$pid);
            
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>