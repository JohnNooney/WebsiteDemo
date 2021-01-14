<?php
ob_start();
session_start();

include("../model/api_block3.php") ;

//makes sure post has been initiated
$data = getTempData();
$pindata = json_decode($data, true);
//var_dump($pindata);

$pin8Data = array();
$pin9Data = array();
$times = array();

//parse the data into their respective data sets
foreach ($pindata['pin8'] as $temp) {
    $pin8Data[] =  $temp['temp'];
}

foreach ($pindata['pin9'] as $temp) {
$pin9Data[] =  $temp['temp'];
}

foreach ($pindata['pin8'] as $datetime) {
    //$time = substr($datetime['time'], 11);
    $times[] =  $datetime['time'];
}


//send data to unifing array to be encoded and sent to graph_init
$graphData = array();
$graphData['pin8Temps'] = $pin8Data;
$graphData['pin9Temps'] = $pin9Data;
$graphData['time'] = $times;

echo json_encode($graphData);

// var_dump($pin8Data) ;
// echo "<br><br>";
// var_dump($times);

// //echo $pin9Data;

include("../../block1/model/close_connection.php");
?>
