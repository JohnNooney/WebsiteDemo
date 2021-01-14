<!DOCTYPE html>
<?php
//start session to keep track of $_SESSION
ob_start();
session_start();
?>

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
	    		<li><a class="nav-item nav-link" href="../../block1/view/block1.php">Block 1</a></li>
	    		<li><a class="nav-item nav-link" href="../../block2/view/block2.php">Block 2</a></li>
	    		<li><a class="nav-item nav-link" href="../../block3/view/block3.php">Block 3</a></li>
	    		<li><a class="nav-item nav-link active" href="../../block4/view/block4.php">Block 4</a></li>
	    		<li><a class="nav-item nav-link" href="../../commentary.html">Commentary</a></li>
	      	 </ul>
		 </div>
		</div>
		  <nav id="mobileNav">
			  <div class="pos-f-t">
	   	   	  <div class="collapse" id="navbarToggleExternalContent">
	   	   	  <div class="navbar ml-auto p-2" id="navbarSupportedContent">
	   	   		<ul class="navbar-nav">
                    <li><a class="nav-item nav-link" href="../index.html">Home</a></li>
    	    		<li><a class="nav-item nav-link" href="../../block1/view/block1.php">Block 1</a></li>
    	    		<li><a class="nav-item nav-link " href="../../block2/view/block2.php">Block 2</a></li>
    	    		<li><a class="nav-item nav-link" href="../../block3/view/block3.php">Block 3</a></li>
    	    		<li><a class="nav-item nav-link active" href="../../block4/view/block4.php">Block 4</a></li>
    	    		<li><a class="nav-item nav-link" href="../../commentary.html">Commentary</a></li>
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
    <div class="container xml">
	    <div class="card" id="itemsTitle">
            <h2 class="text-center">This is the XML RSS Feed Homepage</h2>
        </div>
        
        <br/><br/>
        
        
        <div class="row text-center">
           
			<div class="col-md-4">
				<div class="card" style="padding:10px;">
					<a href="https://validator.w3.org/feed/check.cgi?url=https%3A//mayar.abertay.ac.uk/%7E1803534/cmp306/block4/view/rss.php"><img src="valid-rss-rogers.png" alt="[Valid RSS]" title="Validate my RSS feed" /></a>
                    <form action="rss.php" method="post">
                        <input type="submit" class="btn btn-primary" value="Click to view RSS Feed"/>
                    </form>
                </div>
            </div>
			
			<div class="col-md-4">
				<div class="card">
					<div class="row text-center">
						<div class="col">
							<p>YR.no Weather</p>
							<hr/>	
						</div>
						
					</div>
					<div class="row">
						<div class="col">
							<?php include('weatherxml.php');?> <!--echos the weather xml data and displays-->
						</div>
					</div>
                    
                </div>
            </div>

			<div class="col-md-4">
				<div class="card">
				<div class="row text-center">
						<div class="col">
							<p>Web Service Requests</p>
							<hr/>	
						</div>
						
					</div>
					<div class="row">
						<div class="col">
							<form action="../controller/questions_6.php" method="post">
								<input type="submit" class="btn btn-primary" value="Click to view the last 6 Questions."/>
							</form>
							<br/>
							<form action="../controller/question.php" method="post">
								<input type="submit" class="btn btn-primary" value="Click to view One Question."/>
							</form>
							<br/>
						</div>
					</div>
                </div>
            </div>

			
						
        </div>

	</div> <!-- container -->

	<script src="https://code.jquery.com/jquery-3.1.1.min.js"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js" type="text/javascript"></script>
    <script src="blogListener.js"></script>
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
