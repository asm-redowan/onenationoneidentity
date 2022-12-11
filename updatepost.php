<?php
    include('dbconn.php');
    include('session.php');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['updatequestion_id'];
        
        $updatequestion = mysqli_real_escape_string($conn,$_POST['updatequestion']);
        // $updatequestion = str_replace("'","\'",$updatequestion);
        

        $query = "UPDATE post SET content='$updatequestion' WHERE post_id='$id'  ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:home.php#post".$id);
            
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>