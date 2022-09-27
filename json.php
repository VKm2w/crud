<?php
include 'connect.php';
echo'7777';
$a = true ;
$sql="SELECT * FROM `user` ";
$res=mysqli_query($conn,$sql);

// if ($res) {
// 		// echo $a;
// 	echo 'success';

// echo}

while ($rr=mysqli_fetch_assoc($res)) {
	$id= $rr['id'];
	$name= $rr['name'];
	$email= $rr['email'];
}



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<h2>Crud record</h2>
</body>
</html>
 
