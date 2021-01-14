<?php
//  PHP to get the specific questions 
	//  URL of the web service
	$_GET["id"]=2;

	$id = $_GET["id"] ;
	$url = "https://mayar.abertay.ac.uk/~1803534/cmp306/ws/v1/questions/".$id ;
	//  set up the CURL
	$curl = curl_init($url) ;
  	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");                                                                                                                                     
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                                                                                                                                                                         
  	$resp = curl_exec($curl) ;
  	
  	//  Output the results
  	if (!$resp) {die('Error : "'.curl_error($curl).'" - Code: '.curl_errno($curl)); }
  	curl_close($curl) ;	
  	
  	echo "<br><br>" ;
    $question= json_decode($resp) ;

    echo "<a href='https://mayar.abertay.ac.uk/~1803534/cmp306/block2/view/block2.php'>";
    echo $question[0]-> question;
    echo "<br>";
    echo "-" . $question[0]-> nicname;
    echo " at " . $question[0]-> dttm; 
    echo "</a>";
  	// echo $emp[0]->employee_name." " ;
    // echo $emp[0]->employee_age ;

?>