<?php
    include("dbconn.php");
    include("session.php");

    
    if(isset($_POST['sendrate'])){
        // echo "<pre>";
        // print_r($_POST);
        // echo "<pre>";
        $doc_id = $_POST['dnid'];
        $rating = $_POST['rating'];
        $review = mysqli_real_escape_string($conn,$_POST['review']);
        mysqli_query($conn,"insert into reviewfordoctor(p_nid,d_nid,rating,review) values('$user_id','$doc_id','$rating','$review')");
        header("location:doctorprofile.php?id=".$doc_id);
        // header("location:home.php");

    }
    

?>