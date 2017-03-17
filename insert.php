<?php
 ob_start();
 session_start();
 
 // this will avoid mysql_connect() deprecation error.
 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 // but I strongly suggest you to use PDO or MySQLi.
 
 define('DBHOST', 'localhost');
 define('DBUSER', 'root');
 define('DBPASS', '');
 define('DBNAME', 'seabiscuit');
 
 $conn = mysql_connect(DBHOST,DBUSER,DBPASS);
 $dbcon = mysql_select_db(DBNAME);
 
 if ( !$conn ) {
  die("Connection failed : " . mysql_error());
 }
 
 if ( !$dbcon ) {
  die("Database Connection failed : " . mysql_error());
  }
 
 $filepath = '';
 // if session is not set this will redirect to login page


if ( isset($_POST['btn-signup']) ) {
  
  // clean user inputs to prevent sql injections

  $title = trim($_POST['title']);
  $title = strip_tags($title);
  $title = htmlspecialchars($title);

  $des = trim($_POST['des']);
  $des = strip_tags($des);
  $des= htmlspecialchars($des);

  $body = trim($_POST['body']);
  $body = strip_tags($body);
  $body = htmlspecialchars($body);

  $filetemp = $_FILES["img"]["tmp_name"];
  $filename = $_FILES["img"]["name"];
	$filepath="pics/".$filename ;
	echo $filepath;
  move_uploaded_file( $filetemp , $filepath );
  
    $query = "INSERT INTO post(title,description,body,image,date_time) VALUES('$title','$des','$body','$filepath',now())";
   $res = mysql_query($query);
   
  }
?>
<html>
<title>post</title>
<body >
<form action="" method="POST" enctype="multipart/form-data" >


TITLE 
<input type="text" name="title"   aria-required="true" required="" >
DESCRIPTION 
<input type="text" name="des" aria-required="true" required="" >
BODY
<input type="text" name="body" aria-required="false" required="" >
IMAGE
<input type="file" name="img" >
<input type="submit" name="btn-signup" value="Submit">

</form></body></html>
<?php  ?>