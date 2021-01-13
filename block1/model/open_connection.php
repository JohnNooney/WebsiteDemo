<?php
Class dbObj{

	//connecting to server info
	var $servername = "lochnagar.abertay.ac.uk";
	var $username = "sql1803534";
	var $password = "cMrMhyYegEZu";
	var $dbname = "sql1803534";
	var $conn;

	function getConnstring() {
		$con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname) ;
		// check connection
		if (mysqli_connect_errno()) {
			echo("Connect failed: ". mysqli_connect_error());
			exit();
		} else {
			$this->conn = $con;
		}
		return $this->conn;
	}
}
?>
