<?php









$nameerr=$emailerr=$passworderr="";
$name = $email = $password = "";
$err_count = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["name"])){
        $nameerr=" Name is mandatory";
        $err_count++;
    }
    else{
        $name=test_input($_POST["name"]);
    }

    if(empty($_POST["email"])){
        $err_count++;
        $emailerr=" Mail Is Mandatory";
    }
    else{
        $email=test_input($_POST["email"]);
    }

    if(empty($_POST["password"])){
        $err_count++;
        $passworderr=" Password is mandatory";
    }
    else{
        $password=test_input($_POST["password"]);
    }
   echo 1;
    if($err_count==0)
    {
       //header('location: index.php');
   }
    else{
        //header('location: display.php');
    }

}
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}


?>