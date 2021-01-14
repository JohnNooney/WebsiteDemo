<?php
ob_start();
session_start();

include("../model/api_block2.php") ;

//makes sure post has been initiated
if(isset($_POST['signout']))
{
    //no need to sanatize since the input is never accessed by the user
    //verify that the logout id exists then log out
    $data -> userId = $_POST['logoutId'];
    $datatxt = json_encode($data);
    $res = logout($datatxt) ;

    header("Location: /~1803534/cmp306/block2/view/block2.php");

}

include("../../block1/model/php/close_connection.php") ;
 ?>
