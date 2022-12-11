
<?php include('dbconn.php'); ?>
<?php include('session.php'); ?>
<?php
  if($user_type !="Hospital"){
    header("location:index.php");
  }
?>
<?php
    $search = $_GET['id'];
    $query = mysqli_query($conn,"SELECT * from person inner join patient on person.nid = patient.p_nid inner join gender on person.gender = gender.gender_id where nid = '$search'");
    $patient_row = mysqli_fetch_array($query);
?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OneNationOneIdentity</title>
    <!-- <?php include('dbconn.php'); ?>
	  <?php include('session.php'); ?> -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/blog-home.css" rel="stylesheet">
    <link rel="stylesheet" href="css/net.css"/>
    <link rel="stylesheet" href="css/myprofile.css"/>


<style>
  .pic{
        border: 1px solid black;
        width: 150px;
        height: 150px;
        border-radius: 50%;

      }
  .card{
    border: 1px solid gray;
    border-radius: 5px;

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
		  <!-- <div class="ml-auto my-2 my-lg-0">
              <div class="section" id="b-section-navbar-search-form" name="Navbar: search form"><div class="widget BlogSearch" data-version="2" id="BlogSearch1">
              </div>
            </div> -->
<!-- </div> -->
        </div>
      </div>
    </nav>



    <div class="container">
    <div class="main-body">
    
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                  <img src="img/<?php echo $patient_row['image']; ?>" class="pic">
                    <div class="mt-3">
                      <h4>
                        <?php echo $patient_row['name']; ?>
                      </h4>
                      <p class="text-secondary mb-1">Gender : <?php echo $patient_row['gender_name']; ?></p>  
                      
                      <p class="text-secondary mb-1">DOB: <?php echo $patient_row['dob']; ?></p>
                      <p class="text-secondary mb-1">Occupation : <?php echo $patient_row['occupation']; ?></p>
                      <p class="text-secondary mb-1">Blood : <?php echo $patient_row['blood']; ?></p>
                      <p class="text-secondary mb-1">Religion : <?php echo $patient_row['religion']; ?></p>
                      
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 >Child</h6>
                    
                  </li>
                  <?php 
                    $nid = $patient_row['nid'];
                    $query = mysqli_query($conn,"SELECT * from patientbelow18 where guardian_nid  = '$nid' ");
                    while($below18 = mysqli_fetch_array($query)){
                  ?>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <a href="hosbelow18patient.php?gid=<?php echo $nid; ?>&child_id=<?php echo $below18['childbirth_id']; ?>"><?php echo $below18['name'] ?></a>
                  </li>
                  <?php } ?>
                  
                  
                </ul>
              </div>
             
            </div>
            <div class="col-md-8">              
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Serial</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      Prescription
                    </div>
                  </div>
                  <?php
                    $query = mysqli_query($conn,"select * from prescription  where p_nid = '$nid' and childbirth_id = 'N/A'");
                    $c = 1;
                    while($pre = mysqli_fetch_array($query)){ 
                  ?>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0"><?php echo $c; ?></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      Prescription
                    </div>
                    <div class="col-sm-9 text-secondary">
                     <a style="text-decoration:none;" href="hosprescriptionview.php?id=<?php echo $pre['prescription_id']; ?>"> <button type="button" class="btn btn-primary"> view </button></a>
                    </div>
                  </div>
                  
                  <?php $c++; } ?>
                  <hr>
                  
                  
                </div>
              </div>
              

              



            </div>
          </div>

        </div>
    </div>
    
  </body>

</html>
