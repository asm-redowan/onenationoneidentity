
<?php          
    include("dbconn.php");
    include("session.php");
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    if (isset($_POST['insertbelow18'])){
        $birth_id = $_POST['birth_id'];
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $query = mysqli_query($conn,"select * from person where birth_id  ='$birth_id'");
        $birth = mysqli_fetch_array($query);
        $query = mysqli_query($conn,"select * from patientbelow18 where childbirth_id  ='$birth_id'");
        $below = mysqli_fetch_array($query);
        if($birth == NULL && $below == NULL && strlen($birth_id)== 12){
            mysqli_query($conn,"insert into patientbelow18 (guardian_nid ,childbirth_id,name,dob) values ('$user_id','$birth_id','$name','$dob')");
            header("location:myprofile.php?id=".$user_id);
        }else{
            header("location:myprofile.php?id=".$user_id);
        }
        
        
        

    }
?>