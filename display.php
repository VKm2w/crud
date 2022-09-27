<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "insert into 'user'(name,email,password)values('$name','$email','$password')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location: display.php');
    } else {
        die("Error" . mysqli_connect_error());
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        table {
  counter-reset: section;
}

.serialno:before {
  counter-increment: section;
  content: counter(section);
}

    </style>

<body>
    <div class="container">
        <h1>Crud </h1>
        <!-- Table begins from here  -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sr No.</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col" colspan="2" text-align="center">Action</th>
                </tr>
                
            </thead>
           
            <tbody>
              <?php
                 $sql="select * from user";

                 $result=mysqli_query($conn,$sql);

                 // print_r($result);
                 
                    if($result){
                        while($r=mysqli_fetch_assoc($result)){

                            $id=$r['id'];
                            $name=$r['name'];
                            $email=$r['email'];
                            $password=$r['password'];

                          echo '<tr>
                           <td class="serialno"></td>
                          <th scope="row">'.$id.'</th>
                          <td>'.$name.'</td>
                          <td>'.$email.'</td>
                          <td>'.$password.'</td>
                          <form action="http://www.google.com/search">
                           <td>   <button type="button" class="btn btn-dark"><a href="updat.php?updateid='.$id.'" class="text-light">Update </a></button></td>
                           <td>   <button type="button" class="btn btn-danger"><a href="delete.php?deleteid='.$id.'"  class="text-light" onclick="return confirm("Are you sure you want to search Google?")">Delete </a></button></td>
                             </tr>
                           
                            </form>
                            ';

                            
                        }
                    }
                 
              ?>
            
         
           
            </tbody>
        </table>
        <button type="button" class="btn btn-primary"><a href="index.php" class="text-light">Create</a></button>

       
        <!-- End Here  -->

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>