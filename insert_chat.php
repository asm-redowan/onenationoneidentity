<?php
    include("dbconn.php");
    include("session.php");
    $message_content = mysqli_real_escape_string($conn, $_POST['message']);
    $incoming_id =$_POST['incoming_id'];
    $outgoing_id = $_POST['outgoing_id'];
    
    if(isset($_SESSION['id'])){
        if($user_type == 'Patient'){
            mysqli_query($conn,"insert into message(message_content,datetime,p_nid,d_nid,sender) values('$message_content',NOW(),'$incoming_id','$outgoing_id','$incoming_id')");

        }else{
            mysqli_query($conn,"insert into message(message_content,datetime,d_nid,p_nid,sender) values('$message_content',NOW(),'$incoming_id','$outgoing_id','$incoming_id')");

        }
    }
    // echo "<pre>";
    // print_r ($_POST);
    // echo "</pre>";

?>