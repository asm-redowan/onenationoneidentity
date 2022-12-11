
   






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

    <title>OneNationOneIdentity Tutorial</title>
    <?php include('dbconn.php'); ?>

    <?php
  
      $message = "";
      session_start();
      if(isset($_POST['btn'])){
        $hosid = mysqli_real_escape_string($conn,$_POST['hosid']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        
       
        $query = mysqli_query($conn,"SELECT * FROM hospital WHERE hospital_id ='$hosid' AND PASSWORD ='$password'");
        $row = mysqli_fetch_array($query);
        $user_id = $row['hospital_id'];
        if ($query->num_rows > 0){
      
          $_SESSION['id']=$user_id;
          $_SESSION['radio'] = "Hospital";
          header("Location:hospitalhome.php");
          
        }else{ 
          $message = "login failed";
        }	

      }    
		?>



    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">OneNationOneIdentity</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        

          </div>
      </div>
    </nav>

    <div class="middlecolumn">
        <div class="leftside">
            <img src="img/logo.png">
        </div>
        <div class="rightside">
           <center><h4 class="text-danger"><?php echo $message; ?></h4></center>
            <form  method="post">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Hospital ID :</label>
                    <div class="col-sm-10">
                    <input type="number" name="hosid" class="form-control" id="nid">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="Password">
                    </div>
                </div>
               

                
                
                <button type="submit" name="btn" class="btn btn-primary">Sign in</button>
                </form>
        </div>

    </div>


	

  </body>

</html>
