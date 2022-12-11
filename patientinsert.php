<?php
    print_r($_POST);
         
    include("dbconn.php");
    include("session.php");
    if (isset($_POST['submit'])){
        $nid = $_POST['nid'];
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        mysqli_query($conn,"insert into patient (p_nid,password) values ('$nid','$password')");
        header("location:personlogin.php");

    }
?>