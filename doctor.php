
<?php include('dbconn.php'); ?>
<?php include('session.php'); ?>



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


<style></style>
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
            <li class="nav-item active">
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

	





    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          

          <!-- Blog Post -->
          <div class="card mb-4">
            <?php
                // $query = mysqli_query($conn,"SELECT * FROM person inner join doctor on person.nid = doctor.d_nid");
                $query = mysqli_query($conn,"SELECT nid, name, specialist, ROUND(AVG(rating),1) as rating, image FROM doctor inner join person on person.nid = doctor.d_nid inner join dmdc on dmdc.dmdc_id = doctor.dmdc_id  left join reviewfordoctor on reviewfordoctor.d_nid = doctor.d_nid where doctor.d_nid != '$user_id' GROUP BY doctor.d_nid ORDER BY rating DESC");
                while( $doctor_row = mysqli_fetch_array($query)){
            ?>
            
            <div class="card-body" style="border: 1px solid gray; position:relative; border-radius: 20px;">
                <img src="img/<?php echo $doctor_row['image'] ?>" class="box">
                <div style="top: 20px;left: 75px;; position:absolute;"><a href="doctorprofile.php?id=<?php echo $doctor_row['nid']; ?>"><?php echo $doctor_row['name']; ?></a></div>
                <div style="top: 40px;left: 75px;; position:absolute; font-size:smaller;"><?php echo "Specialist: ".$doctor_row['specialist']; ?></div>
                <?php if($doctor_row['rating']){ ?>
                <div style="top: 55px;left: 75px;; position:absolute; font-size:smaller;"><?php echo "Rating: ".$doctor_row['rating']."★"; ?></div>
                <?php }else{ ?>
                <div style="top: 55px;left: 75px;; position:absolute; font-size:smaller;"><?php echo "Rating: 0.0★"; ?></div>
                <?php } ?>
              
            </div>
            <br>
            <?php } ?>
          </div>

          
          

           

        

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <!-- <div class="border card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div> -->


          <div class="border card my-4">
            <h5 class="card-header">Search by Doctor Name</h5>
            <div class="card-body">
              <form action="searchdoc.php" method="POST">
              <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit" name="go">Go!</button>
                </span>
              </div>
                </form>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="border card my-3">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <?php
                    $query = mysqli_query($conn,"SELECT specialist , COUNT(*) as c FROM dmdc INNER JOIN doctor ON dmdc.dmdc_id = doctor.dmdc_id where doctor.d_nid != '$user_id' GROUP BY specialist");
                    while ($category_row=mysqli_fetch_array($query)){
                    ?>
                    <li>
                      <a href="doctorcategory.php?category=<?php echo $category_row['specialist'] ?>"><?php echo $category_row['specialist']."(".$category_row['c'].")" ?></a>
                    </li>
                    
                    <?php
                    }
                    ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          

          
        </div>
          
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->



   

  </body>

</html>
