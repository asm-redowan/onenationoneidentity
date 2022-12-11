

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

    <title>OneNationOneIdentity Tutorial</title>
    <?php include('dbconn.php'); ?>
	<?php include('session.php'); ?>

        <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="css/blog-home.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"/>
<style></style>
  </head>

  <body>
<!-- <div class="section" id="b-section-header" name="Header"><div class="widget Header" data-version="2" id="Header1">
<div class="header image-placement-behind no-image">
<div class="container">

<h1><a href="">OneNationOneIdentity Tutorial</a></h1>
<p>&nbsp;</p>

</div>
</div>
</div></div> -->
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="test3.php">OneNationOneIdentity</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <?php
              $doctor_nid = mysqli_query($conn,"SELECT *  FROM doctor where d_nid = '$user_id'") or die (mysqli_error());
              $doctor_row=mysqli_fetch_array($doctor_nid);
              if($doctor_nid!=NULL){

            ?>
            
            <li class="nav-item">
              <a class="nav-link" href="#">Patient</a>
            </li>
            <?php } else {?>
            <li class="nav-item active">
              <a class="nav-link" href="#">Doctor</a>
            </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link" href="#">Hospital</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="na1">
              <a class="nav-link" href="myprofile.php">profile</a>
            </li>
            <li class="na2">
              <a class="nav-link" href="logout.php">logout</a>
            </li>
			
          </ul>
		  <div class="ml-auto my-2 my-lg-0">
<div class="section" id="b-section-navbar-search-form" name="Navbar: search form"><div class="widget BlogSearch" data-version="2" id="BlogSearch1">
<!--    me comment 
<form action="" class="form-inline">

<input aria-label="Search this blog" class="form-control mr-sm-2" name="q" placeholder="Search this blog" type="text">
<button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
</form>
-->
</div></div>
<!-- </div> -->
        </div>
      </div>
    </nav>
	
	



    <!-- Page Content -->
    <!-- <div class="container">

      <div class="row"> -->

        <!-- Blog Entries Column -->
        <!-- <div class="col-md-8"> -->
        
      <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          Launch static backdrop modal
        </button> -->

        <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatecode.php" method="POST">

                    <div class="modal-body">

                        <input type="text" name="update_id" id="update_id">

                        <div class="form-group">
                            <label> First Name </label>
                            <input type="text" name="fname" id="fname" class="form-control"
                                placeholder="Enter First Name">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>




         

          
        <div class="middlecolumn">
            <div class="post">

              <form method="post"> 
              <textarea class="questionbox" name="post_content" rows="4" style="" placeholder=".................Write Someting........" required></textarea>
              <!-- <select name="agent_id" required>
                
                <option value="1jh">Agent Homer</option>
                <option value="2">Agent Lenny</option>
                <option value="3">Agent Carl</option>
              </select>
               -->
              
                <input list="browsers" name="browser" placeholder="select category" required>
                <datalist id="browsers">
                  <option value="Fever">
                  <option value="Diabetes">
                  <option value="Covid19">
                  <option value="Acne">
                  <option value="Cholera">
                  <option value="Ebola Virus">
                </datalist>
                
              
              <button class="ask" name="post">Ask question</button>

							<?php
							
								if (isset($_POST['post'])){
								$post_content  = $_POST['post_content'];
                $category = $_POST['browser'];
								mysqli_query($conn,"insert into post (content,category,date,p_nid,time) values ('$post_content','$category',CURRENT_DATE,'$user_id',CURRENT_TIME) ")or die(mysqli_error());
								//header('location:test3.php');
								}
							?>

							<?php
							
								if (isset($_POST['comment'])){
								$comment_content = $_POST['comment_content'];
								$post_id=$_POST['id'];
								
								mysqli_query($conn,"insert into commentpost (p_nid,post_id,content,date,time) values ('$user_id','$post_id','$comment_content',CURRENT_DATE,CURRENT_TIME)") or die (mysqli_error());
								//header('location:test3.php');
								}
							?>

					<br>
					

					</form>
          
					<!-- <div class="card">
                <div class="card-body"> -->

                    <?php
                

                         $query = "SELECT * from post INNER JOIN patient on post.p_nid = patient.p_nid order by post_id DESC";
                        $query_run = mysqli_query($conn, $query);
                    ?>
                   
                        
                        <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
                    ?>
                        
                            <div class="updaterelated">
                                
                                <div class="post_id"><font color="white"><?php  echo $row['post_id']; ?></font></div>
                                <div class="content"><?php  echo $row['content']; ?></div> 
                                <div class="pnid"><?php  echo $row['p_nid']; ?></div>  
                                
                                
                                
                               
                                    <!-- <button type="button" class="btn btn-info viewbtn"> VIEW </button> -->
                              
                                     <div class="updatebutton"></div><button type="button" class="btn btn-success editbtn"> EDIT </button></pre>
                                
                                
                                    <!-- <button type="button" class="btn btn-danger deletebtn"> DELETE </button> -->
                                
                                    </div>
                        <?php  
                                 
                    }
                }
                else 
                {
                    echo "No Record Found";
                }
            ?>
                   
                <!-- </div>
            </div>           -->
					
            
           
          </div>
        </div>
        <div class="right">
        <!-- Sidebar Widgets Column -->
        <!-- <div class="col-md-4"> -->

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <form method="post">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary" name="search">Go!</button>
                  </span>
               </form>
              </div>
            </div>
          </div>
          <?php
            if(isset($_POST['search'])){
              echo "Hello";
            }
          ?>
          <!-- Categories Widget -->
          <div class="card my-3">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Simba</a>
                    </li>
                    <li>
                      <a href="#">Nyati</a>
                    </li>
                    <li>
                      <a href="#">Faru</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Kiboko</a>
                    </li>
                    <li>
                      <a href="#">Fisi</a>
                    </li>
                    <li>
                      <a href="#">Pundamlia</a>
                    </li>
                    <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Kiboko</a>
                    </li>
                    <li>
                      <a href="#">Fisi</a>
                    </li>
                    <li>
                      <a href="#">Pundamlia</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <!-- <div class="card my-4">
            <h5 class="card-header">maelezo</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

  -->
          </div>   
      <!-- </div> -->
      <!-- /.row -->

    <!-- </div> -->
    <!-- /.container -->
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>


    
    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('div');

                var data = $tr.children("div").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#fname').val(data[1]);
                // $('#lname').val(data[2]);
                // $('#course').val(data[3]);
                // $('#contact').val(data[4]);
            });
        });
    </script>

  </body>

</html>
