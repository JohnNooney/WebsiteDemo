<?php
ob_start();
session_start();

include("../model/php/api_block2.php") ;

//makes sure post has been initiated
if(isset($_POST['login']))
{
    //filter and sanatize inputs
    $email =  filter_var($_POST['Email'], FILTER_SANITIZE_STRING);
    $password =  filter_var($_POST['Password'], FILTER_SANITIZE_STRING);

    $email = mysqli_real_escape_string($conn,$email);
	$password = mysqli_real_escape_string($conn,$password);

    // Note there is a severe lack of security here ****sanatize data
    $data -> email = $email;
    $data -> password = $password;
    $datatxt = json_encode($data);
    $res = login($datatxt) ;

    header("Location: /~1803534/cmp306/view/block2.php");

}

include("../../block1/model/php/close_connection.php") ;
 ?>
