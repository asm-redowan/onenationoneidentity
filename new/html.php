<!DOCTYPE html>
<html lang ="en">


<head>
	<?php include('connection.php'); ?>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Document</title>
    <link rel="stylesheet" href="css.css">

</head>

<body>
	
	<div class="wrapper">
		<div class="sidebar">

			<!-- Profile image-->

         <div class="profile">
         	<img src="doctor.jpg"alt="">
         	<h3>Patient</h3>

		</div>

		<!-- menu item -->
		<ul>
                <li>
                    <a href="#" class="active">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item">Home</span>
                    </a>
                </li>
                <li>
                    <a href="patient_info.php">
                        <span class="icon"><i class="fas fa-address-card"></i></span>
                        <span class="item">My Dashboard</span>
                        
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">Doctor checklists</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-hospital"></i></span>
                        <span class="item">Hospital</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-clinic-medical"></i></span>
                        <span class="item">Branch List</span>
                    </a>
                </li>

                 
                  <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-pills"></i></span>
                        <span class="item">Drug</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-prescription"></i></span>
                        <span class="item">Prescription</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-user-shield"></i></span>
                        <span class="item">Doctors Degree</span>
                    </a>
                </li>

                 <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-grin"></i></span>
                        <span class="item">Child Info(under 18)</span>
                    </a>
                </li>


                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="item">Settings</span>
                    </a>
                </li>
            </ul>

        </div>
      
           <!-- Top menu ber -->


        <div class="section">
            <div class="top_navbar">
                <div class="hamburger">
                    <a href="#"><i class="fas fa-bars"></i></a>
                </div>
            </div>

        </div>

        <!-- Active menu button using jscript -->

        <script>
        var hamburger = document.querySelector(".hamburger");
    hamburger.addEventListener("click", function(){
    document.querySelector("body").classList.toggle("active");
    })
    	
    </script>

</body>
</html>