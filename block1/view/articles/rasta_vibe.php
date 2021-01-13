<?php
//start session to keep track of $_SESSION
ob_start();
session_start();

//set the article path to session variable to find corresponding articles to load in DB
//if session is already set unset it
if (isset($_SESSION['articlePath'])) {
  unset($_SESSION['articlePath']);
}
$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; //get the url
$path = parse_url($url, PHP_URL_PATH); //parse url into a path
$path = basename($path); //get the trailing name component of the path

$_SESSION['articlePath'] = "articles/" .$path;

?>

<html>
	<head>
	<meta charset="utf-8">
	<title>CMP306 Dynamic Web Design 2.</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

	<!-- local stylesheet -->
	<link rel="stylesheet" href="../../../styles.css" type="text/css" />

</head>

<body>

    <!-- Navbar -->
	<header>
		<div class="navbar navbar-expand-md navbar-light d-flex" id="navDesktop">
	  	 <div class="navbar ml-auto p-2" id="navbarSupportedContent">
	    	<ul class="navbar-nav">
                <li><a class="nav-item nav-link" href="../../../index.html">Home</a></li>
	    		<li><a class="nav-item nav-link" href="../block1.php">Block 1</a></li>
	    		<li><a class="nav-item nav-link active" href="../../../block2/view/block2.php">Block 2</a></li>
	    		<li><a class="nav-item nav-link" href="../../../block3/view/block3.php">Block 3</a></li>
	    		<li><a class="nav-item nav-link disabled" href="../../../block4/view/block4.php">Block 4</a></li>
	    		<li><a class="nav-item nav-link disabled" href="../../../commentary.html">Commentary</a></li>
	      	 </ul>
		 </div>
		</div>
		  <nav id="mobileNav">
			  <div class="pos-f-t">
	   	   	  <div class="collapse" id="navbarToggleExternalContent">
	   	   	  <div class="navbar ml-auto p-2" id="navbarSupportedContent">
	   	   		<ul class="navbar-nav">
                    <li><a class="nav-item nav-link" href="../../../index.html">Home</a></li>
    	    		<li><a class="nav-item nav-link" href="../block1.php">Block 1</a></li>
    	    		<li><a class="nav-item nav-link active" href="../../../block2/view/block2.php">Block 2</a></li>
    	    		<li><a class="nav-item nav-link" href="../../../block3/view/block3.php">Block 3</a></li>
    	    		<li><a class="nav-item nav-link disabled" href="../../../block4/view/block4.php">Block 4</a></li>
    	    		<li><a class="nav-item nav-link disabled" href="../../../commentary.html">Commentary</a></li>
    	      	 </ul>
	   	   	 </div>
	   	   	  </div>
	   	   	  <nav class="navbar navbar-dark bg-info">
	   	   	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
	   	   	      <span class="navbar-toggler-icon"></span>
	   	   	    </button>
	   	   	  </nav>
	   	   	</div>
		  </nav>
	</header><!--Navbar-->

	<!-- header row -->
	<div id="header" class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1>CMP306</h1>
			<h2>Dynamic Web Development</h2>
		</div>
	</div><!-- header -->

<!-- container for article title -->
<div class="container">
    <div class="row text-center">
		<div class="col">
			<h2>Rastaman Vibrations:</h2>
            <h3>A look at the music out of Jamaica</h3>
		</div>
	</div>
</div>
<!-- container for article content -->
<div class="container">
    <div id="articles">
        <?php include("loadblock1_articles.php"); ?>
    </div>

    <div class="row" id="artRecommend">
        <div class="col">
            <a class="btn btn-primary" href="https://en.wikipedia.org/wiki/Reggae">Further Reading</a>
        </div>
    </div>
    <br><br><br><br>
</div> <!-- container -->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

<!-- Footer -->
<footer class="page-footer fixed-bottom font-small blue">
  <!-- Copyright -->
  <div class="footer-copyright py-3 container bg-faded" id="footer">
    <a class="text-center"> John Nooney</a>
	<a class="text-right" href=""> 1803534@uad.ac.uk</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

</html>
