

<?php include('dbconn.php'); ?> 
<?php
    $message=""; 
    if(isset($_POST['submit'])){
        $nid = $_POST['nid'];
        $finger_print = $_POST['finger_print'];
        $retina_print = $_POST['retina_print'];
        $query1 = mysqli_query($conn,"SELECT * FROM person where nid = '$nid' and finger_print = '$finger_print' and retina_print = '$retina_print' and isalive = 'yes'");
        $person_row = mysqli_fetch_array($query1);
        $query2 = mysqli_query($conn,"SELECT * FROM patient where p_nid = '$nid'");
        $patient_row = mysqli_fetch_array($query2);
        if($person_row!=NULL && $patient_row==NULL){
            header("location:preview.php?id=".$nid);
        }else{
            $message = "Worng Information!";
        }
    }

?>
<html>
<style>

.center {
text-align: center;
color: red;
}
    *{margin: 0; padding: 0;}
    body{background: #ecf1f4; font-family: sans-serif;}
    
    .form-wrap{ width: 320px; background: #3e3d3d; padding: 40px 20px; box-sizing: border-box; position: fixed; left: 50%; top: 50%; transform: translate(-50%, -50%);}
    h1{text-align: center; color: #fff; font-weight: normal; margin-bottom: 20px;}
    
    input{width: 100%; background: none; border: 1px solid #fff; border-radius: 3px; padding: 6px 15px; box-sizing: border-box; margin-bottom: 20px; font-size: 16px; color: #fff;}
    
    input[type="button"]{ background: #bac675; border: 0; cursor: pointer; color: #3e3d3d;}
    input[type="button"]:hover{ background: #a4b15c; transition: .6s;}
    
    ::placeholder{color: #fff;}

</style>

<body>

    <div class="form-wrap">
    
        <form action="" method="POST">
        
            <h1>Register</h1>
            <center><font color="red"><h4><?php echo $message; ?></h4></font></center>
            <br>
            <input type="number" placeholder="nid"  name="nid">
            <input type="number" placeholder="finger print"  name="finger_print">
            <input type="number" placeholder="retina print"  name="retina_print">
           <!-- <input type="text" placeholder=password  name="password"> -->


           <a href='l.php?'>
            <input type="submit" name="submit" placeholder=submit value="Next"/>
</a>
        </form>
    
    </div>



</body>



</html>
