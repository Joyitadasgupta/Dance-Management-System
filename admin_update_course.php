<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
// elseif($_SESSION['usertype']=='student')
// {
//     header("location:login.php");
// }


$host="localhost";
$user="root";
$password="";
$db="artistproject";
  
$data=mysqli_connect($host,$user,$password,$db);
if($_GET['course_id'])
{
    $c_id=$_GET['course_id'];
    $sql="SELECT * FROM course WHERE id='$c_id' ";
    $result=mysqli_query($data,$sql);
    $info=$result->fetch_assoc();
}

if(isset($_POST['update_course']))
{
    $id=$_POST['id'];
    $c_name=$_POST['form'];
    $c_des=$_POST['description'];
    $file=$_FILES['image']['name'];
    $dst="./image/".$file;
    $dst_db="image/".$file;

    move_uploaded_file($_FILES['image']['tmp_name'],$dst);
    if ($file)
    {

    $sql2="UPDATE course SET  form='$c_name',description='$c_des', image='$dst_db' WHERE id='$id' ";
    }
    else
    {
        $sql2="UPDATE course SET  form='$c_name',description='$c_des' WHERE id='$id' ";   
    }
    $result2=mysqli_query($data,$sql2);
    if ($result2)
    {
       header('location:admin_view_course.php');
    }
}

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
<style type="text/css">
    label
    {
        display: inline-block;
        width: 150px;
        text-align: right;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .form_deg
    {
        background-color: skyblue;
        width:600px;
        padding-top: 70px;
        padding-bottom: 70px;
    }
</style>

</head>
<body>
 
<?php

include 'admin_sidebar.php';



?>
<div class="content">
    <center>
    <h1>Update Course Data</h1>
    <form class="form_deg" action="admin_update_course.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="id" value="<?php echo "{$info['id']}"   ?>" hidden>
        <div>
            <label>Dance Form</label>
            <input type="text" name="form" value="<?php echo "{$info['form']}"   ?>">
        </div>
        <div>
            <label>About Dance</label>
           <textarea name="description" rows="4"><?php echo "{$info['description']}"   ?></textarea>
        </div>
        <div>
            <label>Course Old Image</label>
            <img width="100px" height="100px" src="<?php echo "{$info['image']}"   ?>" alt="">
        </div>
        <div>
            <label>Choose Course New Image</label>
            <input type="file" name="image">
        </div>
        <div>
            <input type="submit" name="update_course" class="btn btn-success">
        </div>
    </form>
</center>
</div>


</body>
</html>