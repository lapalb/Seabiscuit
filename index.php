<?php
 ob_start();
   mysql_connect('localhost','root','');
  mysql_select_db('seabiscuit');
  $select = mysql_query("SELECT * FROM post ORDER BY date_time DESC LIMIT 0,10");
 
?>
<!DOCTYPE html>
<html>
	<head>
		<title> seabiscuit</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"></script>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="load_style.css">
<script type="text/javascript" src="https://ajax.microsoft.com/ajax/jQuery/jquery-1.4.2.min.js"></script>

<script type="text/javascript">
function search()
{
 var ind = document.getElementById("search");
  $.ajax({
 type: 'post',
 url: 'find.php',
 data: {
  v1:ind
 },
 success: function (response) {
  var content = document.getElementById("loadpost");
  content.innerHTML = content.innerHTML+response;

 }


function loadmore()
{
 var val = document.getElementById("loadpost_count").value;
 $.ajax({
 type: 'post',
 url: 'fetch.php',
 data: {
  getresult:val
 },
 success: function (response) {
  var content = document.getElementById("loadpost");
  content.innerHTML = content.innerHTML+response;

  // We increase the value by 2 because we limit the results by 10
  document.getElementById("loadpost_count").value = Number(val)+10;
 }
 });
}
</script>
	</head>

	<body>
	
			<header class="site-head">
		  		<div class="row" style="background-color: #143642">
			  		<div class="col-sm-4"></div>
			  		<div class="col-sm-6"> <img src="images/logo.jpg" class="img-responsive"/></div>
			  		<div class="col-sm-2"> </div>
		  		</div>
		  		
		  		<div class="row" style="background-color: #143642">
			  	<div class="col-sm-5"></div>
			  		<div class="col-sm-5"> <b> Changing Your Biscuit </b></div>
			  		<div class="col-sm-2"> </div>
				 </div>
		  	</header>

			<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="259">
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
					        <li class="active"><a href="">Home</a></li>
				            <li><a href="theme.php">Theme</a></li>
				            <li><a href="contact.php">CONTACT US</a></li>
				            <li><a href="legend.php">THE LEGEND OF SEABISCUIT</a></li>
				         </ul>				        
				        <ul class="nav navbar-nav navbar-right">
	       				 <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	       				 <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
     				 </ul>
     				 </div>
  				</div>
			</nav>
			
			<div class="container">
				<div class="row">
				  
				  <div class="col-sm-12">
						<div class="row">
							<div class="col-sm-3">
					<?php 
						while($row = mysql_fetch_array($select) )
						{ 
						echo  "<img src=" .$row['image'] . " class='img-responsive'>
							</div>
						<div class='col-sm-7'>
						<h1>" .$row['title']. "</h1>
						<h4 class='username'>" .$row['username'].
						"<span>
						<h4 class='date'>" .$row['date_time'].
						"</h4>
						</span>
						</h4>
						</div>
						<div class='row'>
						<div class='col-sm-10'>
						<p>"
						 . $row['description'] ."<br>"
						 .$row['meta_desc'] ."<br>"
						 .$row['body'] . 
						
						"</p>" ;
					 	?>
						<?php 
						
						}
					?>
				</div>
				</div>
				</div>
				</div>
				</div>
				<div id="loadpost"></div>
  <input type="hidden" id="loadpost_count" value="10">
  <input type="button" id="load" value="Load More Results" onClick="loadmore()" ">
  </div>
				<div class="footer"></div>
			</body>
		</html>