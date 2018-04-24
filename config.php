<?php
    session_start();

	$user='root';
	$pass='';
	$db='security';
	$db=new mysqli('localhost',$user,$pass,$db) or die("Unable to connect");

	if(!isset($_SESSION['user_id'])){
		header('location:index.php');
	}	
?>