<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
// elseif($_SESSION['usertype']=='admin')
// {
//     header("location:login.php");
// }

 
$host="localhost";
$user="root";
$password="";
$db="artistproject";

$data=mysqli_connect($host,$user,$password,$db);
$sql="SELECT * FROM teacher";
$result=mysqli_query($data,$sql);

// if($_GET['teacher_id'])
// {
//     $t_id=$_GET['teacher_id'];
//     // $sql2="DELETE FROM teacher WHERE id='$t_id' ";
//   //  $result2=mysqli_query($data,$sql2);
//     if($result2)
//     {
//         header('location:student_course.php');
//     }
// }

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <?php

include 'student_css.php';



?>
<style type="text/css">

    .table_th
    {
        padding: 20px;
        font-size: 20px;

    }
    .table_td
    {
        padding: 20px;
        background-color: skyblue;
    }

</style>

</head>
<body>
 
<?php

include 'student_sidebar.php';



?>
<div class="content">
         <center>
     
    <h1>View All Teacher Data</h1>

     <table border="2px">
        <tr>
            <th class="table_th">Teacher Name</th>
            <th class="table_th">About Teacher</th>
            <th class="table_th">Image</th>
            <!-- <th class="table_th">Delete</th>
            <th class="table_th">Update</th> -->
        </tr>

            <?php
               while($info=$result->fetch_assoc())
               {
           ?>


        <tr>
           <td class="table_td"><?php echo "{$info['name']}" ?></td>
           <td class="table_td"><?php echo "{$info['description']}" ?></td>
           <td class="table_td"><img height="100px" width="100px" src="<?php echo "{$info['image']}" ?>"></td>
           <!-- <td class="table_td"></td> -->
        
            
               </tr>
         <?php
               }
         ?>

     </table>


</center>

</div>


   </body>
</html>