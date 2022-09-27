
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
     
    // function RemoveSpecialChar($str)
    // {
    //     $res = preg_replace('/[0-9\@\.\;\" "]+/', '', $str);
    //     return $res;
    // }
    // $str = "My name is  hello and email hello.world598@gmail.com;";
    // $str1 = RemoveSpecialChar($str);
    // echo "My UpdatedString: ", $str1;

    function RemoveSpecialChar($value){
        $result  = preg_replace('/[^a-zA-Z0-9_ -]/s','',$value);
        return $result;
        }

        if(RemoveSpecialChar($name)){
            $err_count++;
            $response['message'] .= '<div class="alert alert-danger">  <strong>Danger!</strong>Special Character Not Allowed</div>';
        }
  
    if(empty($name))
    {
        $err_count++;
        $response['message'] .= '<div class="alert alert-danger">  <strong>Danger!</strong> Name is missing</div>';
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

    $sql = "insert into crud (name,email,password) values('$name','$email','$password')";
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