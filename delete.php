<?php
include'connect.php';
 // echo 'deleted succesfully';
if (isset($_GET['deleteid'])) {
    
$id=$_GET['deleteid'];

$query="delete from user where id=$id";
 $result1=mysqli_query($conn,$query);
    if($result1)
    {
        // echo 'deleted succesfully';
        header('location:display.php');
    }


}







                 
?>