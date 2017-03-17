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
 if( isset($_POST['btn']))
 {
  	$loginid=$_POST['fmail'];
	$password=$_POST['pass'];
	$query="SELECT * FROM user WHERE email='$loginid' AND password='$password'";
	$result=mysql_query($query);
	if(mysql_num_rows($result)>0)
	{
		$row = mysql_fetch_array($result);
		$_SESSION['loginid']=$row[0];
		header("location:profile.php");
	}
	else
	{
		echo "invalid username or password";
		
	}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title> Log In</title>
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
   
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>

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
        <div class="col-sm-6">

<div id="wowslider-container1">
<div class="ws_images"><ul>
    <li><img src="data1/images/b2.jpg" alt="" title="" id="wows1_0"/></li>
    <li><a href="http://wowslider.com"><img src="data1/images/b3.jpg" alt="wowslideshow" title="" id="wows1_1"/></a></li>
    <li><img src="data1/images/b100.jpg" alt="" title="" id="wows1_2"/></li>
  </ul></div>
  <div class="ws_bullets"><div>
    <a href="#" title=""><span><img src="data1/tooltips/b2.jpg" alt=""/>1</span></a>
    <a href="#" title=""><span><img src="data1/tooltips/b3.jpg" alt=""/>2</span></a>
    <a href="#" title=""><span><img src="data1/tooltips/b100.jpg" alt=""/>3</span></a>
  </div></div>
</div>  
<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>

        </div>

        <div class="col-sm-6" style="margin-top: 15%">
	<form action="login.php" method="post">
        <input type="email" name="fmail" placeholder="enter mail"><br>
        <input type="password" name="pass" placeholder="enter password">
		<input type="submit" name="btn" value="LOGIN">
		</form>
        </div>
      </div>
    </div>
</body>
</html>