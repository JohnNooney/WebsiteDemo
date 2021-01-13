<?php
ob_start();
session_start();

include("../model/php/api_block2.php") ;

//makes sure post has been initiated
if(isset($_POST['submitAnswer']))
{
    echo $_POST['answer'];
    //filter and sanatize user inputs
    $answer =  filter_var($_POST['answer'], FILTER_SANITIZE_STRING);

    //protect against sql injection
    $answer = mysqli_real_escape_string($conn,$answer);

    $data -> userId = $_POST['userIdtest'];
    $data -> dttm = $_POST['dttm'];
    $data -> qno = $_POST['qno'];
    $data -> answer = $answer;
    $datatxt = json_encode($data);
    $res = postAnswer($datatxt) ;

    header("Location: /~1803534/cmp306/view/block2.php");

}

include("../../block1/model/php/close_connection.php") ;
 ?>
