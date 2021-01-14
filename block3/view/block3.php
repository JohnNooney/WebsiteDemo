<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<title>CMP306 Dynamic Web Design 2.</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<!-- local stylesheet -->
	<link rel="stylesheet" href="../../styles.css" type="text/css" />

</head>

<body>
	<!-- First Page -->
	<div data-role="page" id="home" data-title="Home Page">
		<!-- header row -->
		<div class="header" data-role="header">
			<!-- Navbar -->
			<div data-role="navbar">
					<ul>
						<li class="ui-block-a"><a class="ui-link ui-btn" href="javascript:(()=>{window.location = '../../block1/view/block1.php'})()">Block 1</a></li>
						<li class="ui-block-b"><a class="ui-link ui-btn" href="javascript:(()=>{window.location = '../../block2/view/block2.php'})()">Block 2</a></li>
						<li class="ui-block-c"><a class="ui-btn-active ui-state-persist" href="block3.php">Block 3</a></li>
						<li class="ui-block-d"><a class="ui-link ui-btn" href="javascript:(()=>{window.location = '../../block4/view/block4.php'})()">Block 4</a></li>
					</ul>
			</div>
			<div>
				<h1>CMP306</h1>
				<h2>Dynamic Web Development</h2>
				<h2>JQuery Mobile Version</h2>
			</div>
		</div><!-- header -->

		<div data-role="content">
			<a href="#iotbtn" data-role="button">IoT Control Panel</a></br>	
			<a href="#iotgraphs" data-role="button">IoT Graphs</a>
		</div>
		
		<div data-role="footer" data-position="fixed">
			<h4>John Nooney - 1803534</h4>
		</div>
	</div>

	<!-- Second Page -->
	<div data-role="page" id="iotbtn" data-title="IoT Control Panel">
		<div data-role="header">
			<h1>Welcome to the IoT Device Control Panel</h1>
		</div>

		<div data-role="content">
			<form action="../controller/ledStates.php" method="post" data-ajax="false">
				<input type="hidden" name="red_state" id="red_state" value="0" />
				<input type="submit" class="btn btn-danger" name="red" value="Red On" id="redbtn"/>
			</form>
			<form action="../controller/ledStates.php" method="post" data-ajax="false">
				<input type="hidden" name="green_state" id="green_state" value="0"/>
				<input type="submit" class="btn btn-success" name="green" value="Green On" id="greenbtn"/>
			</form>
			<a id="camview" data-role="button" class="ui-btn" >View Cam (Refresh on Light Change)</a>
			<a href="#home" data-role="button">Back to home</a>
		</div>
		
		<div data-role="footer" data-position="fixed">
			<h4>John Nooney - 1803534</h4>
		</div>
	</div>

	<!-- Third Page -->
	<div data-role="page" id="iotgraphs" data-title="Iot Graphs">
		<div data-role="header">
			<h1>Two Most Recent Temperatures</h1>
			<h1 id="temp8First"></h1>
			<h1 id="temp9First"></h1>
			<br/><br/>
			<h1>IoT Device Temperature over Past 24 Hours</h1>
		</div>

		<div data-role="content">
			<div style="height: 500px;" >
				<canvas id="tempChart"></canvas>
			</div>
			<a href="#home" data-role="button">Back to home</a>
		</div>
		
		<div data-role="footer" data-position="fixed">
			<h4>John Nooney - 1803534</h4>
		</div>
	</div> 

    <!-- 
    <div class="ui-content iot" data-role="content" role="main">
		<div class="card" id="itemsTitle">
	        <h2 class="text-center">Welcome to the IoT Device Control Panel</h2>
	    </div>
		<br><br><br>

	    <div class="card" id="buttons">
			<div class="row">
				<div class="col">
					<p class="text-center">Buttons to Control Lights</p>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<form action="../controller/ledStateChange.php" method="post">
						<input type="submit" class="btn btn-danger" name="red" value="Red On"/>
					</form>
					<a class="btn btn-danger" href="https://agent.electricimp.com/8AidOZTOxGum?pin=5&state=1">Red on</a>
				</div>
				<div class="col text-center">
					<form action="../controller/ledStateChange.php" method="post">
						<input type="submit" class="btn btn-warning" name="redgreen" value="Red and Green On" />
					</form>
				</div>
				<div class="col text-right">
					<form action="../controller/ledStateChange.php" method="post">
						<input type="submit" class="btn btn-success" name="green" value="Green On" />
					</form>
				</div>
				
			</div>
			<div class="row">
				<div class="col">
					<a id="camview" data-role="button" class="ui-btn" >View Cam</a>
					<a class="btn btn-danger" href="https://agent.electricimp.com/8AidOZTOxGum?pin=5&state=1">Red on</a>
				</div>
			</div>
		</div>

		<br/><br/>

		<div class="card">
			<div class="row">
				<div class ="col">
					<h2 class="text-center">IoT Device Temperature over Past 24 Hours</h2>
				</div>
			</div>
			<div class="row">
				<div class ="col">
					<canvas id="tempChart"></canvas>
				</div>
			</div>
		</div>
	</div> container -->

	<br/><br/><br/><br/>

	<script src="https://code.jquery.com/jquery-1.11.1.min.js" integrity="sha256-VAvG3sHdS5LqTT+5A/aeq/bZGa/Uj04xKxY8KM/w9EE=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="graphinit.js"></script>
	<script src="buttonlistener.js"></script>

</body>
<!--
<footer class="page-footer fixed-bottom font-small blue">
  <div class="footer-copyright py-3 container bg-faded" id="footer">
    <a class="text-center"> John Nooney</a>
	<a class="text-right" href=""> 1803534@uad.ac.uk</a>
  </div>
</footer>Footer -->
</html>
