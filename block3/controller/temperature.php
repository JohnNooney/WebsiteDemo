<?php
include("../model/api_block3.php") ;
//  get the new data
$message = file_get_contents('php://input') ;

$res = createMessage($message) ;
echo "Added Record - ".$message;

include("../../block1/model/close_connection.php");
?>
