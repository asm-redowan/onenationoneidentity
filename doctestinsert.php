<?php 
    include('dbconn.php');
    if(isset($_POST['testadd'])){
        $prescription_id = $_POST['prescription_id'];
        $test_id = $_POST['test'];
        $query = mysqli_query($conn,"select * from doctorgivetest where prescription_id = '$prescription_id' and test_id= '$test_id'");
        $pre = mysqli_fetch_array($query);
        if($pre){
            header("location:prescription.php?preid=".$prescription_id);
        }
        mysqli_query($conn,"INSERT INTO doctorgivetest(prescription_id,test_id,giving) values ($prescription_id,'$test_id',CURRENT_DATE)");
        header("location:prescription.php?preid=".$prescription_id);
    }
  ?>