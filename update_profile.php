<?php 
session_start();
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
		if(mysql_num_rows($query)>=2){
			echo "the username already exists";
		}else{
			$query = mysql_query("SELECT email FROM user WHERE email='$email'");
			if(mysql_num_rows($query)>=2){
			echo "this email has been registered already";
			}
			else{
				$query = mysql_query("UPDATE user SET name='$user' , username='$username' , email='$email', password='$pass', link_id='$linkedin', fb_id='$fbid' WHERE uid=".$_SESSION['uid']);
				if($query){
					echo "UPDATED";
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
	<title> Edit Profile</title>
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
			<h1 style="color: #fff"> PROFILE </h1>
			</div>
			 <form action="" method="POST">
			<?php 
			if(@!mysql_connect('localhost','root','')||@!mysql_select_db('seabiscuit')){
	die(mysql_error());
}
$cid=$_SESSION['uid']; 
echo($cid);
$r="SELECT * FROM `user` WHERE uid=".$cid;
echo($r);
$query=mysql_query($r);
$row=mysql_fetch_array($query);
echo $row[2];
	echo	"<div class='row'>
				<input type='text' name='name' placeholder='Name' value=".$row[1].">
			</div>
			
			<div class='row'>
				<input type='text' name='username' placeholder='userName' value=".$row[2].">
			</div>
			
			<div class='row'>
				<input type='email' name='email' placeholder='Email Id' value=".$row[3].">
			</div>
			
			<div class='row'>
				<input type='password' placeholder='Password' pattern='.{6,}' required title='Minimum 6 characters' name='password' value=".$row[4].">
			</div>
			<div class='row'>
				<input type='password' placeholder='Confirm Password' name='password_check'>
			</div>
			<div class='row'>
				<input type='text' name='linkedin' placeholder='Linkedin_ID' value=".$row[5].">
			</div>
			<div class='row'>
				<input type='text' name='fbid' placeholder='Facebook_ID' value=".$row[6].">
			</div>";
			?>
			<div class="row">
				 <input type="submit" value="Save Changes" id="bt">
			</div>
		 </form>
		</div>
		</div>
		
		</div>
		</div>
</body>
</html>