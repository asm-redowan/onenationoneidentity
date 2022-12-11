
<?php          
    include("dbconn.php");
    include("session.php");
    if (isset($_POST['comment'])){
        $comment_content = mysqli_real_escape_string($conn,$_POST['comment_content']);
        // $comment_content = str_replace("'","\'",$comment_content);
        $post_id=$_POST['id'];
        if($user_type=="Patient"){
            mysqli_query($conn,"insert into commentpost (p_nid,post_id,content,date,time) values ('$user_id','$post_id','$comment_content',CURRENT_DATE,CURRENT_TIME)");
        }else{
            mysqli_query($conn,"insert into commentpost (p_nid,d_nid,post_id,content,date,time) values ('$user_id','$user_id','$post_id','$comment_content',CURRENT_DATE,CURRENT_TIME)");
        }
        header("location:home.php#".$_POST['id']);
    }
?>