<?php
ob_start();
session_start();

//$_POST['red'] = '4';
//$_POST['green'] = '1';
//$_POST['green_state'] = '0';

include("../model/api_block3.php") ;
if(empty($_POST))
{
    //get the data from the db to see what the state the LEDs are on the IOT device is
    $data = getLEDState();
    $ledData = json_decode($data);
    //var_dump($ledData);

    //$pin5 = $ledData[0]-> pin;
    $state5 = $ledData[0]-> state;
    //$pin7 = $ledData[1]-> pin;
    $state7 = $ledData[1]-> state;

    //encode array with parsed json info
    $pinStates = array();
    $pinStates['pin5'] = $state5;
    $pinStates['pin7'] = $state7;

    //echo for AJAX to recieve
    echo json_encode($pinStates); 
}

//if red led state needs to change
if(isset($_POST['red']))
{
    //state = 0 if already 1 and vice versa
    $state = 1 - $_POST['red_state'];
    //echo $state;

    //$pinState = array();
    $pinState -> pin = 5;
    $pinState -> state = $state;

    $data = json_encode($pinState);
    setLEDState($data);

    //make http request to IoT Device Agent
    header("Location: https://agent.electricimp.com/8AidOZTOxGum?pin=5&state=".$state."");
}
if(isset($_POST['green']))
{
    echo $_POST['green_state'];
    //state = 0 if already 1 and vice versa
    $state2 = 1 - $_POST['green_state'];
    echo $state2;

    //$pinState = array();
    $pinState -> pin = 7;
    $pinState -> state = $state2;

    $data = json_encode($pinState);
    setLEDState($data);

    //make http request to IoT Device Agent
    header("Location: https://agent.electricimp.com/8AidOZTOxGum?pin=7&state=".$state2."");
}


include("../../block1/model/close_connection.php");
?>