<?php include('dbconn.php'); ?>
<?php include('session.php'); ?>
<?php
    $patient_row = "";
    if(isset($_POST['go'])){
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        $query = "SELECT * from post where content like '%$search%' order by post_id DESC";
        $query_run = mysqli_query($conn, $query);
        if($query_run->num_rows > 0){
            header("location:searchqu.php?search=".$search);
        }else{
            header("location:home.php");
        }
    }
?> 