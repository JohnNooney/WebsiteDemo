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
//****This Is Where Block 2 Functions Begins******
//************************************************
function login($txt)
{
    global $conn;
    //decode the text
    $data = json_decode($txt) ;
    $email = $data -> email;
    $password = $data -> password;

    //check the database for users with same email
    //first select the record where the email mathces
    if ($query = $conn->prepare("SELECT `nicname`, `email`, `password`,`userId` FROM `Blog Users` WHERE `Email` = ?")) {
        $query->bind_param("s", $email);
        $query->execute();
        $result = $query->get_result();
        //get the selected record with the associated attributes
        $RS = mysqli_fetch_assoc($result);
    } else {
        $error = $conn->errno . ' ' . $conn->error;
        $_SESSION['message']= $error;
    }

    echo "this is the email entered: " .$email. " and this is the email to compare " . $RS['email'] ;
    echo "<br/>";
    echo "this is the pass entered: " .$password. " and this is the password to compare " . $RS['password'];
    echo "<br/>";

    if(($RS['email'] == $email) && ($email != ""))
    {
        echo "email match";
        echo "<br/>";

    }
    else {
        echo "email no match";
        echo "<br/>";
    }
    if(password_verify($password, $RS['password']))
    {
        echo "password match";
        echo "<br/>";
    }
    else {
        echo "pass no match";
        echo "<br/>";
    }


    //check if email and password match the entered input
    if(($RS['email'] == $email) && ($email != "") && (password_verify($password, $RS['password'])))
    {
        $_SESSION['nicname'] = $RS['nicname'];
        $_SESSION['userId'] = $RS['userId']; //save user id for making comments
        $_SESSION['message']= "Login Successful";

    }
    else
    {
        $_SESSION['message']= "Incorrect email or password";
    }

    return;
}

function signUp($txt)
{
    global $conn;
    $data = json_decode($txt) ;

    //bind data
    $firstname = $data -> firstname;
    $surname = $data -> surname;
    $nicname = $data -> nicname;
    $email = $data -> email;
    $password = $data -> password;


    $query = $conn->prepare("SELECT * FROM `Blog Users` WHERE email = ?");
    $query->bind_param("s", $email);
    $result = mysqli_query($conn, $query);
    //check to make sure the entered email doesn't exist already in the db
    if (mysqli_num_rows($result) > 0)
    {
        $_SESSION['message'] = "Email already exists. Please use a different one.";
    }
    //otherwise continue
    else {
        //SQL PDO for security
        $stmt = $conn->prepare("INSERT into `Blog Users` (firstname, surname, nicname, email, password) values (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $firstname, $surname, $nicname, $email, $password);

        //execute insert
        $res = $stmt->execute();

        $_SESSION['message'] = "Account Created. You may login.";
    }


    return;


}

function logout($txt)
{
    global $conn;
    $data = json_decode($txt) ;
    $userId = $data -> userId;

    if($query = $conn->prepare("SELECT * FROM `Blog Users` WHERE `userId` = ?")){
        $query->bind_param("s", $userId);
        $query->execute();
        $result = $query->get_result();

        //only need to unset the session variables associated to the user
        unset($_SESSION['userId']);
        unset($_SESSION['nicname']);

        $_SESSION['message'] = "Successfully Signed Out.";
    }
    return;
}

function getQuestions(){
    global $conn;

    //fetch data from table in db
    $sqlGenreDetails = "SELECT qno, question, nicname, dttm, bq.userId as userId, edited
                        FROM `Blog Questions` AS bq
                        JOIN `Blog Users` AS bu ON bu.userId = bq.userId
                        ORDER BY qno desc";

    //send select query to db
    $result = mysqli_query($conn, $sqlGenreDetails);

    //checks if there is any data in the table
    if(mysqli_num_rows($result) > 0){
        //  convert to JSON
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
	 	return json_encode($rows);
    }
    else{
        echo "<p>Error No Results Found in Server</p>";
        }
}

function getAnswers(){
    global $conn;

    //fetch data from table in db
    $sqlGenreDetails = "SELECT qno, ano, answer, nicname, dttm, ba.userId as userId, edited
                        FROM `Blog Answers` AS ba
                        JOIN `Blog Users` AS bu ON bu.userId = ba.userId";

    //send select query to db
    $result = mysqli_query($conn, $sqlGenreDetails);

    //checks if there is any data in the table
    if(mysqli_num_rows($result) > 0){
        //  convert to JSON
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
	 	return json_encode($rows);
    }
    else{
        echo "<p>Error No Results Found in Server</p>";
        }
}

function postQuestion($txt){
    global $conn;
    $data = json_decode($txt) ;

    //bind data
    $userId = $data -> userId;
    $question = $data -> question;
    $dttm = $data -> dttm;

    //SQL PDO for security
    $stmt = $conn->prepare("INSERT into `Blog Questions` (question, userId, dttm) values (?, ?, ?)");
    $stmt->bind_param("sss", $question, $userId, $dttm);

    //execute insert
    $res = $stmt->execute();

    return;
}

function postAnswer($txt){
    global $conn;
    $data = json_decode($txt) ;

    //bind data
    $userId = $data -> userId;
    $qno = $data -> qno;
    $answer = $data -> answer;
    $dttm = $data -> dttm;

    //SQL PDO for security
    $stmt = $conn->prepare("INSERT into `Blog Answers` (qno, answer, userId, dttm) values (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $qno, $answer, $userId, $dttm);

    //execute insert
    $res = $stmt->execute();

    return;

}

function editAnswer($txt){
    global $conn;
    $data = json_decode($txt) ;

    //bind data
    $ano = $data -> ano;
    $edited = $data -> edited;
    $newAnswer = $data -> answer;

    //SQL PDO for security
    $stmt = $conn->prepare("UPDATE `Blog Answers` SET answer = ?, edited = ? WHERE ano = ?");
    $stmt->bind_param("sis", $newAnswer, $edited, $ano);

    //execute insert
    $res = $stmt->execute();

    return;
}

function deleteAnswer($txt){
    global $conn;
    $data = json_decode($txt) ;

    //bind data
    $ano = $data -> ano;

    //SQL PDO for security
    $stmt = $conn->prepare("DELETE FROM `Blog Answers` WHERE ano =?");
    $stmt->bind_param("s", $ano);

    //execute insert
    $res = $stmt->execute();

    return;
}

function editQuestion($txt){
    global $conn;
    $data = json_decode($txt) ;

    //bind data
    $qno = $data -> qno;
    $edited = $data -> edited;
    $newQuestion = $data -> question;

    //SQL PDO for security
    $stmt = $conn->prepare("UPDATE `Blog Questions` SET question = ?, edited = ? WHERE qno = ?");
    $stmt->bind_param("sis", $newQuestion, $edited, $qno);

    //execute insert
    $res = $stmt->execute();

    return;
}

function deleteQuestion($txt){
    global $conn;
    $data = json_decode($txt) ;

    //bind data
    $qno = $data -> qno;

    //SQL PDO for security
    $stmt = $conn->prepare("DELETE FROM `Blog Questions` WHERE qno = ?");
    $stmt->bind_param("s", $qno);

    //execute insert
    $res = $stmt->execute();

    return;
}

?>
