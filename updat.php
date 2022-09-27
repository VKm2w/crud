<?php
  include 'connect.php';

  $id=$_GET['updateid'];
  
  $sql1="select * from user where id=$id";
  $result0=mysqli_query($conn,$sql1); 
  $row=mysqli_fetch_assoc($result0);
  $fname=$row['name'];
  $femail=$row['email'];
  $fpassword=$row['password'];


  if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="update `user` set id=$id, name='$name', email='$email', password='$password' where id=$id";
    $result=mysqli_query($conn,$sql);
    
    if($result){
        header('location: display.php');
    }
    else{
        echo "error";
    }
  }

?>



<!doctype html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Crud App</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
     <div class="container">
          <h1>Update Crud Record</h1>

          <!-- form start from here  -->
          <form method="post">
               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" name="name"  class="form-control"  value=<?php echo $fname; ?>   >
                   
               </div>

               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"  value=<?php echo $femail; ?>  >
                    
               </div>

               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Password</label>
                    <input type="text" name="password" class="form-control"  value=<?php echo $fpassword; ?>  >
                    
               </div>
               

               <button type="submit" name="submit" class="btn btn-danger">Update</button>
               <button type="button" class="btn btn-primary"><a href="display.php" class="text-light">Back</a></button>
          </form>

          <!-- end here  -->

     </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0
     jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>