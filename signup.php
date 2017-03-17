<?php 

if(@!mysql_connect('localhost','root','')||@!mysql_select_db('seabiscuit')){
	die(mysql_error());
}
isset($_POST['bt']);

if(isset($_POST['name'])&&isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['password_check'])&&isset($_POST['linkedin'])&&isset($_POST['fbid'])){
	$user = $_POST['name'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$pass = $_POST['password']; 
	$pass_check = $_POST['password_check'];
	$linkedin = $_POST['linkedin'];
	$fbid = $_POST['fbid'];
	if($pass!=$pass_check){
		echo "Passwords donot match!!";
	}else{
		$query = mysql_query("SELECT username FROM user WHERE username='$user'");
		if(mysql_num_rows($query)>=1){
			echo "the username already exists";
		}else{
			$query = mysql_query("SELECT email FROM user WHERE email='$email'");
			if(mysql_num_rows($query)>=1){
			echo "this email has been registered already";
			}
			else{
				$query = mysql_query("INSERT INTO user VALUES('','".$user."','".$username."','".$email."','".$pass."','".$linkedin."','".$fbid."','assets/Pro-Pic.png','assets/Cover-Pic.png','')");
				if($query){
					echo('<script>window.open("login.php","self");</script>');
				}else{
					echo mysql_error();
					echo "SORRY..Coulnt register. Try Again.";
				}
			}
		}
	}
}

?>




<!DOCTYPE html>
<html>
<head>
	<title> Sign Up</title>
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
                  <li ><a href="index.php">Home</a></li>
                    <li ><a href="theme.html">Theme</a></li>
                    <li  ><a href="contact.html">CONTACT US</a></li>
                    <li ><a href="legend.html">THE LEGEND OF SEABISCUIT</a></li>
                 </ul>
                
                <ul class="nav navbar-nav navbar-right">
                 <li><a href="signup.php" class="active"><span class="glyphicon glyphicon-user" style="background-color: #080808"></span> Sign Up</a></li>
                 <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
			<h1 style="color: #fff"> SIGNUP </h1>
			</div>
			 <form action="signup.php" method="POST">
			<div class="row">
				<input type="text" name="name" placeholder="Name">
			</div>
			
			<div class="row">
				<input type="text" name="username" placeholder="userName">
			</div>
			
			<div class="row">
				<input type="email" name="email" placeholder="Email Id">
			</div>
			
			<div class="row">
				<input type="password" placeholder="Password" pattern=".{6,}" required title="Minimum 6 characters" name="password">
			</div>
			<div class="row">
				<input type="password" placeholder="Confirm Password" name="password_check">
			</div>
			<div class="row">
				<input type="text" name="linkedin" placeholder="Linkedin_ID">
			</div>
			<div class="row">
				<input type="text" name="fbid" placeholder="Facebook_ID" >
			</div>
			<div class="row">
				 <input type="submit" value="Register" id="bt">
			</div>
		 </form>
		</div>
		</div>
		
		</div>
		</div>
</body>
</html>