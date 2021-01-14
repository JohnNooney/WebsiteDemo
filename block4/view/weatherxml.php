<?php 
//start session to keep track of $_SESSION
ob_start();
session_start();

$currentTime = new DateTime();

//if the session is already started then generate a time variable that has 5min added to the session var
//used for checking to make sure not too many calls weather station rss
// if(isset($_SESSION['time']))
// {

// }

//display error messages
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//if session is not set or last time loaded is 5min ago
//if (isset($_SESSION['time']) || $_SESSION['time']->add(new DateInterval('PT1M')) < $currentTime) {
    //  code for loading the xml data from weather
    //$xml = new DOMDocument();
    $xml = simplexml_load_file('https://retro.yr.no/place/United_Kingdom/England/London/forecast.xml');
    //$_SESSION['time'] = new DateTime(); //set the time to compare
    //print_r($xml);

    $xsl = new DOMDocument;
    $xsl->load('weatherxsl.xsl');

    $proc = new XSLTProcessor() ;
    $proc->importStyleSheet($xsl);
    $result = $proc->transformtoXML($xml) ;

    echo $result;

//}






?>