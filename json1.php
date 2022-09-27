<?php
include 'connect.php';
$aa = true ;
$response['statusCode'] = '404';
$response['success'] = false;
$response['message'] = '<div class="alert alert-danger">  <strong>Danger!</strong> Something went wrong</div>';
if (isset($_POST['submit'])) {
    $response['message'] = '';
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $err_count = 0;

    function RemoveSpecialChar($value)
    {
        $err_count++;
        $res=preg_match('/[^a-zA-z0-9_-]/s','', $value);
        return $res;
        }
        echo $res;
        exit;
    
    if(empty($name))
    {
        $err_count++;
        $response['message'] .= '<div class="alert alert-danger">  <strong>Danger!</strong> Name is missing</div>';
    }
    elseif(RemoveSpecialChar($name)) 
    {
    $response['message'] .= '<div class="alert alert-danger">  <strong>Danger!</strong> Name </div>';
    }

    if(empty($email))
    {
        $err_count++;
        $response['message'] .= '<div class="alert alert-danger">  <strong>Danger!</strong> email is missing</div>';
    }

    if(empty($password))
    {
        $err_count++;
        $response['message'] .= '<div class="alert alert-danger">  <strong>Danger!</strong> Password is missing</div>';
    }

    $sql = "insert into user (name,email,password) values('$name','$email','$password')";
    if($err_count==0)
    {
      $result = mysqli_query($conn, $sql);
        if ($result) {
            //header('location: display.php');
            $response['success'] = true;
            $response['message'] = '<div class="alert alert-success">  <strong>Success!</strong> Record saved successfully</div>';
        } else {
            //die("Error" . mysqli_connect_error());
            $response['message'] = '<div class="alert alert-danger">  <strong>Danger!</strong> Error while saving</div>';
        }
    }
    else
    {

    }
}
echo json_encode($response);
?>