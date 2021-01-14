<?php
ob_start();
session_start();

include("../model/api_block2.php") ;

//makes sure post has been initiated
if(isset($_POST['create']))
{
    //filter and sanatize inputs
    $firstname =  filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
    $surname =  filter_var($_POST['surname'], FILTER_SANITIZE_STRING);
    $nicname =  filter_var($_POST['nicname'], FILTER_SANITIZE_STRING);
    $email =  filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $password =  filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    //protect against sql injection
    $firstname = mysqli_real_escape_string($conn,$firstname);
    $surname = mysqli_real_escape_string($conn,$surname);
    $nicname = mysqli_real_escape_string($conn,$nicname);
    $email = mysqli_real_escape_string($conn,$email);
	$password = mysqli_real_escape_string($conn,$password);

    //hash the password for data protection
    $hashPass = password_hash($password, PASSWORD_DEFAULT);

    // Note there is a severe lack of security here ****sanatize data
    $data -> firstname = $firstname;
    $data -> surname = $surname;
    $data -> nicname = $nicname;
    $data -> email = $email;
    $data -> password = $hashPass;
    $datatxt = json_encode($data);
    $res = signUp($datatxt) ;

    header("Location: /~1803534/cmp306/block2/view/block2.php");

}

include("../../block1/model/close_connection.php") ;
 ?>
