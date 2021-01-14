<?php
//display error messages
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect to database
include("../../block1/model/open_connection.php");
$db = new dbObj();
$conn =  $db->getConnstring();

//************************************************
//****This Is Where Block 3 Functions Begins******
//************************************************
function createMessage($msg){
    global $conn;
    $data = json_decode($msg) ;

    //bind data
    $pin1 = $data[0]-> pin;
    $value1 = $data[0]-> value;
    $pin2 = $data[1]-> pin; //this is pin 9 value
    $value2 = $data[1]-> value; //this is the pin 9 value
    $msg = $pin1 .":". $value1 . ", " . $pin2 .":". $value2;

    //insert values into pinTemps table first
    $stmt1 = $conn->prepare("INSERT into `ElectricalImp PinTemps` (temp , pin) values (?, ?)");
    $stmt1->bind_param("ss", $value1, $pin1);
    $stmt1->execute();

    //select it to be entered into the ElectricalImp table
    $query = $conn->prepare("SELECT (id) FROM `ElectricalImp PinTemps` ORDER BY id DESC LIMIT 1");
    $query->execute();
    $pinTempId = $query->get_result();
    //get the selected record with the associated attributes
    $RS = mysqli_fetch_assoc($pinTempId);

    //enter record into main table
    $stmt3 = $conn->prepare("INSERT into `ElectricalImp` (dttm , pinval) values (CURRENT_TIMESTAMP, ?)");
    $stmt3->bind_param("s", $RS['id']);
    $stmt3->execute();

    //***************************/
    //repeat as above but with values from pin 9
    //**************************/
    $stmt2 = $conn->prepare("INSERT into `ElectricalImp PinTemps` (temp , pin) values (?, ?)");
    $stmt2->bind_param("ss", $value2, $pin2);
    //execute insert
    $res2 = $stmt2->execute();

    //select it to be entered into the ElectricalImp table
    $query = $conn->prepare("SELECT (id) FROM `ElectricalImp PinTemps` ORDER BY id DESC LIMIT 1");
    $query->execute();
    $pinTempId = $query->get_result();
    //get the selected record with the associated attributes
    $RS = mysqli_fetch_assoc($pinTempId);

    //enter record into main table
    $stmt3 = $conn->prepare("INSERT into `ElectricalImp` (dttm , pinval) values (CURRENT_TIMESTAMP, ?)");
    $stmt3->bind_param("s", $RS['id']);
    $stmt3->execute();

    return $msg;
}

function getTempData(){
    global $conn;

    //create query to get the IoT data of each pin
    $sqlPin8Details = "SELECT pin, temp,  DATE_FORMAT(dttm,'%h:%i %p') AS time
                        FROM `ElectricalImp`
                        RIGHT JOIN `ElectricalImp PinTemps` as pTemps ON pTemps.id = pinval
                        WHERE pin = 8
                        AND dttm >= NOW() - INTERVAL 1 DAY";

                        //AND dttm >= NOW() - INTERVAL 1 DAY

    $sqlPin9Details = "SELECT pin, temp, DATE_FORMAT(dttm,'%h:%i %p') AS time
                        FROM `ElectricalImp`
                        RIGHT JOIN `ElectricalImp PinTemps` as pTemps ON pTemps.id = pinval
                        WHERE pin = 9
                        AND dttm >= NOW() - INTERVAL 1 DAY";

    //send select query to db
    $pin8result = mysqli_query($conn, $sqlPin8Details);
    $pin9result = mysqli_query($conn, $sqlPin9Details);

    //checks if there is any data in the table for the past day
    if(mysqli_num_rows($pin8result) > 0 && mysqli_num_rows($pin9result) > 0 ){

      //  convert to JSON
        $bothpins = array();

		while($r = mysqli_fetch_assoc($pin8result)) {
        $bothpins['pin8'][] = array(
          "temp" => $r["temp"],
          "time" => $r["time"]
      );
        }
        while($r = mysqli_fetch_assoc($pin9result)) {
          $bothpins['pin9'][] = array(
            "temp" => $r["temp"],
            "time" => $r["time"]
          );
        }

	 	return json_encode($bothpins);
    }
    //try this if the data is not from 24 hours ago
    else{
      $sqlPin8DetailsBackup = "SELECT * FROM(SELECT pinval, pin, temp, DATE_FORMAT(dttm,'%h:%i %p') AS time
      FROM `ElectricalImp`
      RIGHT JOIN `ElectricalImp PinTemps` as pTemps ON pTemps.id = pinval
      WHERE pin = 8
      ORDER BY pinval DESC
      LIMIT 25) AS foo
      ORDER BY foo.pinval ASC";
  
      //AND dttm >= NOW() - INTERVAL 1 DAY
  
      $sqlPin9DetailsBackup = "SELECT * FROM(SELECT pinval, pin, temp, DATE_FORMAT(dttm,'%h:%i %p') AS time
      FROM `ElectricalImp`
      RIGHT JOIN `ElectricalImp PinTemps` as pTemps ON pTemps.id = pinval
      WHERE pin = 9
      ORDER BY pinval DESC
      LIMIT 25) AS foo
      ORDER BY foo.pinval ASC";
  
      //send select query to db
      $pin8result = mysqli_query($conn, $sqlPin8DetailsBackup);
      $pin9result = mysqli_query($conn, $sqlPin9DetailsBackup);
  
      //checks if there is any data in the table for the past day
      if(mysqli_num_rows($pin8result) > 0 && mysqli_num_rows($pin9result) > 0 ){
  
        //  convert to JSON
          $bothpins = array();
  
        while($r = mysqli_fetch_assoc($pin8result)) {
            $bothpins['pin8'][] = array(
              "temp" => $r["temp"],
              "time" => $r["time"]);
            }
            while($r = mysqli_fetch_assoc($pin9result)) {
              $bothpins['pin9'][] = array(
                "temp" => $r["temp"],
                "time" => $r["time"]);
            }
       return json_encode($bothpins);
        }
      }
}

function getLEDState(){
  global $conn;

  //get led info
  $ledStates = "Select * From `ElectricalImp LED`";
  $results = mysqli_query($conn, $ledStates);

  while($r = mysqli_fetch_assoc($results)) {
    $rows[] = $r;
  }

  return json_encode($rows);
}

function setLEDState($data){
  global $conn;
  $data = json_decode($data) ;

  //bind data
  $pin = $data-> pin;
  $state = $data-> state;

  //insert values into pinTemps table first
  $stmt1 = $conn->prepare("UPDATE `ElectricalImp LED` SET state = ? WHERE pin = ?");
  $stmt1->bind_param("ii", $state, $pin);
  $stmt1->execute();

  return;
}
?>
