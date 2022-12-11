<?php 
    // print_r($_GET);
    $cat = $_GET['category'];
    // echo $cat;
?>
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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

	

    <!-- EDIT post UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Update question </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
      
                </div>

                <form action="updatepost.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="updatequestion_id" id="updatequestion_id">

                        <div class="form-group">
                            <input type="text" name="updatequestion" id="updatequestion" class="form-control"
                                placeholder="Enter First Name">
                        </div>

                        
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
	
	<!-- EDIT comment UP FORM (Bootstrap MODAL) -->
  <div class="modal fade" id="editmodalans" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Update question </h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
      
                </div>

                <form action="commentupdate.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="pos_id" id="pos_id">
                        <input type="hidden" name="com_id" id="com_id">

                        <div class="form-group">
                            <input type="text" name="updateans" id="updateans" class="form-control"
                                placeholder="Enter First Name">
                        </div>

                        
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="updatecom" class="btn btn-primary">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>



    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- <h1 class="my-4">Kilimanjaro park
            <small>mbuga za wanyama</small>
          </h1> -->

          
          
          

           <!-- Blog Post -->
           <div class="card mb-4">

            <div class="postshow">
                <!-- <div class="card-body"> -->

              <?php
                // $query = "SELECT * from post INNER JOIN patient on post.p_nid = patient.p_nid order by post_id DESC";
                $query = "SELECT * from post where p_nid = '$user_id' order by post_id DESC";

                $query_run = mysqli_query($conn, $query);
              ?>
              <?php
                if($query_run)
                  {
                    foreach($query_run as $row){
                      
              ?>
                      <!-- &nbsp; -->
                      <br>
                      <div class="fullquestion" id="<?php echo "post".$row['post_id']; ?>">
                      <?php
                        $id = $row['post_id'];
                        $nid = $row['p_nid'];
                        $pcategory = $row['category'];
                        $query2 = mysqli_query($conn,"SELECT * from person where nid = $nid");
                        $person_row = mysqli_fetch_array($query2);
                        $name =$person_row['name']; 
                      ?>
                      <img src="img/<?php echo $person_row['image'] ?>" class="box">                

                      <?php if($person_row['occupation'] == "Doctor"){ ?> 
                        <div class="profilename"><a style="text-decoration:none; float:right;" href="doctorprofile.php?id=<?php echo $nid; ?>"><?php echo $name; ?></a></div>
                        <?php
                          }else{
                          ?>
                            <div class="profilename"><a style="text-decoration:none; float:right;" href="myprofile.php?id=<?php echo $nid; ?>"><?php echo $name; ?></a></div>
                          <?php
                        }
                        ?>
                      <div class="category"><?php echo "#".$pcategory; ?></div>
                      <div class="postcontent">
                        <div class="posid" style="display: none;" ><font color="white"><?php  echo $row['post_id']; ?></font></div>
                        <div class="content" ><?php  echo $row['content']; ?></div> 
                        <!-- <div class="pnid"><?php  echo $row['p_nid']; ?></div>   -->
                        <?php
                          if($user_id == $nid){
                        ?>
                        <span class="button">
                          <!-- <button type="button" class="btn btn-info viewbtn"> VIEW </button> -->
                          <a style="text-decoration:none; float:right;" href="deletepost.php<?php echo '?id='.$id; ?>">&nbsp;<button type="button" class="btn btn-danger deletebtn" style="width: 70px;"> <small>DELETE</small> </button></font></a>
                          <button type="button" style="float:right; width: 65px;" class="btn btn-success editbtn"><small> EDIT </small> </button>
                          <!-- <button type="button" class="btn btn-danger deletebtn"> DELETE </button> -->
                        </span>
                        <?php
                          }
                        ?>
                      </div>
                      <div class="answerbox" >
                        <form action="comment.php" method="post">
                          <br>
                          <hr>
                          Question Answer:<br>
                          <input type="hidden" name="id" value="<?php echo $id; ?>" >
                                          <textarea name="comment_content" rows="2"  style="width: 100%;" placeholder=".........Type your answer here........" required></textarea><br>
                                          <input type="submit" name="comment" class="ans btn btn-primary" value="Answer">
                                        </form>
                                            
                                        <?php 
                                          $comment_query = mysqli_query($conn,"SELECT *  FROM commentpost where post_id = '$id'") or die (mysqli_error());
                                          while ($comment_row=mysqli_fetch_array($comment_query)){
                                          $comment_id = $comment_row['comment_id'];
                                          $comment_by = $comment_row['p_nid'];
                                          $comment_query2 = mysqli_query($conn,"SELECT *  FROM person where nid = '$comment_by'") or die (mysqli_error());
                                          $comment_row2 = mysqli_fetch_array($comment_query2);
                                          $c_name = $comment_row2['name'];
                                          $occupation = $comment_row2['occupation'];
                                          
                                          
                                        ?>
                  
                                        <!-- <br> -->
                                        <div class="commentername">  
                                          <?php if($occupation == "Doctor"){ ?> 
                                          <a href="doctorprofile.php?id=<?php echo $nid; ?>"><b><?php echo $c_name; ?></b></a>
                                          <small>
                                          <font color="gray">
                                          <?php
                                            echo " @";
                                            echo strtolower($occupation);
                                          }	else{
                                            ?>
                                            <a href="myprofile.php?id=<?php echo $nid; ?>"><b><?php echo $c_name; ?></b></a>
                                            <?php
                                          }
                                              ?>
                                          </small>
                                          </font> 
                                        </div>
                                        <div class="answer" id="<?php echo $id; ?>">
                                          
                                          <?php echo $comment_row['content']; ?>
                                        </div>
                                        <div class="comeditdel" id="<?php echo $comment_id.$id; ?>">
                                          <?php 
                                            $sign_id = $user_id;
                                            $query = mysqli_query($conn,"SELECT * from commentpost WHERE p_nid = '$sign_id'") or die (mysqli_error());
                                            
                                            while ($show_row=mysqli_fetch_array($query)){
                                            
                                              if($show_row['p_nid']==$sign_id && $show_row['comment_id']==$comment_id){
                                                //  echo $show_row['p_nid']." ".$sign_id." ".$user_id;
                                          ?>
                                              <div  style="display: none;" ><?php  echo $show_row['post_id']; ?></div>
                                              <div  style="display: none;" ><?php  echo $show_row['comment_id']; ?></div>
                                              <div  style="display: none;" ><?php  echo $show_row['content']; ?></div> 
                                              <!-- <span > -->
                                                
                                                <a style="text-decoration:none; float:right;" href="deletecomment.php?id=<?php echo $show_row['post_id']; ?>&comment_id=<?php echo $show_row['comment_id']; ?>"><button type="button" class="btn btn-outline-danger cdeletebtn" style="width: 60px; height:20px; padding:0px;"> <small>DELETE</small> </button></a>
                                                <button type="button" style="float:right; width: 55px; height: 20px; padding:0px;" class="btn btn-outline-success ceditbtn"><small> EDIT </small> </button>
                                              <!-- </span> -->
                                          <?php }
                                              
                                              
                                            }

                                            $query2 = mysqli_query($conn,"SELECT * FROM commentpost WHERE post_id in (SELECT post_id FROM post WHERE p_nid  = '$sign_id') and p_nid  != '$sign_id'");
                                              while($showpost_row = mysqli_fetch_array($query2)){
                                                if($showpost_row['comment_id']==$comment_id){
                                                  ?>
                                                  <a style="text-decoration:none; float:right;" href="deletecomment.php?id=<?php echo $showpost_row['post_id']; ?>&comment_id=<?php echo $showpost_row['comment_id']; ?>"><button type="button" class="btn btn-outline-danger cdeletebtn" style="width: 60px; height:20px; padding:0px;"> <small>DELETE</small> </button></a>
                                                <?php
                                                }
                                              }


                                          ?>
                                        </div>
                                        <?php
                                          }
                                        ?>


                                      </div>

                                  </div>
                                  <?php
                                  
                                          
                    }
                }
          
            ?>
                   
                <!-- </div> -->
            </div>
            
          </div>

        

        </div>

        
          
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!--footer-->
<footer class="kilimanjaro_area">
        <!-- Top Footer Area Start -->
        
        <!-- Footer Bottom Area Start -->
        <div class=" kilimanjaro_bottom_header_one section_padding_50 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>© All Rights Reserved by <a href="#">OneNationOneIdentity -(with all love)<i class="fa fa-love"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>	
    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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

                $('#updatequestion_id').val(data[0]);
                $('#updatequestion').val(data[1]);
               
            });
        });
    </script>
    <script>
        $(document).ready(function () {

            $('.ceditbtn').on('click', function () {

                $('#editmodalans').modal('show');

                $tr = $(this).closest('div');

                var data = $tr.children("div").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#pos_id').val(data[0]);
                $('#com_id').val(data[1]);
                $('#updateans').val(data[2]);
               
            });
        });
    </script>




  </body>

</html>
