<?php
	//  PHP to get all the employees 
	//  URL of the web service
	$url = "https://mayar.abertay.ac.uk/~1803534/cmp306/ws/v1/questions" ;
	//  set up the CURL
	$curl = curl_init($url) ;
  	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");                                                                                                                                     
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                                                                                                                                                                            
  	$resp = curl_exec($curl) ;
  	
  	//  Output the results
      if (!$resp) {die('Error : "'.curl_error($curl).'" - Code: '.curl_errno($curl)); }
  	curl_close($curl) ;	
  	
  	echo "<br><br>" ;
    $questions = json_decode($resp) ;
      
     
  	$n = sizeof($questions) ;
  	for ($i=0; $i<$n; $i++) {
        echo "<a href='https://mayar.abertay.ac.uk/~1803534/cmp306/block2/view/block2.php'>";
        echo $questions[$i]-> question;
        echo "<br>";
        echo "-" . $questions[$i]-> nicname;
        echo " at " . $questions[$i]-> dttm; 
        echo "</a>";
        echo "<br><br>";
  	}
?>