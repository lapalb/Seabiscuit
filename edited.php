<?php
ob_start();
mysql_connect('localhost','root','');
 mysql_select_db('seabiscuit');
session_start();
isset($_POST['bt']);

$no = $_POST['ppid'];
$_SESSION['loginid']= $_POST['ppid'];
	$d = $_POST['dscr'];
	$b = $_POST['bdy'];
	$t = $_POST['tag'];
echo $no;
$query = mysql_query("UPDATE post SET description='$d', body='$b', meta_desc='$t' WHERE postid=".$no); 
if($query)
{
	 echo('<script>window.open("profile.php","self");</script>');

 }
 else
 {
  	echo mysql_error();
	}

?>