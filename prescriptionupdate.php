<?php
    include('dbconn.php');
    include('session.php');

    if(isset($_POST['submit']))
    {   
        $a = 0;
        $prescription_id = $_POST['prescription_id'];
        $doctor_ref = $_POST['doctor_ref'];
        $remarks = mysqli_real_escape_string($conn,$_POST['remarks']);  
        $query = mysqli_query($conn,"select * from dmdc inner join doctor on doctor.dmdc_id = dmdc.dmdc_id where dmdc.dmdc_id = '$doctor_ref'");
        $doc = mysqli_fetch_array($query);
        
        if($doc){
            $doctor_ref = $doc['d_nid'];
            echo $doctor_ref;
            $query ="UPDATE prescription SET doctor_ref='$doctor_ref', remarks = '$remarks', prescription_date = CURRENT_DATE WHERE prescription_id ='$prescription_id'";
        }else{
            $query = "UPDATE prescription SET remarks = '$remarks', prescription_date = CURRENT_DATE WHERE prescription_id ='$prescription_id'";
        }
        $query_run = mysqli_query($conn, $query);
        $query = mysqli_query($conn,"select * from prescription where prescription_id ='$prescription_id'");
        $pnid = mysqli_fetch_array($query);
        header("location:docseepatient.php?id=".$pnid['p_nid']."&a=".$a);
        
    }
?>