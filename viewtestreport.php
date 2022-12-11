
<?php include('dbconn.php'); ?>
<?php include('session.php'); ?>
<?php
    // print_r($_GET);
    $prescription_id = $_GET['id'];
    $test_id = $_GET['test_id'];
    $report_serial = $_GET['serial'];

    
    $query = mysqli_query($conn,"select * from testreport inner join test on testreport.test_id = test.test_id inner join prescription on testreport.prescription_id = prescription.prescription_id  where serial = '$report_serial'");
    $testreport = mysqli_fetch_array($query);
    
    $pid = $testreport['p_nid'];
    $did = $testreport['d_nid'];
    $hosid = $testreport['hospital_id'];
    $query = mysqli_query($conn,"select name from person where nid = '$pid'");
    $patientname = mysqli_fetch_array($query);
    $query = mysqli_query($conn,"select name from person where nid = '$did'");
    $doctorname = mysqli_fetch_array($query);
    $query = mysqli_query($conn,"select hospital_name from hospital where hospital_id = '$hosid'");
    $hospitalname = mysqli_fetch_array($query);
    $query = mysqli_query($conn,"select giving from doctorgivetest where prescription_id = '$prescription_id' and test_id = '$test_id'");
    $docgiving = mysqli_fetch_array($query);
    if($testreport['childbirth_id']!= "N/A"){
      $childid = $testreport['childbirth_id'];
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
      <link href = "/bootstrap/css/bootstrap.min.css" rel = "stylesheet">
      <script src = "/scripts/jquery.min.js"></script>
      <script src = "/bootstrap/js/bootstrap.min.js"></script>

    <!------ Include the above in your HEAD tag ---------->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <title>OneNationOneIdentity</title>
    <?php include('dbconn.php'); ?>
	  <?php include('session.php'); ?>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">
    <link rel="stylesheet" href="css/myprofile.css"/>
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
<?php if($user_type != "Hospital"){?>
<?php
$query = mysqli_query($conn,"SELECT * from person inner join gender on person.gender = gender.gender_id where person.nid ='$user_id'");
$my = mysqli_fetch_array($query);
?>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="home.php">OneNationOneIdentity</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <?php
              
              if($user_type=='Doctor'){

            ?>
            
            <li class="nav-item">
              <a class="nav-link" href="patient.php">Patient</a>
            </li>
            <?php } else {?>
            <li class="nav-item ">
              <a class="nav-link" href="doctor.php">Doctor</a>
            </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link" href="hospital.php">Hospital</a>
            </li>
            <?php if($user_type == "Patient"){?>
              <li class="nav-item">
              <a class="nav-link" href="myprescription.php">Prescription</a>
            </li>
            <?php } ?>
            
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="message.php?id=0">message</a>
            </li>
            <?php
              
              if($user_type=='Doctor'){

            ?>
            <li class="na1">
              <!-- $query = mysqli_query($conn) -->
              <a class="nav-link" href="doctorprofile.php?id=<?php echo $user_id; ?>">
                <div class="divm">
                  <div class="divname" style="font-size: 12px;">
                    <?php echo $my['name']; ?>
                  </div>
                  <div class="divid" style="font-size: 7px;">
                  <?php echo $my['nid']; ?>
                  </div>
                </div>
              </a>
            </li>
            <?php } else {?>
            <li class="na1">
              <!-- $query = mysqli_query($conn) -->
              <a class="nav-link" href="myprofile.php?id=<?php echo $user_id; ?>">
                <div class="divm">
                  <div class="divname" style="font-size: 12px;">
                    <?php echo $my['name']; ?>
                  </div>
                  <div class="divid" style="font-size: 7px;">
                  <?php echo $my['nid']; ?>
                  </div>
                </div>
              </a>
            </li>
            <?php } ?>
            <li class="na2">
              <a class="nav-link" href="logout.php">logout</a>
            </li>
			
          </ul>
		  <div class="ml-auto my-2 my-lg-0">
<div class="section" id="b-section-navbar-search-form" name="Navbar: search form"><div class="widget BlogSearch" data-version="2" id="BlogSearch1">

</div></div>
<!-- </div> -->
        </div>
      </div>
    </nav>

    <?php }else{ ?>
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

      <?php } ?> 



<div class="container1">
    <h1>Test </h1>
    <br>
    <br>
    <div class="row" style="left: 0px;right: 0px; margin:auto; position:relative; width: 100%;">
        
             <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3">Test Name</span>
                  </div>
                  <input type="text" class="form-control" value="<?php echo $testreport['test_name']?>" disabled>
              </div> 
       
    </div>
    <!-- <br> -->
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
        if($testreport['childbirth_id']== "N/A"){
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
    <!-- <br> -->
    <?php 
        if($testreport['childbirth_id']!= "N/A"){
      ?>
    <div class="row" style="left: 0px;right: 0px; margin:auto; position:relative; width: 100%;">
        
             <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3">Patient Name</span>
                  </div>
                  <input type="text" class="form-control" value="<?php echo $childname['name']?>" disabled>
              </div> 
       
    </div>
    <?php } ?>



    <div class="row" style="left: 0px;right: 0px; margin:auto; position:relative; width: 100%;">
        
             <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3">Hospital Name</span>
                  </div>
                  <input type="text" class="form-control" value="<?php echo $hospitalname['hospital_name']?>" disabled>
              </div> 
       
    </div>

    <div class="row">
      <div class="col-sm-6" align="center">
          <div class="card">
          
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon3">Doctor Given Test</span>
              </div>
              
             <input type="text" class="form-control" value="<?php echo $docgiving['giving']; ?>" disabled>
          </div>
              
          
      
          </div>
      </div>
      
      <div class="col-sm-6" align="center">
          <div class="card">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3">Report Date</span>
                  </div>
               
                <input type="text" class="form-control" value="<?php echo $testreport['reportdate']?>" disabled>
                
              </div>        
          </div>
      </div>
      
    </div>




    <div class="row">
      <div class="col-sm-6" align="center">
          <div class="card">
          
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon3">Test after and before</span>
              </div>
              <?php if($testreport['whendidtest']){ ?>
                <input type="text" class="form-control" value="<?php echo $testreport['whendidtest']?>" disabled>
              <?php }else{ ?>
                <input type="text" class="form-control" value="<?php echo 'NILL'; ?>" disabled>
              <?php } ?>
          </div>
              
          
      
          </div>
      </div>
      
      <div class="col-sm-6" align="center">
          <div class="card">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3">Normal Value</span>
                  </div>
                <?php if($testreport['normalvalue']){ ?>
                    <input type="text" class="form-control" value="<?php echo $testreport['normalvalue']?>" disabled>
                <?php }else{ ?>
                    <input type="text" class="form-control" value="<?php echo 'NILL'; ?>" disabled>
                <?php } ?>
              </div>        
          </div>
      </div>
      


    </div>
    <div class="row">
      <div class="col-sm-6" align="center">
          <div class="card">
          
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon3">Find Value</span>
              </div>
              <?php if($testreport['findvalue']){ ?>
                <input type="text" class="form-control" value="<?php echo $testreport['findvalue']?>" disabled>
              <?php }else{ ?>
                <input type="text" class="form-control" value="<?php echo 'NILL'; ?>" disabled>
              <?php } ?>
          </div>
              
          
      
          </div>
      </div>
      
      <div class="col-sm-6" align="center">
          <div class="card">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3">Result</span>
                  </div>
               
                <input type="text" class="form-control" value="<?php echo $testreport['result']?>" disabled>
                
              </div>        
          </div>
      </div>

    </div>
    <div class="row">
            
        <?php if($testreport['image']){ ?>
        <img src="img/<?php echo $testreport['image']; ?>" class = "img-responsive" alt = "Online Training" style="left: 0px;right: 0px; margin:auto; position:relative; width: 100%;"/>
        <?php } ?>
    </div>
    
    
    
</div>





</body>
</html>
