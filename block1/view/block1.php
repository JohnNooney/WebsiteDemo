<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<title>CMP306 Dynamic Web Design 2.</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

	<!-- local stylesheet -->
	<link rel="stylesheet" href="../../styles.css" type="text/css" />

</head>

<body>

	<!-- Navbar -->
	<header>
		<div class="navbar navbar-expand-md navbar-light d-flex" id="navDesktop">
	  	 <div class="navbar ml-auto p-2" id="navbarSupportedContent">
	    	<ul class="navbar-nav">
				<li><a class="nav-item nav-link" href="../../index.html">Home</a></li>
				<li><a class="nav-item nav-link active" href="block1.php">Block 1</a></li>
				<li><a class="nav-item nav-link" href="../../block2/view/block2.php">Block 2</a></li>
				<li><a class="nav-item nav-link" href="../../block3/view/block3.php">Block 3</a></li>
				<li><a class="nav-item nav-link disabled" href="../../block4/view/block4.php">Block 4</a></li>
				<li><a class="nav-item nav-link disabled" href="../../commentary.html">Commentary</a></li>
	      	 </ul>
		 </div>
		</div>
		  <nav id="mobileNav">
			  <div class="pos-f-t">
	   	   	  <div class="collapse" id="navbarToggleExternalContent">
	   	   	  <div class="navbar ml-auto p-2" id="navbarSupportedContent">
	   	   		<ul class="navbar-nav">
					<li><a class="nav-item nav-link" href="../../index.html">Home</a></li>
					<li><a class="nav-item nav-link active" href="block1.php">Block 1</a></li>
					<li><a class="nav-item nav-link" href="../../block2/view/block2.php">Block 2</a></li>
					<li><a class="nav-item nav-link" href="../../block3/view/block3.php">Block 3</a></li>
					<li><a class="nav-item nav-link disabled" href="../../block4/view/block4.php">Block 4</a></li>
					<li><a class="nav-item nav-link disabled" href="../../commentary.html">Commentary</a></li>
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

    <!-- overall container for page -->
    <div class="container">
    <div class="card" id="itemsTitle">
        <h2 class="text-center">A Subjective Look at the 12 Most Relevant Musical Genres</h2>
    </div>
    <!-- where all the cards will be added through an AJAX and PHP request-->
    <div class="text-center" id="genreInfo">
		<?php include("loadblock1.php"); ?>
    </div>

	</div> <!-- container -->

	<!--Required scripts. JQuery/Bootstrap-->
	<script src="https://code.jquery.com/jquery-3.1.1.min.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
