    <?php
        include ('dbconn.php');
        include('session.php');
        $query = mysqli_query($conn,"SELECT * from hospital where docreg = '0' and hospital_id = '$user_id'");
        $check=mysqli_fetch_array($query);

        if(isset($_POST['submit'])){
            $notice = mysqli_real_escape_string($conn,$_POST['notice']);
            if($check && $notice){
                mysqli_query($conn,"update hospital set docreg = '1', docregtext ='$notice' where hospital_id = '$user_id'");
            }else{
                mysqli_query($conn,"update hospital set docreg = '0' where hospital_id = '$user_id'");

            }
        }
       
        header("location:hospitaldoctor.php");

    ?>

        
