<?php
include('dbconn.php');
session_start();
if (!isset($_SESSION['id'])){
header('location:index.php');
}
$member_row ="";
// $fullname = "";

$user_id=$_SESSION['id'];
$user_type = $_SESSION['radio'];
if($user_type=="Patient"){
    $member_query = mysqli_query($conn,"select * from patient where p_nid = '$user_id'");
    $member_row = mysqli_fetch_array($member_query);
    $fullname = $member_row['p_nid'];
}else if($user_type=="Doctor"){
    $member_query = mysqli_query($conn,"select * from doctor where d_nid = '$user_id'");
    $member_row = mysqli_fetch_array($member_query);
    $fullname = $member_row['d_nid'];
}else{
    $member_query = mysqli_query($conn,"select * from hospital where hospital_id = '$user_id'");
    $member_row = mysqli_fetch_array($member_query);
    // $fullname = $member_row['d_nid'];

}

?>