<?php include('session.php'); ?>
<?php

include ('dbconn.php');
$id=$_GET['id'];
$query = mysqli_query($conn,"SELECT * from person inner join patient on person.nid = patient.p_nid inner join gender on person.gender = gender.gender_id where person.nid ='$id'");
$patpro_row=mysqli_fetch_array($query);
$query = mysqli_query($conn,"SELECT name from person where nid = (select father_nid from person where person.nid ='$id')");
$father = mysqli_fetch_array($query);
$query = mysqli_query($conn,"SELECT name from person where nid = (select mother_nid from person where person.nid ='$id')");
$mother = mysqli_fetch_array($query);
$query = mysqli_query($conn,"SELECT name from person where nid = (select husband_nid from person where person.nid ='$id')");
$husband = mysqli_fetch_array($query);
$query = mysqli_query($conn,"SELECT COUNT(*) FROM person WHERE husband_nid = (SELECT nid FROM person WHERE nid = '$id') GROUP BY husband_nid");
$marital_status = mysqli_fetch_array($query);
$query = mysqli_query($conn,"SELECT * from person inner join gender on person.gender = gender.gender_id where person.nid ='$user_id'");
$my = mysqli_fetch_array($query);
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


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add below 18</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <form action="below18insert.php" method="POST">

              <div class="modal-body">

                 
                  <input type="hidden" name="prescription_id" class="form-control">
                  <div class="form-group">
                      <label class="col-form-label">Birth Id:</label>
                      <input type="number" name="birth_id" id="location" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label">Name:</label>
                      <input type="text" name="name" id="start" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label">DOB:</label>
                      <input type="date" name="dob" id="end" class="form-control" required>
                  </div>
                  
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="insertbelow18" class="btn btn-primary">Done</button>
              </div>
            </form>
        </div>
      </div>
    </div>


    <div class="container">
    <div class="main-body">
    
          
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <!-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150"> -->
                    <img src="img/<?php echo $patpro_row['image'] ?>" class="pic">
                    <div class="mt-3">
                      <h4>
                        <?php echo $patpro_row['name']; ?>
                      </h4>
                      <!-- <p class="text-secondary mb-1">Gender : <?php echo $patpro_row['gender_name']; ?></p> -->
                      
                      
                      <!-- <?php if($husband!=null && $patpro_row['gender_name'] == 'female') {?>
                        <p class="text-secondary mb-1">Husband 's Name : <?php echo $husband['name']; ?></p>
                      <?php }else{ ?>
                          <?php if($marital_status!=NULL){?>
                            <p class="text-secondary mb-1">marital_status : <?php echo "Married"; ?></p>
                          <?php }else{ ?>
                            <p class="text-secondary mb-1">marital_status : <?php echo "Unmarried"; ?></p>
                          <?php } ?>

                      <?php } ?> -->
                      <!-- <p class="text-secondary mb-1">DOB: <?php echo $patpro_row['dob']; ?></p>
                      <p class="text-secondary mb-1">Occupation : <?php echo $patpro_row['occupation']; ?></p> -->
                      <p class="text-secondary mb-1">Blood : <?php echo $patpro_row['blood']; ?></p>
                      <!-- <p class="text-secondary mb-1">Religion : <?php echo $patpro_row['religion']; ?></p>
                      <p class="text-secondary mb-1">Father's Name : <?php echo $father['name']; ?></p>
                      <p class="text-secondary mb-1">Mother's Name : <?php echo $mother['name']; ?></p> -->
                      
                      <!-- <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p> -->
                      <!-- <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button> -->
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
                    <a href="below18profile.php?gid=<?php echo $user_id; ?>&child_id=<?php echo $below18['childbirth_id']; ?>&a=1"><?php echo $below18['name'] ?></a>
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
                    <?php echo $patpro_row['name']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $patpro_row['gender_name']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">DOB</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $patpro_row['dob']; ?>
                    </div>
                  </div>
                  <hr>

                  <?php if($husband!=null && $patpro_row['gender_name'] == 'female') {?>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Husband 's Name </h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?php echo $husband['name']; ?>
                      </div>
                    </div>
                        <!-- <p class="text-secondary mb-1">Husband 's Name : <?php echo $husband['name']; ?></p> -->
                      <?php }else{ ?>
                          <?php if($marital_status!=NULL){?>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0"> Marital Status </h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <?php echo "Married"; ?>  
                              </div>
                            </div>
                            <!-- <p class="text-secondary mb-1">marital_status : <?php echo "Married"; ?></p> -->
                          <?php }else{ ?>
                            <div class="row">
                              <div class="col-sm-3">
                                <h6 class="mb-0"> Marital Status </h6>
                              </div>
                              <div class="col-sm-9 text-secondary">
                                <?php echo "Unmarried"; ?>  
                              </div>
                            </div>
                            <!-- <p class="text-secondary mb-1">marital_status : <?php echo "Unmarried"; ?></p> -->
                          <?php } ?>

                      <?php } ?>

                  <hr>
                  
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Father's Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $father['name']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mother's Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $mother['name']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Occupation</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $patpro_row['occupation']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Religion</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $patpro_row['religion']; ?>
                    </div>
                  </div>
                  <hr>
                  
                  
                  <!-- <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                    </div>
                  </div> -->
                </div>
              </div>











            <!-- <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                <?php if ($user_type=='Doctor' || $user_id == $id){?>
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
                          <th scope="col">View</th>
                          
                          </tr>
                      </thead>
                      <tbody>
                  <?php
                      $query = mysqli_query($conn,"select * from prescription  where p_nid = '$user_id' and childbirth_id = 'N/A'");
                      $c = 1;
                      while($pre = mysqli_fetch_array($query)){ 
                  ?>
                          <tr>
                          <td ><?php echo $c; ?></td>
                          <td>Prescription</td>
                          <td><a style="text-decoration:none;" href="prescriptionview.php?id=<?php echo $pre['prescription_id']; ?>"> <button type="button" class="btn btn-primary"> view </button></a></td>
                          
                          </tr>
                      

                  <?php $c++; } ?>
                  </tbody>
                  </table>
                  <?php } ?>
                </div>
              </div>
             
              </div>  -->



            </div>
          </div>

        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>

</html>
