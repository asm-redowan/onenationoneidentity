
<!DOCTYPE html>
<html>
<head>
 <?php include('connection.php'); ?>
</head>
<body>
   

<!-- <p>Click Button What Do you Need:</p> -->

  <?php
           $query = "SELECT *  FROM `person` ";
  
  // FETCHING DATA FROM DATABASE
  $result = $conn->query($query);
  
    if ($result->num_rows > 0) 
    {
        // OUTPUT DATA OF EACH ROW
        while($row = $result->fetch_assoc())
        {
             echo "NID: ". 
                $row["nid"]. " - Name: " .
                $row["name"]. " | Finger Print: " . 
                $row["finger_print"]. " | Retina Print: " . 
                $row["retina_print"]. " | Blood ".
                $row["blood"]. " | Year Income : " .
                $row["yearly_income"]. " | Date of Birth: " . 
                $row["dob"]. " | Gender: " . 
                $row["gender"] . "<br>";
        }
    } 
  
  else {
        echo "0 results";

        }

      

     

       
    ?>

</body>
</html>






