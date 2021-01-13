<?php
include("../../model/php/api.php") ;
//get related articles
$articletxt = getArticles() ;
$articles = json_decode($articletxt) ;
//get related images
$articleImgs = getArtImg();
$imgs = json_decode($articleImgs);

//create as many article contents as there are in the database
for ($i=0; $i < sizeof($articles); $i++) {
        //create Article with loaded Info
         echo'<div class="row bg-faded" id="articleContent">
                 <div class="col-4">';
                 //loop through all the imgs to post
                 for ($j=0; $j < sizeof($imgs); $j++) {
                     //check to see if the img matches the genre
                     if ($imgs[$j] -> genreTitle == $articles[$i] -> genreTitle) {
                         echo'<img class="img-thumbnail" id="genreImg" src="../'. $imgs[$j] -> imgPath .'" alt="'.$imgs[$j] -> imgName.'">';
                         echo'<p id="imgDesc">'.$imgs[$j] -> imgName.'</p>';
                     }
                 }
                    echo'</div>
                 <div class="col-8">
                  <div class="card" id="articleInfo">
                      <h3 id="genreTitle">'.$articles[$i] -> genreTitle.'</h3>
                      <p id="genreDesc">'.$articles[$i] -> artDesc.'</p>
                  </div>
                 </div>
              </div>';
  }
 ?>
