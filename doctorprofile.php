
<?php

    include ('dbconn.php');
    $c1 = 1;
    $id=$_GET['id'];
    $query = mysqli_query($conn,"SELECT * from person inner join doctor on person.nid = doctor.d_nid where person.nid ='$id'");
    $docpro_row=mysqli_fetch_array($query)

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
	  <?php include('session.php'); ?>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">
    <link rel="stylesheet" href="css/myprofile.css"/>

    <style>
      .pic{
        border: 1px solid black;
        width: 150px;
        height: 150px;
        border-radius: 50%;

      }
        .main-body{
            top: 100px;
            position:relative;
        }
        
        body {background: #EAEAEA;}
        .user-details {position: relative; padding: 0;}
        .user-details .user-image {position: relative;  z-index: 1; width: 100%; text-align: center;}
        .user-image img { clear: both; margin: auto; position: relative;}

        .user-details .user-info-block {width: 100%; position: absolute; top: 55px; background: rgb(255, 255, 255); z-index: 0; padding-top: 35px;}
        .user-info-block .user-heading {width: 100%; text-align: center; margin: 10px 0 0;}
        .user-info-block .navigation {float: left; width: 100%; margin: 0; padding: 0; list-style: none; border-bottom: 1px solid #428BCA; border-top: 1px solid #428BCA;}
        .navigation li {float: left; margin: 0; padding: 0;}
        .navigation li a {padding: 20px 30px; float: left;}
        .navigation li.active a {background: #428BCA; color: #fff;}
        .user-info-block .user-body {float: left; padding: 5%; width: 90%;}
        .user-body .tab-content > div {float: left; width: 100%;}
        .user-body .tab-content h4 {width: 100%; margin: 10px 0; color: #333;}
        .table1 {
                /* border-collapse: collapse; */
                /* border: 1px solid black; */
                border-collapse:separate; 
                /* border-spacing:5px; */
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

<!-- chamber update -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Update Chamber </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
      
                </div>

                <form action="chamberupdate.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="location" id="location">
                        <input type="hidden" name="start" id="start">
                        <input type="hidden" name="end" id="end">
                        <input type="hidden" name="day" id="day">

                        <div class="form-group">
                            <input type="text" name="updatelocation" id="updatelocation" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="updatestart" id="updatestart" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="updateend" id="updateend" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="updatedate" id="updatedate" class="form-control">
                        </div>

                        
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="updatecham" class="btn btn-primary">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- add Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Chamber</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <form action="chamberinsert.php" method="POST">

              <div class="modal-body">

                  <div class="form-group">
                      <label class="col-form-label">Location:</label>
                      <input type="text" name="location" id="location" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label">Start Time:</label>
                      <input type="text" name="start" id="start" placeholder="hh:mm:ss" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label">End Time:</label>
                      <input type="text" name="end" id="end" placeholder="hh:mm:ss" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label">Day:</label>
                      <input type="text" name="day" id="day" class="form-control" required>
                  </div>

                  
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="insertchamber" class="btn btn-primary">Done</button>
              </div>
            </form>
        </div>
      </div>
    </div>


    <!-- rating Modal -->
    <div class="modal fade" id="ratingmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Rating</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
          </div>
            <form action="rating.php" method="POST">

              <input type="hidden" name="dnid" value="<?php echo $id; ?>">
              <div class="modal-body">
                  <div class="form-group">
                      <!-- <label class="col-form-label">Start Time:</label> -->
                      <div class="rateyo" style="left: 0; right:0; margin:auto; position:absolute;" id= "rating" data-rateyo-rating="4" data-rateyo-num-stars="5" data-rateyo-score="3">
                      </div>
                      <!-- <span class='result'>0</span> -->
                      <input type="hidden" name="rating">

                  </div>
                  <div class="form-group">
                      <label class="col-form-label">Review</label>
                      <textarea class="form-control" name="review" rows="4" required></textarea>
                  </div>

                  
              </div>
              <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="sendrate" class="btn btn-primary">send</button>
              </div>
            </form>
        </div>
      </div>
    </div>


    <div class="container">
        <div class="main-body">
    
          <!-- Breadcrumb -->
          <!-- <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav> -->
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                  <!-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150"> -->
                    <img src="img/<?php echo $docpro_row['image']; ?>" class="pic">
                    <div class="mt-3">
                      <h4><?php echo $docpro_row['name']; ?></h4>
                      <?php
                        $query = mysqli_query($conn,"SELECT ROUND(AVG(rating),1) as rating FROM reviewfordoctor where d_nid = '$id' group by d_nid");
                        $docrat = mysqli_fetch_array($query);
                      ?>
                      <?php if($docrat != null){?>
                        <p class="text-secondary mb-1"><?php echo "Rating : ".$docrat['rating']; ?>★</p>
                      <?php }else{?>
                        <p class="text-secondary mb-1"><?php echo "Rating : 0.0"; ?>★</p>
                        <?php } ?>
                        <p class="text-secondary mb-1"><?php echo "✆ ".$docpro_row['mobile_no']; ?></p>
                        <?php
                          $query = mysqli_query($conn,"select * from doctor inner join dmdc on doctor.dmdc_id = dmdc.dmdc_id  inner join doctordegree on doctor.dmdc_id = doctordegree.dmdc_id where d_nid = '$id'");
                          $specialist = "";
                          $c = 0;
                          while($dmdc = mysqli_fetch_array($query)){
                            
                            if($specialist != $dmdc['specialist'] ){
                              $specialist = $dmdc['specialist'];
                        ?>

                        <p class="text-secondary mb-1"><?php echo "Specialist : ".$dmdc['specialist']; ?></p>
                        <p class="text-secondary mb-1"><?php echo "Degree : "; ?>

                        <?php } ?>
                        <div class="text-secondary mb-1"><?php echo $dmdc['degree_name']." (".$dmdc['institute_name'].") "; ?></div>
                        <!-- <p class="text-secondary mb-1"><?php echo "✆ ".$docpro_row['mobile_no']; ?></p> -->
                      <?php } ?>
                      </p>
                      
                      <?php 
                        if($user_id!=$id && $user_type!='Doctor'){
                          $query = mysqli_query($conn,"SELECT * from reviewfordoctor where p_nid = '$user_id' and d_nid = '$id'");
                          $rev = mysqli_fetch_array($query);
                          if(!$rev){ 
                            $query = mysqli_query($conn,"SELECT * from prescription where p_nid = '$user_id' and d_nid = '$id'");
                            $check = mysqli_fetch_array($query);
                            if($check){
                           ?>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ratingmodel">Rating</button> 
                          <?php }} ?>
                        <a style="text-decoration:none;" href="message.php<?php echo '?id='.$id; ?>"> <button class="btn btn-outline-primary">Message</button></a>
                        <?php 
                            $query3 = mysqli_query($conn,"SELECT * from appointment where p_nid = '$user_id' and d_nid = '$id'");
                            $check3 = mysqli_fetch_array($query3);
                            if($check3==NULL || $check3['appointment']=='N/A'){
                        ?>
                        <a style="text-decoration:none;" href="appointment.php?dnid=<?php echo $id; ?>&pnid=<?php echo $user_id; ?>"> <button class="btn btn-outline-primary">Appointment</button></a>
                        <?php }else{?>
                          <a style="text-decoration:none;" href="appointmentundo.php?dnid=<?php echo $id; ?>&pnid=<?php echo $user_id; ?>"> <button class="btn btn-outline-danger">Appointmented</button></a>

                      <?php } } ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Reviews</h6>
                    <!-- <span class="text-secondary">https://bootdey.com</span> -->
                  </li>
                  <?php
                    $query = mysqli_query($conn,"SELECT * FROM reviewfordoctor inner join person on reviewfordoctor.p_nid = person.nid where d_nid = '$id' order by FIELD(p_nid,'$user_id') DESC");
                    while($review_row = mysqli_fetch_array($query)){
                      
                   ?>
                  <div class="card-body">
                    <h5 class="card-title"><?php
                      if($review_row['p_nid']==$user_id){
                        echo "ME  ";
                      }else{
                        echo $review_row['name']." "; 
                      }
                      ?><small><font color="gray">rating : <?php echo $review_row['rating']."★"; ?></font></small></h5>
                    <p class="card-text"><?php echo $review_row['review']; ?></p>
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                  </div>
                  <?php } ?>
                  <!-- <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                    <span class="text-secondary">@bootdey</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                    <span class="text-secondary">bootdey</span>
                  </li> -->
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class=" v card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Chamber location</h6>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <table class="table1 table-borderless" style="width: 100%;">
                        <thead>
                            <tr>
                            <th scope="col">Loaction</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">End time</th>
                            <th scope="col">Day</th>
                            <?php if($user_id == $id){?>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query =  mysqli_query($conn,"SELECT * from doctorchamber where d_nid = '$id' order by location_ DESC");
                            while($docchamber_row=mysqli_fetch_array($query)){

                        ?>
                            <tr>
                            <td scope="row"> <?php echo $docchamber_row['location_']; ?></td>
                            <td><?php echo $docchamber_row['start_time']; ?></td>
                            <td><?php echo $docchamber_row['end_time']; ?></td>
                            <td><?php echo $docchamber_row['day']; ?></td>
                            <?php if($user_id == $id){?>
                                <td scope="col"><button type="button" style=" width: 55px; " class="btn btn-success editbtn"><small>EDIT</small></button></td>
                                <td scope="col"><a style="text-decoration:none;" href="chamberdelete.php?location=<?php echo $docchamber_row['location_']; ?>&start_time=<?php echo $docchamber_row['start_time']; ?>&end_time=<?php echo $docchamber_row['end_time']; ?>&day=<?php echo $docchamber_row['day']; ?>"><button type="button" class="btn btn-danger deletebtn" style="width: 65px;"> <small>DELETE</small> </button></a></td>
                            <?php } ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                   
                    <!--  -->
                  </div>
                  <hr>
                  <?php if($user_id == $id){?>
                        <td scope="col"><button type="button" style="float:right; width: 65px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</button></td>
                    <?php } ?>
                  
                  
                 
                  
                  
                 
                </div>
              </div>

              <div class="row gutters-sm">
                
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h3 class="d-flex align-items-center mb-3">Who Appointmented</h3>
                      <hr>
                      <?php 
                        $queryp =  mysqli_query($conn,"SELECT * from appointment where d_nid = '$id' order by date ASC");
                        while($appointment=mysqli_fetch_array($queryp)){
                          
                          $nid = $appointment['p_nid'];
                          $patientapp = mysqli_query($conn,"SELECT name, TIMESTAMPDIFF(YEAR, dob, CURDATE()) AS age from person where nid = '$nid'");
                          $patientapp_row = mysqli_fetch_array($patientapp);
                       ?>
                       <?php if($user_id == $id){ ?>
                      <h5><?php echo $c1.") "; ?><a style="text-decoration:none;" href="docseepatient.php?id=<?php echo $nid; ?>&a=m"><?php echo $patientapp_row['name']; ?> </a></h5>
                      <?php } else{ ?>
                      <h5><?php echo $c1.") "; ?><a style="text-decoration:none;" href="myprofile.php?id=<?php echo $nid; ?>"><?php echo $patientapp_row['name']; ?> </a></h5>
                      <?php } ?>
                      <div>
                        <small>Age: <?php echo $patientapp_row['age']; ?></small>
                      </div>
                      <hr>
                      
                      <?php $c1++; } ?>
                      
                    </div>
                  </div>
                </div>
               
                <!-- <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                      <small>Web Design</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Website Markup</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>One Page</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Mobile Template</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Backend API</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
              <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h3 class="d-flex align-items-center mb-3">Working Hospital List</h3>
                      <hr>
                      <?php 
                        $queryp =  mysqli_query($conn,"SELECT * from doctorworking where d_nid = '$id' order by joined_date ASC");
                        while($doclist=mysqli_fetch_array($queryp)){
                          
                          $hosid = $doclist['hospital_id'];
                          $hos = mysqli_query($conn,"SELECT hospital_name from hospital where hospital_id = '$hosid'");
                          $name = mysqli_fetch_array($hos);
                       ?>
                       
                      <h5><?php echo $c1.") "; ?><a style="text-decoration:none;" href="hospitalprofile.php?id=<?php echo $hosid; ?>"><?php echo $name['hospital_name']; ?> </a></h5>
                      <hr>
                      
                      <?php $c1++; } ?>
                      
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

    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#updatelocation').val(data[0]);
                $('#updatestart').val(data[1]);
                $('#updateend').val(data[2]);
                $('#updatedate').val(data[3]);
                $('#location').val(data[0]);
                $('#start').val(data[1]);
                $('#end').val(data[2]);
                $('#day').val(data[3]);
               
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <script>
    
    
        $(function () {
            $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
                var rating = data.rating;
                $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
                $(this).parent().find('.result').text('rating :'+ rating);
                $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
            });
        });
    
    </script>


    

  </body>

</html>
