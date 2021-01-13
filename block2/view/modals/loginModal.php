<?php
ob_start();
session_start();

if (isset($_SESSION['userId'])) {
  echo "<div id='greetings' style='padding: 10px; margin-left:5px;'> <h3>Hello " . $_SESSION['nicname'] . "</h3></div>";
}
else {

    echo "<div id='greetings' style='padding: 10px; margin-left:5px;'><h3>Hello guest</h3></div>";
}

//checks to see if the user is logged in or not
if (isset($_SESSION['userId'])) {
	echo'<form action="../controller/logout.php" method="post">
		<input id="logoutId" type="hidden" name="logoutId" value="' . $_SESSION['userId'] . '"/>
		<button style="margin: 10px;" type="submit" class="btn btn-primary" id="btnSignOut" name="signout" value="SignOut">Sign Out</button>
	</form>';
}
else {
	echo '
	<!-- Modal HTML -->
	<div id="loginModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<form action="../controller/signIn.php" method="post">
				<div class="modal-header">
					<h4 class="modal-title">Login</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" required="required" name="Email">
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label>Password</label>
						</div>

						<input type="password" class="form-control" required="required" name="Password">
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary pull-right" value="Login" name="login">
					<button type="button" class="btn" id="btnSignUp">Sign Up</button>
				</div>
			</form>
		</div>
	</div>
	</div>



	<!-- Modal HTML -->
	<div id="signUpModal" class="modal fade">
	<div class="modal-dialog modal-login">
	<div class="modal-content">
		<form action="../controller/signUp.php" id="signUpForm" method="post">
			<div class="modal-header">
				<h4 class="modal-title">Sign Up</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>

			<div class="modal-body">
				<div class="form-group">
					<label>First Name</label>
					<input type="text" class="form-control" required="required" name="firstname">
				</div>
				<div class="form-group">
					<label>Last Name</label>
					<input type="text"  class="form-control" required="required" name="surname">
				</div>
				<div class="form-group">
					<label>Nickname</label>
					<input type="text"  class="form-control" required="required" name="nicname">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" required="required" name="email">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" required="required" name="password">
				</div>
			</div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-primary pull-right" value="Create Account" name="create">
			</div>
		</form>
	</div>
	</div>
	</div>

	<div style="margin: 10px;"><button type="submit" class="btn btn-primary" id="btnLogin" name="login" value="login">Login</button></div>

	';
}

 ?>
