<?php
 ob_start();
  session_start();
   mysql_connect('localhost','root','');
  mysql_select_db('seabiscuit');
  $id=$_SESSION['loginid'];
  $_SESSION['uid']=$id;
  $select= mysql_query("SELECT * FROM user  WHERE uid = '$id'");
$nm=mysql_fetch_array($select);

  $select = mysql_query("SELECT * FROM post  WHERE uid = '$id' ORDER BY date_time DESC LIMIT 0,10 ");
 if($select === FALSE) { 
    die(mysql_error()); // TODO: better error handling
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
	        <script type="text/javascript">
        var $lastOpened = false;
        // simply close the last opened menu on document click
        $(document).click(function(){
        if($lastOpened){
                $lastOpened.removeClass('open');
                        }
            });


          // simple event delegation
          $(document).on('click', '.pulldown-toggle', function(event){
  
          var el = $(event.currentTarget);
  
          // prevent this from propagating up
          event.preventDefault();
          event.stopPropagation();

          // check for open state
          if(el.hasClass('open')){
              el.removeClass('open');
            }else{
          if($lastOpened){
            $lastOpened.removeClass('open');
            }
            el.addClass('open');
            $lastOpened = el;
            }
  
            });
          // Get the modal
              var modal = document.getElementById('myModal');

              // Get the button that opens the modal
                var btn = document.getElementById("myBtn");

              // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks the button, open the modal 
                btn.onclick = function() {
                modal.style.display = "block";
                }

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                modal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                if (event.target == modal) {
                modal.style.display = "none";
                }
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
	   <script>
function abc(pid)
{
alert(pid);
 $.ajax({
 type: 'post',
 url: 'edit.php',
 data: {
id:pid
 },
 success: function (response) {
 alert(response);
  var str=response.split("#$#");
   var idd = document.getElementById("ppid");
 idd.innerHTML = idd.innerHTML+str[1];
 idd.value=str[1];
    var desc = document.getElementById("dscr");
	desc.innerHTML="";
  desc.innerHTML = desc.innerHTML+str[3];
  
   var cont = document.getElementById("bdy");
   cont.innerHTML ="";
  cont.innerHTML = cont.innerHTML+str[4];
    var tagg = document.getElementById("tag");
 tagg.innerHTML ="";
  tagg.innerHTML = tagg.innerHTML+str[5];
  }
 });
}


function del(pid1)
{
   var i = document.getElementById("pidd");
   i.innerHTML = i.innerHTML+pid;
i.value=pid1;
alert(i.value);
}
</script>

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
              <a class="navbar-brand" href="profile.php">Hi   <?php echo $nm[2];  ?> !</a>
               </div>
             
             <div class="collapse navbar-collapse" id="myNavbar">
               <ul class="nav navbar-nav">
                  <li class="active"><a href="profile.php">MY PROFILE </a></li>
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
             <img align="left" class="image-lg" src="<?php echo $nm[8];  ?>" alt="Profile image example"/>
             <img align="left" class="image-profile thumbnail" src="<?php echo $nm[7];  ?>" alt="Profile image example"/>
            <div class="profile-text">
                <h1><?php echo $nm[1];  ?></h1>
                
            </div>
        </div>
        </header>
<div class="container">
<div class="row">
	<div class="col-sm-12">
	<div class="btn-group btn-group-justified">
		<a href="picture_change.php" class="btn btn-primary">Change Profile Picture</a>
		<a href="picture_change.php" class="btn btn-primary">Change Cover Picture </a>
		<a href="new_post.php" class="btn btn-primary">Add New Post</a>
		<a href="update_profile.php" class="btn btn-primary">Edit Profile</a>
</div>
	</div>
</div>
</div>
<?php 
		  
		while($row = mysql_fetch_array($select) )
		{ 
						

 echo "<div class='post'>
      <div class='hold'>	  
      <div class='container'>
        <div class=row'>
          
          <div class='col-sm-4'>
		       <div class='post_image'>";
			   
			if(	$row['image']!="")
			{
	echo "<img src=".$row['image'] ." class='img-responsive' height='200'>";
			}
			 echo " </div>
          </div>
		  <div class='col-sm-8'>
			<div class='container-fluid hold'>
			<div class='row'>
            <div class='col-sm-10'>
            <h1> ".$row['title']."</h1>
            <h4 class='username'> ".$row['username']." </h4>
            <span>
            <h4 class='date'>".$row['date_time']." </h4>
            </span>
            </div>
			            <div class='col-sm-2'>
            <div class='pulldown'>
            <div class='pulldown-toggle pulldown-toggle-round'><div class='lines'></div></div>
              <div class='pulldown-menu'>
               <ul>
              <li>
                <div class='container'>
  <button type='button' class='btn btn-info btn-default' data-toggle='modal' data-target='#myModal1' onclick='abc(".$row['postid'].")'>Edit</button>
  

  <!-- Modal -->
  <div class='modal fade' id='myModal1' role='dialog'>
    <div class='modal-dialog modal-lg modal-md modal-sm'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Edit Post</h4>
        </div>
        <div class='modal-body'>
          <h2><div id='title'></div></h2>
          <form action='edited.php' method='post'>
          <div class='form-group'>
            <label for='desc'>Description</label>
            <textarea class='form-control' rows='3' id='dscr' name='dscr'></textarea>
            </div>
            <div class='form-group'>
            <label for='pwd'>Post Content</label>
            <textarea class='form-control' rows='8' id='bdy' name='bdy'></textarea>
			<input type='hidden' name='ppid' id='ppid' >
			<label for='desc'>Tags</label>
           <textarea class='form-control' rows='1' id='tag' name='tag'></textarea>
            </div>
         <button type='submit' class='btn btn-default' id='bt' >Submit</button>
          </form>
          </div>

        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
		
      </div>
    </div>
  </div>

              </li>
              <li>
                <div class='container'>
  <button type='button' class='btn btn-info btn-default' data-toggle='modal' data-target='#myModal2' onclick='del(".$row['postid'].")'>Delete</button> 

  <!-- Modal -->
  <div class='modal fade' id='myModal2' role='dialog'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Delete</h4>
        </div>
        <div class='modal-body'>
          <p>Do you want to delete this post ?</p>
        </div>
        <div class='modal-footer'>
		<form action='delete.php' method='post'>
			<input type='hidden' name='pidd' id='pidd' >
          <button type='submit' class='btn btn-default' data-dismiss='modal' id='dell' >Yes</button>
          <button type='button' class='btn btn-default' data-dismiss='modal'>No</button></form>
        </div>
      </div>
    </div>
  </div>
</div>
              </li>
              </ul>
              </div>
              </div>
            </div>
            </div>
			<div class='row'>
			<div class='col-sm-12'>
            <p>"
						 . $row['description'] ."<br>"
						 .$row['meta_desc'] ."<br>"
						 .$row['body'] . 
						
						"</p>
        </div>
		</div>
        </div>
		</div>
        </div>
		</div>
		</div>
		</div>";
		?>
  <?php
  }
  ?> 	  
  <div id="loadpost"></div>
  <input type="hidden" id="loadpost_count" value="10">
  <input type="button" id="load" value="Load More Results" onClick="loadmore()" ">
  </div>
		
		<div class="footer"></div>
		
      </body>
	  
    </html>