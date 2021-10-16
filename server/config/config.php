<?php 

	$mysqli = new mysqli("localhost","root","","ct428");

	// Check connection
	if ($mysqli->connect_error) {
	  echo "Kết nối MYSQLi lỗi" . $mysqli->connect_error;
	  exit();
	}

?>