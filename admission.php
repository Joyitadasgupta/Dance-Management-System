<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
elseif($_SESSION['usertype']=='student')
{
    header("location:login.php");
}
elseif($_SESSION['usertype']=='teacher')
{
    header("location:login.php");
}

$host="localhost";
$user="root";
$password="";
$db="artistproject";

$data=mysqli_connect($host,$user,$password,$db);
$sql="SELECT * from admission";
$result=mysqli_query($data,$sql);

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

     <?php

     include 'admin_css.php';



     ?>

</head>
<body>
 
        <?php

          include 'admin_sidebar.php';



        ?>

<div class="content">
    <center>
    <h1>Applied For Admission</h1>
    <br>
    <table border="2px">
        <tr>
            <th style="padding: 20px; font-size: 15px";>Candidate Name</th>
            <th style="padding: 20px; font-size: 15px";>Gurdian Name</th>
            <th style="padding: 20px; font-size: 15px";>Email</th>
            <th style="padding: 20px; font-size: 15px";>Address</th>
            <th style="padding: 20px; font-size: 15px";>Phone</th>
            <th style="padding: 20px; font-size: 15px";>Dance Forms</th>
        </tr>
       <?php
       
         while($info=$result->fetch_assoc())
         {

       ?>
        <tr>
            <td style="padding: 20px";><?php echo "{$info['candidate_name']}";  ?></td>
            <td style="padding: 20px";><?php echo "{$info['gurdian_name']}";  ?></td>
            <td style="padding: 20px";><?php echo "{$info['email']}";  ?></td>
            <td style="padding: 20px";><?php echo "{$info['address']}";  ?></td> 
            <td style="padding: 20px";><?php echo "{$info['phone']}";  ?></td>
            <td style="padding: 20px";><?php echo "{$info['dance_forms']}";  ?></td>
        </tr>
        <?php
         }
         ?>
    </table>
        </center>
</div>


</body>
</html>