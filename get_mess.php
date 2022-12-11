<?php 

    include("dbconn.php");
    include('session.php');
  
    if(isset($_SESSION['id'])){
        
        $incoming_id = $_SESSION['id'];
        $outgoing_id =  $_POST['outgoing_id'];
        
        $output = "";
        if($user_type=='Patient'){
            $sql = "SELECT * FROM message where p_nid = $incoming_id and d_nid = $outgoing_id ORDER BY message_id ";
        }else{
            $sql = "SELECT * FROM message where d_nid = $incoming_id and p_nid = $outgoing_id ORDER BY message_id ";
        }
        
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['sender'] === $user_id){
                    $output .= '
                            <br>
                            <div class="chat1 incoming">
                                <div class="details">
                                    <p>'. $row['message_content'] .'</p>
                                </div>
                            </div>
                            <br>    ';
                }else{
                    $output .= '
                            <br>
                            <div class="chat2 outgoing">
                                
                                <div class="details">
                                    <p>'. $row['message_content'] .'</p>
                                </div>
                            </div>
                            <br>    ';
                                // <img src="php/images/'.$row['img'].'" alt="">
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>

