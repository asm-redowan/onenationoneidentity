<?php include('dbconn.php'); ?>
<?php include('session.php'); ?>
<?php
    $c1 = 1;
    $id=$_GET['id'];
    $query1 = mysqli_query($conn,"SELECT * FROM hospital where hospital_id = '$id'");
    $hospital_row = mysqli_fetch_array($query1);
    $query2 = mysqli_query($conn,"SELECT * from hospital where docreg = '0' and hospital_id = '$id'");
    $check=mysqli_fetch_array($query2);
    $query3 = mysqli_query($conn,"SELECT dmdc_id from doctor where d_nid ='$user_id'");
    $dmdc=mysqli_fetch_array($query3);
    $query4 = mysqli_query($conn,"SELECT * from docregistry where d_nid ='$user_id' and hospital_id = '$id'");
    $hoscheck=mysqli_fetch_array($query4);
    $query5 = mysqli_query($conn,"SELECT * from doctorworking where d_nid ='$user_id' and hospital_id = '$id'");
    $workingcheck=mysqli_fetch_array($query5);
    // echo $user_id;
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
    <?php include('dbconn.php'); ?>
	 

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">
    <link rel="stylesheet" href="css/myprofile.css"/>
    <link rel="stylesheet" href="new/css.css"/>
    <style>
      .pic{
        border: 1px solid black;
        width: 150px;
        height: 150px;
        border-radius: 50%;

      }
      body{
          margin-top:20px;
          color: #1a202c;
          text-align: left;
          background-color: #e2e8f0;    
      }
      .main-body {
          top: 50px;
          position:relative;
          padding: 15px;
      }
      .card {
          box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
      }

      .card {
          position: relative;
          display: flex;
          flex-direction: column;
          min-width: 0;
          word-wrap: break-word;
          background-color: #fff;
          background-clip: border-box;
          border: 0 solid rgba(0,0,0,.125);
          border-radius: .25rem;
      }

      .card-body {
          flex: 1 1 auto;
          min-height: 1px;
          padding: 1rem;
      }

      .gutters-sm {
          margin-right: -8px;
          margin-left: -8px;
      }

      .gutters-sm>.col, .gutters-sm>[class*=col-] {
          padding-right: 8px;
          padding-left: 8px;
      }
      .mb-3, .my-3 {
          margin-bottom: 1rem!important;
      }

      .bg-gray-300 {
          background-color: #e2e8f0;
      }
      .h-100 {
          height: 100%!important;
      }
      .shadow-none {
          box-shadow: none!important;
      }

    </style>

  </head>

  <body>

    <!-- Navigation -->
    
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


    


    <div class="container">
    
    <div class="row" style="top: 55px;left: 10px;right: 0px; margin:auto; position:relative; width: 100%; padding-top:10px; ">
            <?php if(!$check && $user_type == 'Doctor' && !$hoscheck && !$workingcheck){ ?>
                
                <!-- <marquee><?php echo $hospital_row['docregtext']."  "; ?>  <a href="docregister.php?id=<?php echo $user_id ?>&hosid=<?php echo $id ; ?>&dmdc=<?php echo $dmdc['dmdc_id']; ?>"><button type="button" class="btn btn-outline-primary"> Apply Now</button></a></marquee> -->
                <marquee><?php echo $hospital_row['docregtext']."  "; ?>  <a href="docregister.php?id=<?php echo $user_id ?>&hosid=<?php echo $id ; ?>&dmdc=<?php echo $dmdc['dmdc_id']; ?>"><button type="button" class="btn btn-outline-primary"> Apply Now</button></a></marquee>
                
            <?php } ?>
            <!-- <div class="input-group mb-3">
                    
                </div>  -->
        
    </div> 
  

    <div class="main-body">
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <!-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150"> -->
                    <img src="img/hospital1.png" class="pic">
                    <div class="mt-3">
                      <h4>
                        <?php echo $hospital_row['hospital_name']; ?>
                      </h4>
                    </div>
                  </div>
                </div>
              </div>
              <?php if($user_id == $id){ ?>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 >My Child</h6>
                    
                  </li>
                  <?php 
                    $query = mysqli_query($conn,"SELECT * from patientbelow18 where guardian_nid  = $user_id ");
                    while($below18 = mysqli_fetch_array($query)){
                  ?>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <a href="below18profile.php?gid=<?php echo $user_id; ?>&child_id=<?php echo $below18['childbirth_id']; ?>"><?php echo $below18['name'] ?></a>
                  </li>
                  <?php } ?>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <button type="button" style="float:right; width: 65px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</button>
                  </li>
                  
                  
                </ul>
              </div>
              <?php } ?>
            </div>








            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $hospital_row['hospital_name']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Number of Ward</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $hospital_row['numberof_ward']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">WardFee Per Day</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $hospital_row['wardfee_perday']; ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Number of Cavin</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $hospital_row['wardfee_perday']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">CavinFee Per Day</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $hospital_row['wardfee_perday']; ?>
                    </div>
                  </div>
                  <hr>
                  
                </div>
              </div>




              <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h3 class="d-flex align-items-center mb-3">Doctor List</h3>
                      <hr>
                      <?php 
                        $queryp =  mysqli_query($conn,"SELECT * from doctorworking where hospital_id = '$id' order by joined_date ASC");
                        while($doclist=mysqli_fetch_array($queryp)){
                          
                          $nid = $doclist['d_nid'];
                          $doc = mysqli_query($conn,"SELECT name from person where nid = '$nid'");
                          $name = mysqli_fetch_array($doc);
                       ?>
                       
                      <h5><?php echo $c1.") "; ?><a style="text-decoration:none;" href="doctorprofile.php?id=<?php echo $nid; ?>"><?php echo $name['name']; ?> </a></h5>
                      <hr>
                      
                      <?php $c1++; } ?>
                      
                    </div>
                  </div>
                </div>






            


            </div>
          </div>

        </div>
    </div>
    

    </body>

</html>
