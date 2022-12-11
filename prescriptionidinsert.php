
<?php          
    include("dbconn.php");
    include("session.php");
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    if(isset($_POST['add'])){
                    
        $pid=$_POST['pid'];
        $did=$_POST['did'];
        $childbirth_id = $_POST['childbirth_id'];
        echo $childbirth_id;
        ///// new ///
        mysqli_query($conn,"DELETE FROM appointment where p_nid = '$pid' and d_nid = '$did'");
        //////////

        mysqli_query($conn,"Insert INTO prescription(p_nid,d_nid,childbirth_id) values('$pid','$did','$childbirth_id')");
        $query = mysqli_query($conn,"select max(prescription_id) as p from prescription where p_nid = '$pid' and d_nid = '$did'");
        $prescription_id = mysqli_fetch_array($query);
        $preid = $prescription_id['p'];
        header("location:prescription.php?preid=".$preid);

      }
?>