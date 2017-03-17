<?php
	session_start();
	$id=$_SESSION['uid'];
	unset($_SESSION['uid']);
	echo('<script>window.open("index.php","self");</script>');
	
?>