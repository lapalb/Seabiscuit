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
 $cid=$_SESSION['uid']; 
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
	if($filename)
	{
	$filepath="pics/".$filename;
  	}
	else{
	$filepath="";
	}
  move_uploaded_file( $filetemp , $filepath );
  
    $query = "INSERT INTO post(uid,title,description,body,image,date_time) VALUES('$cid','$title','$des','$body','$filepath',now())";
   $res = mysql_query($query);
   
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title> NEW POST</title>
	<link rel="stylesheet" href="css/profile_style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css?v=1.3">
    <link rel="icon" href="t.png" sizes="32x32" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
    	.form{
    		background-color: #17242f;
    		text-align: center;
    		padding: 25px;
    		margin-left: 20%;
    		margin-right: 20%;

    	}
    	input{
    		width: 90%;
    		margin: 20px;
    		min-height: 50px;
    	}
    	
    	body{
    		padding: 0px;
    		margin: 0px;
    		background-color: #fed16a;

    	}
    	.navbar{
    		max-height: 76px;
    	}
		#row1{
		max-height :5000px ;
		}

    </style>
</head>
<body>
		<header>
			<nav class="navbar navbar-inverse">
          <div class="container-fluid">
             <div class="navbar-header">
               <button type="button" class="navbar-toggle " data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
              </button>
               </div>
             
             <div class="collapse navbar-collapse" id="myNavbar">
               <ul class="nav navbar-nav">
                  <li ><a href="profile.php">MY PROFILE</a></li>
                    <li ><a href="theme.php">THEME</a></li>
                    <li  ><a href="contact.php">CONTACT US</a></li>
                    <li ><a href="legend.php">THE LEGEND OF SEABISCUIT</a></li>
                 </ul>
                
                <ul class="nav navbar-nav navbar-right">
               <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
             </ul>
             </div>
          </div>
      </nav>
		</header>
		<div class="container">
		<div class="row">
			
		<div class="form">
		 <div class="col-sm-" style="text-align: center">
			<div class="row">
			<h1 style="color: #fff"> NEW POST </h1>
			</div>
			 <form action="" method="POST" enctype="multipart/form-data">
			<div class="row">
				<input type="text" name="title" placeholder="Title" required >
			</div>
			
			<div class="row">
				<input type="text" name="des" placeholder="Description" required >
			</div>
			
			<div class="row">
				<input type="text" name="meta_des" placeholder="#" >
			</div>
			
			<div class="row" id="row1" >
				<input type="text" placeholder="Write your post" name="body" >
			</div>
			<div class="row">
				<input type="file" name="img"  value="Choose Picture">
			</div>
			<div class="row">
				 <input type="submit" value="Submit" name="btn-signup">
			</div>
		 </form>
		</div>
		</div>
		
		</div>
		</div>
</body>
</html>