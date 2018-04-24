<?php
	include_once('config.php');
	$id=$_POST['id'];
	$sql='DELETE FROM blog WHERE id="'.$id.'"';
	if(mysqli_query($db,$sql))
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
?>