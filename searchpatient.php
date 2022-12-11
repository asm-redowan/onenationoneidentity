<?php include('dbconn.php'); ?>
<?php include('session.php'); ?>
<?php
    $patient_row = "";
    if(isset($_POST['go'])){
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        $go = $_POST['go'];
        if(strlen($search)==9){
            $query = mysqli_query($conn,"SELECT * from person inner join patient on person.nid = patient.p_nid inner join gender on person.gender = gender.gender_id where nid = '$search'");
            $patient_row = mysqli_fetch_array($query);
            if($patient_row){
                header("location:docseepatient.php?id=".$patient_row['nid']."&a=m");
            }
        }
        if(strlen($search)==28){
            $query = mysqli_query($conn,"SELECT * from person inner join patient on person.nid = patient.p_nid inner join gender on person.gender = gender.gender_id where finger_print  = '$search'");
            $patient_row = mysqli_fetch_array($query);
            if($patient_row){
                header("location:docseepatient.php?id=".$patient_row['nid']."&a=m");
            }
        }
        if(strlen($search)==32){
            $query = mysqli_query($conn,"SELECT * from person inner join patient on person.nid = patient.p_nid inner join gender on person.gender = gender.gender_id where retina_print = '$search'");
            $patient_row = mysqli_fetch_array($query);
            if($patient_row){
                header("location:docseepatient.php?id=".$patient_row['nid']."&a=m");
            }
        }
        if($patient_row==NULL || $patient_row['nid']==$user_id ){
            header("location:patient.php");
        }
    }
?>