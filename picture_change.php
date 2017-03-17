<?php
 ob_start();
  session_start();
   mysql_connect('localhost','root','');
  mysql_select_db('seabiscuit');
  $id=$_SESSION['uid'];
   $select= mysql_query("SELECT * FROM user WHERE uid =".$id);
$row=mysql_fetch_array($select);
$filepath1 = '';
$filepath2 = '';
if ( isset($_POST['btt']) ) {
$filetemp1 = $_FILES["pp"]["tmp_name"];
  $filename1 = $_FILES["pp"]["name"]; 
 	if($filename1!="")
	{
	$filepath1="profilepics/".$filename1;
   	 $query = "UPDATE user SET profilepic='$filepath1' WHERE uid=".$id;
   $res = mysql_query($query);  
  move_uploaded_file( $filetemp1 , $filepath1 );
  }
  $filetemp2 = $_FILES["cp"]["tmp_name"];
  $filename2 = $_FILES["cp"]["name"];
 	if($filename2!="")
	{
	$filepath2="coverpics/".$filename2;
   	 $query = "UPDATE user SET coverpic='$filepath2' WHERE uid=".$id;
   $res = mysql_query($query);  
  move_uploaded_file( $filetemp2 , $filepath2 );
  }
    if(!$res)
   {
    echo mysql_error();
	}
	echo($row[7]);
   }



?>
<!DOCTYPE html>
<html>
  <head>
    <title> Profile</title>
    <link rel="stylesheet" href="css/profile_style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="t.png" sizes="32x32" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	       
  </head>

  <body>
  
      <header class="site-head">
          <nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="0">
          <div class="container-fluid">
             <div class="navbar-header">
               <button type="button" class="navbar-toggle " data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
              </button>
              <a class="navbar-brand" href="profile.php">Hi   <?php echo $row[2];  ?> !</a>
               </div>
             
             <div class="collapse navbar-collapse" id="myNavbar">
               <ul class="nav navbar-nav">
                  <li class="active"><a href="">My Picture Change </a></li>
                    <li><a href="theme.php">THEME</a></li>
                    <li><a href="contact.php">CONTACT US</a></li>
                    <li><a href="legend.php">THE LEGEND OF SEABISCUIT</a></li>
                 </ul>
                  
                <form action="logout.php" method="post" class="nav navbar-form navbar-right" style="display:inline;">
                <button type="submit" class="btn btn-default">Logout</button>
               </form> 
              <form class="nav navbar-form navbar-right" style="display:inline;">
               <div class="form-group">
                 <input type="text" class="form-control" placeholder="Search">
                </div>
               <button type="submit" class="btn btn-default">Submit</button>
               </form>
                
                </div>
          </div>
      </nav>
      <div class="profile container-fluid">
             <img align="left" class="image-lg" src="<?php echo $row[8];  ?>" alt="Profile image example"/>
             <img align="left" class="image-profile thumbnail" src="<?php echo $row[7];  ?>" alt="Profile image example"/>
            <div class="profile-text">
                <h1><?php echo $row[1];  ?></h1>
				<form method="post" enctype="multipart/form-data" action="picture_change.php">
				PROFILE PICTURE:<input type="file" class="btn btn-primary" name="pp">
				COVER PICTURE:<input type="file" class="btn btn-primary" name="cp">
				<input type="submit" value="Save Changes" name="btt">
				</form>
                
            </div>
        </div>
        </header>
		</body></html>