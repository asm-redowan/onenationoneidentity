
<?php
    session_start();
    include('dbconn.php');
    include('session.php');          
    if (isset($_POST['post'])){
        $post_content  = $_POST['post_content'];
        $post_content = str_replace("'","\'",$post_content);
        $category = $_POST['browser'];
        $category = str_replace("'","\'",$category);
        if($user_type=="Patient"){
            mysqli_query($conn,"insert into post (content,category,date,p_nid,time) values ('$post_content','$category',CURRENT_DATE,'$user_id',CURRENT_TIME) "); 
        }else{
            mysqli_query($conn,"insert into post (content,category,date,p_nid,d_nid,time) values ('$post_content','$category',CURRENT_DATE,'$user_id','$user_id',CURRENT_TIME) ");
        }    
                        //header('location:test3.php');
    }
?>
