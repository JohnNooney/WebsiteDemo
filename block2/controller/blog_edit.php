<?php
ob_start();
session_start();

include("../model/api_block2.php") ;

//makes sure post has been initiated
if(isset($_POST['editAnswer']))
{
    echo $_POST['answer'];
    echo $_POST['ano'];
    //filter and sanatize user inputs
    $answer =  filter_var($_POST['answer'], FILTER_SANITIZE_STRING);

    //protect against sql injection
    $answer = mysqli_real_escape_string($conn,$answer);

    $data -> ano = $_POST['ano'];
    $data -> edited = 1;
    $data -> answer = $answer;
    $datatxt = json_encode($data);
    $res = editAnswer($datatxt) ;

    header("Location: /~1803534/cmp306/block2/view/block2.php");

}

if(isset($_POST['editQuestion']))
{
    echo $_POST['question'];
    echo $_POST['qno'];
    //filter and sanatize user inputs
    $question =  filter_var($_POST['question'], FILTER_SANITIZE_STRING);

    //protect against sql injection
    $question = mysqli_real_escape_string($conn,$question);

    $data -> qno = $_POST['qno'];
    $data -> edited = 1;
    $data -> question = $question;
    $datatxt = json_encode($data);
    $res = editQuestion($datatxt) ;

    header("Location: /~1803534/cmp306/block2/view/block2.php");

}

if(isset($_POST['deleteQuestion']))
{
    $data -> qno = $_POST['qno'];
    $datatxt = json_encode($data);
    $res = deleteQuestion($datatxt) ;

    header("Location: /~1803534/cmp306/block2/view/block2.php");

}

if(isset($_POST['deleteAnswer']))
{
    $data -> ano = $_POST['ano'];
    $datatxt = json_encode($data);
    $res = deleteAnswer($datatxt) ;

    header("Location: /~1803534/cmp306/block2/view/block2.php");

}

include("../../block1/model/close_connection.php") ;
 ?>
