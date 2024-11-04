<?php

error_reporting(0);
session_start();
session_destroy();


if($_SESSION['message'])
{

$message=$_SESSION['message'];

echo "<script type='text/javascript'>

alert('$message');



</script>";

}

$host="localhost";
$user="root";
$password="";
$db="artistproject";

$data=mysqli_connect($host,$user,$password,$db);

$sql="SELECT * FROM teacher";
$result=mysqli_query($data,$sql);


$host="localhost";
$user="root";
$password="";
$db="artistproject";

$data=mysqli_connect($host,$user,$password,$db);

$sql="SELECT * FROM course";
$result1=mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dance Management System</title>
    <link rel="stylesheet" type = "text/css" href="style.css">

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <label class="logo">Dance School</label>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>

    <div class="section1">
        <label class="img_text" >We Teach Students With Care</label>
        <img class="main_img" src="homepage.jpg" alt="">
    </div>

    <div class="container">

    <div class="row">
        <div class="col-md-4">
            <img class="welcome_img" src="danceschool.jpg" alt="">

        </div>
        <div class= "col-md-8">
            <h1>Weclome to Dance School</h1>
            <p><h4>Dance is a divine art form that allows people to express a wide range of thoughts and emotions. Several people use dance to alleviate stress, while others see it as an opportunity to express feelings to their loved ones. The heart of dance is considered to be the soul, while the soul of music is considered to be the heart. You might be curious about a dance form that has nothing to do with music and is solely based on beats. In contrast to dance forms that include music, this type of dance takes more energy and effort</h4></p>
        </div>
    </div>
    </div>
    <center>
        <h1>Our Teachers</h1>
    </center>
    <div class="container">
        <div class="row">

         <?php
           
         while($info=$result->fetch_assoc())
         {

         ?>


            <div class="col-md-4">
                <img class="teacher" src="<?php echo "{$info['image']}"  ?>">
                <h3><?php echo "{$info['name']}"  ?></h3>
                <h5><?php echo "{$info['description']}"  ?></h5>
         </div>
            <?php
         }
         ?>
           
        </div>
    </div>
    <center>
        <h1>Our Courses</h1>
    </center>
    <div class="container">
        <div class="row">
        <?php
           
           while($info=$result1->fetch_assoc())
           {
  
           ?>
  
  
              <div class="col-md-4">
                  <img class="teacher" src="<?php echo "{$info['image']}"  ?>">
                  <h3><?php echo "{$info['form']}"  ?></h3>
                  <h5><?php echo "{$info['description']}"  ?></h5>
           </div>
              <?php
           }
           ?>
        </div>
    </div>
    <center><h1>Admission Form</h1></center>
    <div align="center" class="admission_form">
        <form action="data_check.php" method="POST">
        
            <div class="adm_int">
                <label class="label_text">Candidate Name</label>
                <input class="input_deg" type="text" name="candidate name" required />
                
            </div>
            <div class="adm_int">
                <label class="label_text">Gurdian Name</label>
                <input class="input_deg"  type="text" name="gurdian name" required />
                
            </div>
            <div class="adm_int">
                <label class="label_text">Email</label>
                <input class="input_deg"  type="email" name="email" required />
              
            </div>
            <div class="adm_int">
                <label class="label_text">Address</label>
                <input class="input_deg"  type="text" name="address" required />
                
            </div>
            <div class="adm_int">
                <label class="label_text">Phone</label>
                <input class="input_deg"  type="text" name="phone"   pattern ="[0-9]{10}" title ="Phone Number must be 10 digits" required />
               
            </div>
            <div class="adm_int">
                <label class="label_text">Dance Forms</label>
                <select name="dance_forms" required />
                   <option value="">--Select--</option>
                   <option value="odissi">Odissi</option>
                   <option value="kathak">Kathak</option>
                   <option value="Ballet">Ballet</option>  
                </select>
            </div>
            <div class="adm_int">
                <input class="btn btn-primary" id="submit" type="submit"  value="apply" name="apply">
            </div>
        </form>

    </div>
</body>
</html> 