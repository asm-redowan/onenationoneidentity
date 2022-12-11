<?php 
    include('dbconn.php');
    if(isset($_POST['add'])){
        $prescription_id = $_POST['prescription_id'];
        $drug_name = strtolower($_POST['drug_name']);
        $drug_type = $_POST['type'];
        $power = $_POST['drug_power'];
        $description =$_POST['description'];
        $query = mysqli_query($conn,"SELECT * from drug where prescription_id = '$prescription_id' and drug_name = '$drug_name'");
        $drug=mysqli_fetch_array($query);
        if($drug){
            header("location:prescription.php?preid=".$prescription_id);
        }
        mysqli_query($conn,"INSERT INTO drug(prescription_id,drug_name,description,power,drug_type) values ($prescription_id,'$drug_name','$description','$power','$drug_type')");
        header("location:prescription.php?preid=".$prescription_id);
    }
  ?>