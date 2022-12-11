<?php 
    include('dbconn.php');
    // print_r($_POST);
    if(isset($_POST['delect'])){
        $prescription_id = $_POST['prescription_id'];
        $disease_name = strtolower($_POST['disease']);
        $query = mysqli_query($conn,"select * from detectdisease where prescription_id='$prescription_id' and disease_name='$disease_name'");
        $check = mysqli_fetch_array($query);
        if($check){
            header("location:prescription.php?preid=".$prescription_id);

        }
        mysqli_query($conn,"INSERT INTO detectdisease(prescription_id,disease_name) values ($prescription_id,'$disease_name')");
        header("location:prescription.php?preid=".$prescription_id);
    }
  ?>