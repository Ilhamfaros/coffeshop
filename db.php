<?php 
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbname   = 'dbcoffeshop';

	$conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('Gagal terhubung ke data base');

?>