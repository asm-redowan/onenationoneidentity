<?php
    include ('dbconn.php');
    include('session.php');
    // print_r($_GET);
    $id = $_GET['gid'];
    $child_id = $_GET['child_id'];
    $a = $_GET['a'];
    $query = mysqli_query($conn,"SELECT person.name as gname,patientbelow18.name as cname, patientbelow18.dob as dob  from patientbelow18 inner join person on patientbelow18.guardian_nid = person.nid where patientbelow18.guardian_nid  = $id and patientbelow18.childbirth_id = $child_id ");
    $child=mysqli_fetch_array($query);
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
    <div class="main-body">
    
          
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <div class="pic"></div>
                    <div class="mt-3">
                      <h4>
                        <?php echo $child['cname']; ?>
                      </h4>
                      <p class="text-secondary mb-1">Guardian Name : <?php echo $child['gname']; ?></p>       
                      <p class="text-secondary mb-1">DOB: <?php echo $child['dob']; ?></p>

                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                <?php if ($user_type=='Doctor'|| $user_id == $id){?>
                  <div class="row">
                    <div class="col-sm-3">
                      <h4 class="mb-0">Prescription Info</h4>
                    </div>
                  </div>
                  <hr>
                  
                    <table class="table">
                      <thead>
                          <tr>
                          <th scope="col">Serial</th>
                          <th scope="col">Prescription</th>
                          <th scope="col">Doctor Name</th>
                          <th scope="col">View</th>
                          
                          </tr>
                      </thead>
                      <tbody>
                  <?php
                      $query = mysqli_query($conn,"select * from prescription  where p_nid = '$id' and childbirth_id = $child_id");
                      $c = 1;
                      while($pre = mysqli_fetch_array($query)){ 
                  ?>
                          <tr>
                          <td ><?php echo $c; ?></td>
                          <td>Prescription</td>
                          <?php 
                            $did = $pre['d_nid'];
                            $query2 = mysqli_query($conn,"select name from person where nid = '$did'");
                            $docname = mysqli_fetch_array($query2);
                           ?>
                          <td><a style="text-decoration:none;" href="doctorprofile.php?id=<?php echo $pre['d_nid']; ?>"><?php echo $docname['name']; ?></a></td>
                          <td><a style="text-decoration:none;" href="prescriptionview.php?id=<?php echo $pre['prescription_id']; ?>"> <button type="button" class="btn btn-primary"> view </button></a></td>
                          
                          </tr>
                      

                  <?php $c++; } ?>
                  </tbody>
                  </table>
                  <?php } ?>
                  <?php if($user_type == "Doctor"){ ?>
                    <div class="row">
                        <div class="col-sm-12">
                        <form action="prescriptionidinsert.php" method="POST">
                            <input type="hidden" name ="childbirth_id" value="<?php echo $child_id; ?>">
                            <input type="hidden" name ="pid" value="<?php echo $id; ?>">
                            <input type="hidden" name ="did" value="<?php echo $user_id; ?>">
                            <?php if($a == '0'){ ?>
                            <button type="submit" class="btn btn-outline-primary" name="add"> ADD </button>
                            <?php } ?>
                        </form>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                
              </div>   
              </div>
            </div>
          </div>

        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>

</html>
