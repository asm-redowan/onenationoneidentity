
<?php include('dbconn.php'); ?>
<?php include('session.php'); ?>
<?php
    // $patient_row = "";
    // if(isset($_POST['go'])){
    //     $search = $_POST['search'];
    //     $go = $_POST['go'];
    //     if(strlen($search)==9){
    //         $query = mysqli_query($conn,"SELECT * from person inner join patient on person.nid = patient.p_nid inner join gender on person.gender = gender.gender_id where nid = '$search'");
    //         $patient_row = mysqli_fetch_array($query);
    //     }
    //     if(strlen($search)==28){
    //         $query = mysqli_query($conn,"SELECT * from person inner join patient on person.nid = patient.p_nid inner join gender on person.gender = gender.gender_id where finger_print  = '$search'");
    //         $patient_row = mysqli_fetch_array($query);
    //     }
    //     if(strlen($search)==32){
    //         $query = mysqli_query($conn,"SELECT * from person inner join patient on person.nid = patient.p_nid inner join gender on person.gender = gender.gender_id where retina_print = '$search'");
    //         $patient_row = mysqli_fetch_array($query);
    //     }
    //     if($patient_row==NULL || $patient_row['nid']==$user_id ){
    //         header("location:patient.php");
    //     }
    // }
    $search = $_GET['id'];
    $a = $_GET['a'];
    // echo $a;
    $query = mysqli_query($conn,"SELECT * from person inner join patient on person.nid = patient.p_nid inner join gender on person.gender = gender.gender_id where nid = '$search'");
    $patient_row = mysqli_fetch_array($query);
?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

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

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Custom styles for this template -->
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
                    <img src="img/<?php echo $patient_row['image'] ?>" class="pic">
                    <div class="mt-3">
                      <h4>
                        <?php echo $patient_row['name']; ?>
                      </h4>
                      <p class="text-secondary mb-1">Gender : <?php echo $patient_row['gender_name']; ?></p>  
                      
                      <p class="text-secondary mb-1">DOB: <?php echo $patient_row['dob']; ?></p>
                      <p class="text-secondary mb-1">Occupation : <?php echo $patient_row['occupation']; ?></p>
                      <p class="text-secondary mb-1">Blood : <?php echo $patient_row['blood']; ?></p>
                      <p class="text-secondary mb-1">Religion : <?php echo $patient_row['religion']; ?></p>
                      <?php if($a=='m' || $a = 'mo'){ ?>
                        <a style="text-decoration:none;" href="message.php<?php echo '?id='.$search; ?>"> <button class="btn btn-outline-primary">Message</button></a>
                      <?php } ?>
                      <!-- <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p> -->
                      <!-- <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button> -->
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
                    <a href="below18profile.php?gid=<?php echo $nid; ?>&child_id=<?php echo $below18['childbirth_id']; ?>&a=<?php echo $a; ?>"><?php echo $below18['name'] ?></a>
                  </li>
                  <?php } ?>
                  <!-- <?php if($user_id == $id){ ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <button type="button" style="float:right; width: 65px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</button>
                    </li>
                  <?php } ?> -->
                  <!-- <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                    <span class="text-secondary">@bootdey</span>
                  </li> -->
                  
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
                     <a style="text-decoration:none;" href="prescriptionview.php?id=<?php echo $pre['prescription_id']; ?>"> <button type="button" class="btn btn-primary"> view </button></a>
                    </div>
                  </div>
                  
                  <?php $c++; } ?>
                  <hr>
                  
                  <div class="row">
                    <div class="col-sm-12">
                      <form action="prescriptionidinsert.php" method="POST">
                        <input type="hidden" name ="childbirth_id" value="<?php echo "N/A"; ?>">
                        <input type="hidden" name ="pid" value="<?php echo $patient_row['nid']; ?>">
                        <input type="hidden" name ="did" value="<?php echo $user_id; ?>">
                        <?php if($a =='0' || $a =='m'){ ?>
                        <button type="submit" class="btn btn-outline-primary" name="add"> ADD </button>
                        <?php } ?>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              

              <!-- <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
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
                </div> -->
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



            </div>
          </div>

        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>

</html>
