<?php
//display error messages
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect to database
include("open_connection.php");
$db = new dbObj();
$conn =  $db->getConnstring();

//************************************************
//****This Is Where Block 1 Functions Begins******
//************************************************
//  function to get all the genre cards info
function getCards()
{
    global $conn;

    //fetch data from table in db
    $sqlGenreDetails = "SELECT g.gId, Genre as genreTitle,  SUBSTRING(artDesc,1,100) AS artDescPreview, artPath, imgName, imgPath
    FROM `Music Genres` AS g
    RIGHT JOIN `Music GenreArticles` AS gA on gA.gId = g.gId
    RIGHT JOIN `Music GenreImages` AS gI on gI.gId = g.gId
    RIGHT JOIN `Music Articles` AS art on art.artId = gA.artId
    RIGHT JOIN `Music Images` AS img on img.imgId = gI.imgId
    LIMIT 12";

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

//  function to get the articles related to the genre *******Use code from loadblock1_articles.php
function getArticles()
{
    global $conn;

    //fetch data from table in db
    $sqlGenreDetails = "SELECT g.gId, Genre as genreTitle, artDesc, artPath
    FROM `Music Genres` AS g
    JOIN `Music GenreArticles` AS gA on gA.gId = g.gId
    JOIN `Music Articles` AS art on art.artId = gA.artId
    WHERE '" . $_SESSION['articlePath'] . "' = artPath";


    //send select query to db
    $result = mysqli_query($conn, $sqlGenreDetails);

    //checks if there is any data in the table
    if(mysqli_num_rows($result) > 0){
        //  convert to JSON
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
		return json_encode(utf8ize($rows));
    }
    else{
      echo "<p>Error No Results Found in Server</p>";
    }
}

function getArtImg(){
    global $conn;

    //fetch data from
    $sqlGenreDetails = "SELECT g.gId, Genre as genreTitle, artPath, imgName, imgPath
    FROM `Music Genres` AS g
    JOIN `Music GenreArticles` AS gA on gA.gId = g.gId
    JOIN `Music GenreImages` AS gI on gI.gId = g.gId
    JOIN `Music Articles` AS art on art.artId = gA.artId
    JOIN `Music Images` AS img on img.imgId = gI.imgId
    WHERE '" . $_SESSION['articlePath'] . "' = artPath";

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

/* Use it for json_encode some corrupt UTF-8 chars
 * useful for = malformed utf-8 characters possibly incorrectly encoded by json_encode
 */
function utf8ize( $mixed ) {
    if (is_array($mixed)) {
        foreach ($mixed as $key => $value) {
            $mixed[$key] = utf8ize($value);
        }
    } elseif (is_string($mixed)) {
        return mb_convert_encoding($mixed, "UTF-8", "UTF-8");
    }
    return $mixed;
}
 ?>
