<?php
	$host='localhost'; 
	$username='root';  
	$password=''; 
	$db_name='profanity_check'; 
	if(!@$connection=mysqli_connect($host, $username, $password,$db_name))
	 die("Cannot connect"); 
?>