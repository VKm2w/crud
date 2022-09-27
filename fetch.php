<?php
  
include 'connect.php';

$err_count=0;
// error_reporting(E_ALL);
  if(isset($_POST['submit'])){

     include 'validation.php'; 
     if($err_count==0)
     {
      $name=$_POST['name'];

      $name = htmlentities($name);
      $email=$_POST['email'];
      $password=$_POST['password'];

      $sql="insert into user (name,email,password)values('$name','$email','$password')";
      $result=mysqli_query($conn,$sql);
      if($result){

          header('location: display.php');
      } 
      else
      {
          // die("Error".mysqli_connect_error());
          echo "error";
      }
     }

}
?>