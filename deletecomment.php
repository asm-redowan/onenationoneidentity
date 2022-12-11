<?php 
    include ('dbconn.php');
    $id=$_GET['id'];
    $comment_id =$_GET['comment_id'];

    mysqli_query($conn,"delete from commentpost where post_id='$id' and comment_id='$comment_id'");
    header ('location:home.php');

?>