<?php include('dbconn.php'); ?>
<?php include('session.php'); ?>
<?php
  if($user_type !="Hospital"){
    header("location:index.php");
  }
?>
<?php
    // include('dbconn.php');
    // print_r($_GET);
    $prescription_id = $_GET['id'];
    $query = mysqli_query($conn,"select * from prescription where prescription_id = '$prescription_id'");
    $prescription = mysqli_fetch_array($query);
    // $query = mysqli_query($conn,"select * from prescription inner join testreport on prescription.prescription_id = testreport.prescription_id where prescription_id = '$prescription_id'");
    // $prescriptionfull = mysqli_fetch_array($query);
    $pid = $prescription['p_nid'];
    $did = $prescription['d_nid'];
    $query = mysqli_query($conn,"select name from person where nid = '$pid'");
    $patientname = mysqli_fetch_array($query);
    $query = mysqli_query($conn,"select name from person where nid = '$did'");
    $doctorname = mysqli_fetch_array($query);
    // echo "<pre>";
    // print_r($doctorname);
    // echo "</pre>";
    // echo "<pre>";
    // print_r($prescription);
    // echo "</pre>";
    if($prescription['childbirth_id']!= "N/A"){
      $childid = $prescription['childbirth_id'];
      $query = mysqli_query($conn,"select name from patientbelow18 where childbirth_id = '$childid'");
      $childname = mysqli_fetch_array($query);
    }

?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!------ Include the above in your HEAD tag ---------->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <title>OneNationOneIdentity</title>
    

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/myprofile.css"/> -->
    <link rel="stylesheet" href="new/css.css"/>
    <style>
      .container1{
          border: 1px solid gray;
          padding: 20px;
          top:70px;
          width: 75%;
          left:0px;
          right:0px;
          margin:auto;
          position:relative;
      }
      .card{
          border:0px;
          background:none;
      }
      .drug{
          left:0px;
          right:0px;
          margin:auto;
          position: relative;
      }

    </style>

  </head>
<body>
<?php
$query = mysqli_query($conn,"SELECT * from person inner join gender on person.gender = gender.gender_id where person.nid ='$user_id'");
$my = mysqli_fetch_array($query);
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="hospitalhome.php">OneNationOneIdentity</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            
            <li class="nav-item">
              <a class="nav-link" href="hospitaldoctor.php">Doctor</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="hospatient.php">Patient</a>
            </li>
         
            <li class="nav-item">
              <a class="nav-link" href="index.php">logout</a>
            </li>
			
          </ul>
		 
        </div> 
      </div>
    </nav>
	

    
<!-- report add -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Add Report </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
      
                </div>

                <form action="addtestreport.php" method="POST" enctype="multipart/form-data">

                    <div class="modal-body">

                        <input type="hidden" name="prescription_id" id="prescription_id">
                        <input type="hidden" name="test_id" id="test_id">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">When did test after eat or not:</label>
                            <input type="text" name="whendidtest" id="result" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Find Value:</label>
                            <input type="text" name="findvalue" id="result" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Normal Value:</label>
                            <input type="text" name="normalvalue" id="result" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Result:</label>
                            <input type="text" name="result" id="result" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label"> test file:</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <!-- <div class="form-group">
                            <input type="text" name="updateend" id="updateend" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="updatedate" id="updatedate" class="form-control">
                        </div> -->

                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="addtestreport" class="btn btn-primary">Add report</button>
                    </div>
                </form>

            </div>
        </div>
    </div>



<div class="container1">
    <h1>Prescription</h1>
    <br>
    <br>
    <div class="row">
    <div class="col-sm-6" align="center">
        <div class="card">
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">Doctor Name</span>
            </div>
            <input type="text" class="form-control" value="<?php echo $doctorname['name']?>" disabled>
        </div>
            
        
     
        </div>
    </div>
    <?php 
        if($prescription['childbirth_id']== "N/A"){
      ?>
    <div class="col-sm-6" align="center">
        <div class="card">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Patient Name</span>
                </div>
                <input type="text" class="form-control" value="<?php echo $patientname['name']?>" disabled>
            </div>        
        </div>
      </div>
      <?php }else{ ?>
        <div class="col-sm-6" align="center">
        <div class="card">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Guardian Name</span>
                </div>
                <input type="text" class="form-control" value="<?php echo $patientname['name']?>" disabled>
            </div>        
        </div>
      </div>
      <?php } ?>
    </div>
    
    <?php 
        if($prescription['childbirth_id']!= 'N/A'){
      ?>
      <br>
    <div class="row" style="left: 0px;right: 0px; margin:auto; position:relative; width: 100%;">
        <!-- <div class="card"> -->
             <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3">Patient Name</span>
                  </div>
                  <input type="text" class="form-control" value="<?php echo $childname['name']?>" disabled>
              </div> 
        <!-- </div> -->
    </div>
    <?php } ?>

    <br>
    <div class="row">
    <div class="col-sm-6" align="center">
        <div class="card">
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">Refer</span>
            </div>
            <?php 
              $refnid = $prescription['doctor_ref'];
              $query = mysqli_query($conn,"select * from doctor inner join prescription on prescription.doctor_ref = doctor.d_nid inner join person on person.nid = doctor.d_nid inner join dmdc on doctor.dmdc_id = dmdc.dmdc_id where prescription.doctor_ref = '$refnid'");
              $doc = mysqli_fetch_array($query); 
              if($doc){
               
            ?>
            <input type="text" class="form-control" value="<?php echo $doc['name']."(".$doc['specialist'].")";?>" disabled>
            <?php }else{ ?>
              <input type="text" class="form-control" width="100%" value="<?php echo "NILL";?>" disabled>
              <?php } ?>
        </div>
            
        
     
        </div>
    </div>
    <div class="col-sm-6" align="center">
        <div class="card">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Remarks</span>
                </div>
                <input type="text" class="form-control" value="<?php echo $prescription['remarks']?>" disabled>
            </div>
        <!-- <p class="card-text">Patient Name: <?php echo $patientname['name']?></p> -->
        
        </div>
    </div>
    </div>
    <br>
    <div class="row">
        
            <div class="drug" >
                <h3>Drug </h3>
            </div>
       
    </div>
    <br>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Drug Name</th>
            <th scope="col">Power</th>
            <th scope="col">Drug Type</th>
            <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
    <?php
        $query = mysqli_query($conn,"select * from drug where prescription_id = '$prescription_id'");
        while($pre = mysqli_fetch_array($query)){
     ?>
            <tr>
            <td ><?php echo $pre['drug_name']; ?></td>
            <td><?php echo $pre['power']; ?></td>
            <td><?php echo $pre['drug_type']; ?></td>
            <td><?php echo $pre['description']; ?></td>
            </tr>
        

    <?php } ?>
    </tbody>
    </table>

    
    
    <!-- <hr> -->
    

    <div class="row">
        
            <div class="drug" >
                <h3>Detect Disease </h3>
            </div>
       
    </div>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">Disease Name</th>
            
            </tr>
        </thead>
        <tbody>
    <?php
        $query = mysqli_query($conn,"select * from detectdisease where prescription_id = '$prescription_id'");
        while($pre = mysqli_fetch_array($query)){
     ?>
            <tr>
            <td ><?php echo $pre['disease_name']; ?></td>
            
            </tr>
        

    <?php } ?>
    </tbody>
    </table>

    


    <div class="row">
        
            <div class="drug" >
                <h3> Test </h3>
            </div>
       
    </div>

    <table class="table">
        <thead>
            <tr>
              <th scope="col" style="display:none ;">Prescription ID</th>
              <th scope="col">Test ID</th>
              <th scope="col">Test Name</th>
              <th scope="col">Given Date</th>
              <th scope="col">Result</th>
              <th scope="col">View</th>
              <th scope="col">Add Report</th>
              <th scope="col">Delete Report</th>
            </tr>
        </thead>
        <tbody>
    <?php
        $query = mysqli_query($conn,"select * from doctorgivetest inner join test on doctorgivetest.test_id = test.test_id  where prescription_id = '$prescription_id'");
        // $query = mysqli_query($conn,"select doctorgivetest.test_id as test_id,test_name,doctorgivetest.giving as giving, result from doctorgivetest inner join test on doctorgivetest.test_id = test.test_id left join testreport on doctorgivetest.prescription_id = testreport.prescription_id where doctorgivetest.prescription_id = '$prescription_id'");
        while($pre = mysqli_fetch_array($query)){
            $preid = $pre['prescription_id'];
            $testid = $pre['test_id'];
            $query2 = mysqli_query($conn,"select * from testreport WHERE prescription_id = '$preid' and test_id = '$testid'");
            if($query2->num_rows > 0){
                while($testr = mysqli_fetch_array($query2)){
        ?>
            <tr>
            
              <td style="display:none ;"><?php echo $prescription_id; ?></td>
              <td ><?php echo $pre['test_id']; ?></td>
              <td><?php echo $pre['test_name']; ?></td>
              <td><?php echo $pre['giving']; ?></td>
              <td><?php echo $testr['result'] ?></td>
              <!-- <td><?php echo "NILL" ?></td> -->
            
              <td><a style="text-decoration:none;" href="viewtestreport.php?id=<?php echo $pre['prescription_id']; ?>&test_id=<?php echo $pre['test_id']; ?>&serial=<?php echo $testr['serial']; ?>"> <button type="button" class="btn btn-primary"> view </button></a></td>
              <td><button type="button" class="btn btn-success editbtn">Add Report</button></td>
              <?php if($testr['hospital_id']==$user_id){ ?>
              <td><a style="text-decoration:none;" href="deletereport.php?serial=<?php echo $testr['serial']; ?>&id=<?php echo $pre['prescription_id']; ?>"> <button type="button" class="btn btn-danger"> Delete </button></a></td>
              <?php } else{?>
                <!-- <td><?php echo "No Delete"; ?></td> -->
              <?php } ?>
            </tr>
        

    <?php } } else{ ?>

             <tr>
            
              <td style="display:none ;"><?php echo $prescription_id; ?></td>
              <td ><?php echo $pre['test_id']; ?></td>
              <td><?php echo $pre['test_name']; ?></td>
              <td><?php echo $pre['giving']; ?></td>
              <td><?php echo "NILL" ?></td>
              <td><?php echo "NILL" ?></td>
              
            
              <!-- <td><a style="text-decoration:none;" href="viewtestreport.php?id=<?php echo $pre['prescription_id']; ?>&test_id=<?php echo $pre['test_id']; ?>"> <button type="button" class="btn btn-primary"> view </button></a></td> -->
              <td><button type="button" class="btn btn-success editbtn">Add Report</button></td>
              <td><?php echo "NILL" ?></td>

            </tr>

   <?php }

    }?>
    </tbody>
    </table>

    
    <br>
      

</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#prescription_id').val(data[0]);
                $('#test_id').val(data[1]);
                
               
            });
        });
    </script>


</body>
</html>
