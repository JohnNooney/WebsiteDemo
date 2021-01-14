<?php
ob_start();
session_start();

include("../model/api_block2.php") ;

//makes sure post has been initiated
if(isset($_POST['submitQuestion']))
{
    //filter and sanatize user inputs
    $question =  filter_var($_POST['question'], FILTER_SANITIZE_STRING);

    //protect against sql injection
    $question = mysqli_real_escape_string($conn,$question);

    $data -> userId = $_POST['userId'];
    $data -> dttm = $_POST['dttm'];
    $data -> question = $question;
    $datatxt = json_encode($data);
    $res = postQuestion($datatxt) ;

    header("Location: /~1803534/cmp306/block2/view/block2.php");

}

include("../../block1/model/close_connection.php") ;
 ?>
