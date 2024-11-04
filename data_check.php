<?php
session_start();
error_reporting(0);
$host="localhost";
$user="root";
$password="";
$db="artistproject";
$data=mysqli_connect($host,$user,$password,$db);
if($data===false)
{
    die("connection error");
}
if(isset($_POST['apply']))
{
    
// if(empty($data_cname) || empty($data_address) || empty($data_dname) || empty($data_email)){
//     die("Error:All fields must be filled");

// }
// else{

    $data_cname=$_POST['candidate_name'];
    $data_gname=$_POST['gurdian_name'];
    $data_email=$_POST['email'];
    $data_address=$_POST['address'];
    $data_phone=$_POST['phone'];
    $data_dname=$_POST['dance_forms'];

//     $query = "SELECT * FROM admission WHERE email = $data_email";
//    $result = mysqli_query($data,$query);
//     $num_rows = mysqli_num_rows;
//     if(mysqli_num_rows($result)>0){
//         echo "<script type='text/javascript'>alert('Your Application Send Successfully')
//       </script>";
//     }
//     else{



      
    $sql="INSERT INTO admission (candidate_name,gurdian_name,email,address,phone,dance_forms)
    VALUES ('$data_cname','$data_gname','$data_email','$data_address','$data_phone','$data_dname')";
    $result=mysqli_query($data,$sql);
    if($result)
    {
      echo "<script type='text/javascript'>alert('Your Application Send Successfully')
      </script>";
    }
    
    else
    {
        echo "Apply unsuccessful";
    }


}


?>
