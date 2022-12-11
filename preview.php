
<?php include('dbconn.php'); ?>

<?php
    // print_r($_GET);
    $nid = $_GET['id'];
    
    $query = mysqli_query($conn,"SELECT * from person inner join gender on person.gender = gender.gender_id where person.nid ='$nid'");
    $person = mysqli_fetch_array($query);
    $query = mysqli_query($conn,"SELECT name from person where nid = (select father_nid from person where person.nid ='$nid')");
    $father = mysqli_fetch_array($query);
    $query = mysqli_query($conn,"SELECT name from person where nid = (select mother_nid from person where person.nid ='$nid')");
    $mother = mysqli_fetch_array($query);
    $query = mysqli_query($conn,"SELECT name from person where nid = (select husband_nid from person where person.nid ='$nid')");
    $husband = mysqli_fetch_array($query);
    $query = mysqli_query($conn,"SELECT COUNT(*) FROM person WHERE husband_nid = (SELECT nid FROM person WHERE nid = '$nid') GROUP BY husband_nid");
    $marital_status = mysqli_fetch_array($query);
    // $query = mysqli_query($conn,"SELECT * from person inner join gender on person.gender = gender.gender_id where person.nid ='$nid'");
    // $my = mysqli_fetch_array($query);
    

?>
<?php
    // print_r($_POST);
         
    $message = "";
    if (isset($_POST['submit'])){
        $nid = $_POST['nid'];
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $conformpassword = mysqli_real_escape_string($conn,$_POST['conformpassword']);
        
        if($password == $conformpassword && strlen($password)>=8){
            $img_name = $_FILES['image']['name'];
            $img_size = $_FILES['image']['size'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];
            if ($error === 0) {
            
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_exs = array("jpg", "jpeg", "png","webp"); 
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'img/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    mysqli_query($conn,"update person set image = '$new_img_name' where nid = '$nid'");
                    mysqli_query($conn,"insert into patient (p_nid,password) values ('$nid','$password')");
                    
                    header("location:personlogin.php");
                    }else {
                        $message = "Wrong file Uploaded Please upload (jpg, jpeg, png, webp)";
                    }
            }

        }else{
            $message = "Password Missmatch or Password Lower Than 8 Character"; 
        }
        

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





<div class="container1">
    <h1>INFO </h1>
    <br>
    
    

    

    <div class="row">
      <div class="col-sm-6" align="center">
          <div class="card">
          
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon3">Nid</span>
              </div>
              
             <input type="text" class="form-control" value="<?php echo $person['nid']; ?>" disabled>
          </div>
              
          
      
          </div>
      </div>
      
      <div class="col-sm-6" align="center">
          <div class="card">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3">Name</span>
                  </div>
               
                <input type="text" class="form-control" value="<?php echo $person['name']; ?>" disabled>
                
              </div>        
          </div>
      </div>
      
    </div>

    <div class="row">
      <div class="col-sm-6" align="center">
          <div class="card">
          
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon3">Father Name</span>
              </div>
              
             <input type="text" class="form-control" value="<?php echo $father['name']; ?>" disabled>
          </div>
              
          
      
          </div>
      </div>
      
      <div class="col-sm-6" align="center">
          <div class="card">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3">Mother Name</span>
                  </div>
               
                <input type="text" class="form-control" value="<?php echo $mother['name']; ?>" disabled>
                
              </div>        
          </div>
      </div>
      
    </div>
    <div class="row">
      <div class="col-sm-6" align="center">
          <div class="card">
          
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon3">DOB</span>
              </div>
              
             <input type="text" class="form-control" value="<?php echo $person['blood']; ?>" disabled>
          </div>
              
          
      
          </div>
      </div>
      
      <div class="col-sm-6" align="center">
          <div class="card">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3">Gender</span>
                  </div>
               
                <input type="text" class="form-control" value="<?php echo $person['gender_name']; ?>" disabled>
                
              </div>        
          </div>
      </div>
      
    </div>
    <div class="row">
      <div class="col-sm-6" align="center">
          <div class="card">
          
          <div class="input-group mb-3">
              
              <?php if($husband!=null && $person['gender_name'] == 'female') {?>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Husband 's Name</span>
                        </div>
                        <input type="text" class="form-control" value="<?php echo $husband['name']; ?>" disabled>
                      <?php }else{ ?>
                          <?php if($marital_status!=NULL){?>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">Marital Status</span>
                            </div>
                            <input type="text" class="form-control" value="<?php echo "Married"; ?>" disabled>
                            
                          <?php }else{ ?>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">Marital Status</span>
                            </div>
                            <input type="text" class="form-control" value="<?php echo "Unmarried"; ?>" disabled>
                          <?php } ?>

                      <?php } ?>
               
          </div>
              
          
      
          </div>
      </div>
      
      <div class="col-sm-6" align="center">
          <div class="card">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3">Occupation</span>
                  </div>
               
                <input type="text" class="form-control" value="<?php echo $person['occupation']; ?>" disabled>
                
              </div>        
          </div>
      </div>
      
    </div>

    <div class="row">
      <div class="col-sm-6" align="center">
          <div class="card">
          
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon3">Mobile no</span>
              </div>
              
             <input type="text" class="form-control" value="<?php echo $person['mobile_no']; ?>" disabled>
          </div>
              
          
      
          </div>
      </div>
      
      <div class="col-sm-6" align="center">
          <div class="card">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon3">Religion</span>
                  </div>
               
                <input type="text" class="form-control" value="<?php echo $person['religion']; ?>" disabled>
                
              </div>        
          </div>
      </div>
      
    </div>
    <font color="red"> <h3><?php echo $message; ?></h3></font>
    <form action="" method="POST" enctype="multipart/form-data">
        
            <input type="hidden" name="nid" class="form-control" value="<?php echo $nid; ?>">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Photo</span>
                </div>
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Enter Password</span>
                </div>
                <input type="password" class="form-control" list="doctor_ref" name="password">
                  
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Conform Password</span>
                </div>
                <input type="password" class="form-control" name="conformpassword">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">
               Save
            </button>

      </form>



    
    
</div>





</body>
</html>
