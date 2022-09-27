
<?php
$err_count = 0;
include 'connect.php';

if (isset($_POST['submit'])) {
     include 'val.php';
     if ($err_count == 0) {
          $name = $_POST['name'];

          $name = htmlentities($name);
          $email = $_POST['email'];
          $password = $_POST['password'];

          $sql = "insert into `crud`(name,email,password)values('$name','$email','$password')";
          $result = mysqli_query($conn, $sql);
          if ($result) {

               header('location: display.php');
          } else {
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
     <title>Crud App</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
     <div class="container">
          <h1>Create Crud</h1>

          <!-- form start from here  -->
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onclick="abc()">
               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>

                    <?php if ($err_count > 0 && !empty($namerr)) { ?>
                         <span><?php echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>' . $namerr . '</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>'; ?></span>
                    <?php } ?>


                    <input type="text" name="name" value="<?php if (!empty($_POST['name'])) {
                                                                 echo $_POST['name'];
                                                            } ?>" class="form-control">

               </div>

               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <?php if ($err_count > 0 && !empty($emailrr)) { ?>
                         <span><?php echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>' . $emailrr . '</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>'; ?></span>
                    <?php } ?>
                    <input type="email" name="email" value="<?php if (!empty($_POST['email'])) {
                                                                 echo $_POST['email'];
                                                            } ?>" class="form-control">

               </div>

               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Password</label>
                    <?php if ($err_count > 0 && !empty($passworderr)) { ?>
                         <span><?php echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>' . $passworderr . '</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>'; ?></span>
                    <?php } ?>

                    <input type="text" name="password" value="<?php if (!empty($_POST['password'])) {
                                                                      echo $_POST['password'];
                                                                 } ?>" class="form-control">

               </div>

               <button type="submit" name="submit" class="btn btn-success">Submit</button>
               <button type="button" class="btn btn-danger"><a href="display.php" class="text-light">Back</a></button>
          </form>

          <!-- end here  -->

     </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>






<script type="text/javascript">
     
function abc()
{
     event.preventDefault();
     alert(!);
     $.ajax({
         type: "POST",
         url: 'change.php',
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
<!-- 
<script>
     // window.addEventListener("load", function(){
     // alert(2)

     // })

     // alert(1);

     window.alert("hello");
</script> -->