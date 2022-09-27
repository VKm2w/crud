
<?php
  
include 'connect.php';

$err_count=0;
// error_reporting(E_ALL);
  if(isset($_POST['submit'])){

     //include 'validation.php'; 
     if($err_count==0)
     {
      $name=$_POST['name'];

      $name = htmlentities($name);
      $email=$_POST['email'];
      $password=$_POST['password'];

      $sql="INSERT INTO user (name,email,password) VALUES
       ('$name','$email','$password')";
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
<!doctype html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Crud</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
     
     <div id="result" ></div>
          <h1>Create Record </h1>

     <div class="container">
          

          <!-- form start from here  -->
          <form method="post" id="formID"  action="json1.php"  onsubmit="return abc()" >
               <input type="hidden" name="submit" value="1">
               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    
                    <input type="text" name="name" id="name" class="form-control" >
                   
               </div>

               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                     
                    <input type="email" name="email" class="form-control" >
                    
               </div>

               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Password</label>
                     
                    <input type="text" name="password" class="form-control" >
                    
               </div>
               
               <button type="submit"  class="btn btn-primary">Submit</button>
               <button type="button" class="btn btn-danger"><a href="display.php" class="text-light">Back</a></button>
          </form>

          <!-- end here  -->

     </div>
     
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

<script type="text/javascript">
     
function abc()
{
     event.preventDefault();
     $.ajax({
         type: "POST",
         url: 'json1.php',
         data : ($("#formID").serialize()),
         dataType: "json",
         //dataType:"jsonp"
         success: function(response){
             $( "#result" ).empty().html( response.message );
             if(response.success)
             {
               $("#formID")[0].reset();
               //document.getElementById('id').focus();
             }
         },
         error: function(response){
             alert('something goes wrong');
         }
       });
 
}



</script>

</html>