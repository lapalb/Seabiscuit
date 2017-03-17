<?php 
if(@!mysql_connect('localhost','root','')||@!mysql_select_db('seabiscuit')){
	die(mysql_error());
}
session_start();
isset($_POST['dell']);
 $no = $_POST['pidd'];
 $_SESSION['loginid']= $_POST['ppid'];
 echo($no);
$query=mysql_query("DELETE FROM post WHERE postid=".$no);
if($query)
{
	 echo('<script>window.open("profile.php","self");</script>');
	}
	else
	{
	echo mysql_error();
	}

 ?>
