<?php
include("../model/api.php") ;
$cardsinfo = getCards() ;
// echo $employeetxt ;
$cards = json_decode($cardsinfo) ;

//keep track of which index to use for card list
$k = 0;

//create 4 rows of 3 cards with info from DB (total of 12 entries)
for ($i=0; $i < sizeof($cards)/3; $i++) {
    echo '<div class="row" id="row">';
    for ($j=0; $j < sizeof($cards)/4; $j++) {
        //create card with info loaded from DB
        echo'<div class="col-md-4 col-s-1">';
        echo'<div class="card" id="genreCard">
                <img id="genreImg" class="card-img-top" src="'.  $cards[$k] -> imgPath .'" alt="'.  $cards[$k] -> imgName .'" style="width:100%">
                <div class="card-body">
                  <h4 class="card-title" id="genreTitle">'.  $cards[$k] -> genreTitle .'</h4>
                  <p class="card-text" id="genreDesc">'.  $cards[$k] -> artDescPreview .'...</p>
                  <a href="'.  $cards[$k] -> artPath .'" class="btn btn-primary">Read More</a>
                </div>
              </div>';
              echo '</div>'; //close column
      $k++;
          }
      echo "</div>"; //close row
  }


  include("../model/close_connection.php");
 ?>
