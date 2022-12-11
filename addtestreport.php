<?php include('dbconn.php'); ?>
<?php include('session.php'); ?>
<?php
if (isset($_POST['addtestreport']) && isset($_FILES['image'])) {
    // echo "<pre>";
    // print_r($_POST);
    // print_r($_FILES);
    // echo "</pre>";
    // echo $user_id;
    $precription_id = $_POST['prescription_id'];
    $test_id = $_POST['test_id'];
    $result = mysqli_real_escape_string($conn,$_POST['result']);
    $findvalue = mysqli_real_escape_string($conn,$_POST['findvalue']);
	$normalvalue = mysqli_real_escape_string($conn,$_POST['normalvalue']);
    $whendidtest = mysqli_real_escape_string($conn,$_POST['whendidtest']);
    $img_name = $_FILES['image']['name'];
	$img_size = $_FILES['image']['size'];
	$tmp_name = $_FILES['image']['tmp_name'];
	$error = $_FILES['image']['error'];
    if ($error === 0) {
	
		$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
		$img_ex_lc = strtolower($img_ex);

		$allowed_exs = array("jpg", "jpeg", "png"); 
		if (in_array($img_ex_lc, $allowed_exs)) {
			$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
			$img_upload_path = 'img/'.$new_img_name;
			move_uploaded_file($tmp_name, $img_upload_path);

			$sql = "INSERT INTO testreport(prescription_id,test_id,hospital_id,result,image,reportdate,findvalue,normalvalue,whendidtest) 
				        VALUES($precription_id,$test_id,$user_id,'$result','$new_img_name',CURRENT_DATE,'$findvalue','$normalvalue','$whendidtest')";
				mysqli_query($conn, $sql);
                header("location:hosprescriptionview.php?id=".$precription_id);
			}else {
                header("location:hosprescriptionview.php?id=".$precription_id);
			}
	}else {
		$sql = "INSERT INTO testreport(prescription_id,test_id,hospital_id,result,reportdate,findvalue,normalvalue,whendidtest) 
				        VALUES($precription_id,$test_id,'$user_id','$result',CURRENT_DATE,'$findvalue','$normalvalue','$whendidtest')";
				mysqli_query($conn, $sql);
        header("location:hosprescriptionview.php?id=".$precription_id);
	}

}
?>
