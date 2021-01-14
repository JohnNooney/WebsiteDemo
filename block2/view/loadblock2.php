<?php
ob_start();
session_start();

    include("../model/api_block2.php") ;

    //get the question info
    $questionsInfo = getQuestions();
    $questions = json_decode($questionsInfo) ;
    //get the answer info
    $answersInfo = getAnswers();
    $answers = json_decode($answersInfo) ;
    //keep track of which question
    $k = 0;

     //adds a form for a question
     if (isset($_SESSION["userId"])) {
        echo '<div class="row" id="extraQuestion">
                <div class="col-md-4 col-s-1" >
                   <div class="card">
                       <div class="card-header">
                           <h4 class="card-title">New Question</h4>
                       </div>
                       <form class="form-group" action="../controller/postQuestion.php" method="post" id="questionForm" form="questionForm">
                            <label for="comment">Comment:</label>
                            <input id="userIdInput" type="hidden" name="userId" value="' . $_SESSION['userId'] . '">
                            <input type="hidden" name="hidden" value="' . $_SESSION['nicname'] . '">
                            <input class="dttm" type=hidden name="dttm" id="dttmQuestion" value="">
                            <textarea class="form-control" rows="5" name="question" form="questionForm"></textarea>
                            <input type="submit" class="btn btn-outline-primary" name="submitQuestion" value="Submit Question" id="btnQuestion"/>
                       </form>
                    </div>
                </div>
            </div>';
    } else {
        echo '<div class="row" id="extraQuestion">
                <div class="col-md-4 col-s-1" >
                  <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Please login to post a question</h4>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }

    echo "<br><br>";

    //create 2 rows of 3 columns for the QandA section. Total of 6 Questions ****change this later on**
    while (($k % 3) == 0 && $k < sizeof($questions)) {
        //if the user is not logged in then limit comments seen to 6
        if(empty($_SESSION["userId"]) && $k == 6){
            break; //break out of loop
        }
        echo '<div class="row" id="QandA" style="margin-bottom: 30px;">';
        for ($j=0; $j < 3 && $k < sizeof($questions); $j++) {
            //create card with info loaded from DB
             echo'  <div class="col-md-4 col-s-1">
        		        <div class="card">
        					<div class="card-header">
        						<h4 class="card-title">Question</h4>
        					</div>
        					<blockquote class="blockquote mb-0 text-left" id="question">
        						<p class="card-text" id="qContent">'.  $questions[$k] -> question .'</p>
        						<footer class="blockquote-footer" id="qUsername">'.  $questions[$k] -> nicname .' at <cite id="timeStamp">'.  $questions[$k] -> dttm .'';

                            if($questions[$k] -> edited == 1){
                                echo ' (edited)';
                            }
                            echo '</cite></footer>
        					</blockquote>';

                            //for updating question and being able to delete question
                            if(isset($_SESSION["userId"]))
                            {
                                if ($questions[$k] -> userId == $_SESSION["userId"]) {
                                    echo'<div class="row" >
                                            <div class="col">
                                                <input type="hidden" name="questionEditVal" class="questionEdit" value="' . $questions[$k] -> question . '" id="' .  $questions[$k] -> qno . '"/>
                                                <button type="submit" class="btn btn-outline-warning btnEditQuestion" name="answer" value="' .  $questions[$k] -> qno . '">Edit Question</button>
                                            </div>';
                                    //check to see if there are any answers for the question. If not then give option to delete
                                    $answerNum = 0;
                                    for ($n=0; $n < sizeof($answers); $n++) {
                                        if ($answers[$n] -> qno == $questions[$k] -> qno && $answers[$n] -> userId == $_SESSION["userId"]) {
                                            $answerNum++;
                                        }
                                    }
                                    if ($answerNum == 0) {
                                        //form for deleting comment
                                        echo'<div class="col">
                                                <form action="../controller/blog_edit.php" id="deleteQuestionFrom" method="post">
                                                    <input id="qno" type="hidden" name="qno" value="' . $questions[$k] -> qno . '"/>
                                                    <button style="" type="submit" class="btn btn-outline-danger btnDeleteQuestion" name="deleteQuestion">Delete Question</button>
                                                </form>
                                            </div>';
                                    }
                                    echo'</div>';
                                }
                            }

                            echo '<div class="card-header">
                                <h4 class="card-title">Answers</h4>
                            </div>';

                            //loop through answers relate to the question
                            for ($n=0; $n < sizeof($answers); $n++) {
                                //select the answer that corresponds to the question
                                if ($answers[$n] -> qno == $questions[$k] -> qno) {
                                    echo'
                                    <blockquote class="blockquote mb-0 text-left">
                                        <p class="card-text" id="aContent">'.  $answers[$n] -> answer .'</p>
                                        <footer class="blockquote-footer" id="aUsername">'.  $answers[$n] -> nicname .' at <cite id="timeStamp">'.  $answers[$n] -> dttm .'';

                                    if($answers[$n] -> edited == 1){
                                        echo ' (edited)';
                                    }
                                    echo '</cite></footer>
                                    </blockquote>';

                                    //used for updating/deleting answers
                                    if(isset($_SESSION["userId"]))
                                    {
                                        //if the answer matches the user logged in then add buttons for updating/deleting answer
                                        if ($answers[$n] -> userId == $_SESSION["userId"]) {
                                            //form for updating comment ****** change to open a modal
                                            echo'<div class="row">
                                                    <div class="col">
                                                        <input type="hidden" name="answerEditVal" class="answerEdit" value="' . $answers[$n] -> answer . '" id="' .  $answers[$n] -> ano . '"/>
                                                        <button id="btnEditAnswer" class="btn btn-outline-warning btnEditAnswer" name="editAnswer" value="' .  $answers[$n] -> ano . '">Edit Answer</button>
                                                    </div>';
                                            //form for deleting comment
                                            echo'   <div class="col">
                                                        <form action="../controller/blog_edit.php" id="deleteAnswerFrom" method="post">
                                    		              <input type="hidden" name="ano" value="' . $answers[$n] -> ano . '"/>
                                        		          <button type="submit" class="btn btn-outline-danger btnDeleteAnswer" name="deleteAnswer">Delete Answer</button>
                                        	           </form>
                                                   </div>
                                               </div>';
                                        }
                                    }
                                    echo '<hr>';
                                    }
                            }
                            echo '</div>';

                            //makes sure the user is logged in before posting an answer
                            if (isset($_SESSION["userId"])) {
                                echo '<div class="card">
                                        <div><button type="submit" class="btn btn-primary btnAnswer" name="answer" value="' .  $questions[$k] -> qno . '">Post Answer</button></div>
                                    </div>';
                            } else {
                                echo '<div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Please login to answer this question</h4>
                                        </div>
                                    </div>';
                            }


                echo '</div>';// close column
                 $k++; //next question
              }
        echo '</div>'; //close row
    }





      include("../../block1/model/close_connection.php");



?>
