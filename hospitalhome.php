<?php include('dbconn.php'); ?>
<?php include('session.php'); ?>
<?php
    if($user_type !="Hospital"){
      header("location:index.php");
    }
    $query = mysqli_query($conn,"SELECT * FROM hospital where hospital_id = '$user_id'");
    $hospital_row = mysqli_fetch_array($query);
    // echo $user_id;
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">
    <link rel="stylesheet" href="css/net.css"/>
    <!-- <link rel="stylesheet" href="css/myprofile.css"/> -->


<style>
  .container1{
          border: 1px solid gray;
          padding: 20px;
          width: 75%;
          top:200px;
          left:0px;
          right:0px;
          margin:auto;
          position:relative;
      }
      .card{
          border:0px;
          background:none;
      }

</style>
  </head>

  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">OneNationOneIdentity</a>
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
	
	



    <div class="container1">
    <h1>Hospital Info</h1>
    <br>
    <br>
      <div class="row">
        <div class="col-sm-6" align="center">
            <div class="card">
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Hospital ID</span>
                </div>
                
              <input type="text" class="form-control" value="<?php echo $user_id; ?>" disabled>
            </div>
                
            
        
            </div>
        </div>
        
        <div class="col-sm-6" align="center">
            <div class="card">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Hospital Name</span>
                    </div>
                
                  <input type="text" class="form-control" value="<?php echo $hospital_row['hospital_name'];?>" disabled>
                  
                </div>        
            </div>
        </div>
        
      </div>
      <div class="row">
        <div class="col-sm-6" align="center">
            <div class="card">
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Ward's Number</span>
                </div>
                
              <input type="text" class="form-control" value="<?php echo $hospital_row['numberof_ward']; ?>" disabled>
            </div>
                
            
        
            </div>
        </div>
        
        <div class="col-sm-6" align="center">
            <div class="card">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Fee Per Ward</span>
                    </div>
                
                  <input type="text" class="form-control" value="<?php echo $hospital_row['wardfee_perday'];?>" disabled>
                  
                </div>        
            </div>
        </div>
        
      </div>
      <div class="row">
        <div class="col-sm-6" align="center">
            <div class="card">
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Cabin's Number</span>
                </div>
                
              <input type="text" class="form-control" value="<?php echo $hospital_row['numberof_cabin']; ?>" disabled>
            </div>
                
            
        
            </div>
        </div>
        
        <div class="col-sm-6" align="center">
            <div class="card">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Cabin fee per day</span>
                    </div>
                
                  <input type="text" class="form-control" value="<?php echo $hospital_row['cabinfee_perday'];?>" disabled>
                  
                </div>        
            </div>
        </div>
        
      </div>






      <!-- <div class="row" style="left: 0px;right: 0px; margin:auto; position:relative; width: 100%;">
          
              <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Hospital ID</span>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $user_id; ?>" disabled>
                </div> 
        
      </div> -->
    </div>
    <!-- /.container -->


  </body>

</html>
