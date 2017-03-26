<?php
 ob_start();
  session_start();
  $_SESSION['loginid']=$_SESSION['loginid'];
  ?>
<!DOCTYPE html>
<html>
   <head>
      <title> CONTACTS</title>
      <link rel="stylesheet" href="css/profile_style.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
       <link rel="stylesheet" href="css/style.css?v=1.3">
       <link rel="icon" href="t.png" sizes="32x32" />
      <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      </script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <style type="text/css">

        h4{
          font-family:lato;
        }
        body{
          background-color: #143642;
          color: white;
        }
        P{
          color: white;
        }
       
.col-sm-6 > input{
  margin-bottom: 26px;
  width:100%;
}


        
        
      </style>
   </head>
   <body >
      <header >
      <nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="0">
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
                  <li > <?php      
	 if($_SESSION['loginid']=="")
	 {
	 echo "<a href='index.php'>Home</a>";
          
			}
			else{
			   echo "<a href='profile.php'>MY PROFILE</a>";
			}
			?>
			
			</li>
                    <li><a href="theme.php">THEME</a></li>
                    <li  class="active"><a href="contact.php">CONTACT US</a></li>
                    <li><a href="legend.php">THE LEGEND OF SEABISCUIT</a></li>
                 </ul>
          <?php      
	 if($_SESSION['loginid']=="")
	 {
             echo "<form class='nav navbar-form navbar-right' style='display:inline;'>
               <div class='form-group'>
                 <input type='text' class='form-control' placeholder='Search'>
                </div>
               <button type='submit' class='btn btn-default'>Submit</button>
               </form>
                
                <ul class='nav navbar-nav navbar-right'>
                 <li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
                 <li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
             </ul>";
                 }
      else
	  {
                
           echo "<ul class='nav navbar-nav navbar-right'>
                  <form action='logout.php' method='post' class='nav navbar-form navbar-right' style='display:inline;'>
                <button type='submit' class='btn btn-default'>Logout</button>
               </form> 
			    </ul>";
				}
				?>
             </div>
          </div>
      </nav>
      </header>
          </div>
      <div class="container">
            <div class="row">
      <div class="col-sm-6" style="text-align: center; border : 1px solid green">
      
            
                  <h1>Office Address</h1>
                    <p>M/s Seabiscuit Energy Solutions Private Limited<br>
8, Mahavir Nagar, Osmanpura,<br>
Aurangabad 431005<br>
INDIA </p>

<h1>Phone</h1>
<p>9637101980, 0240-2322496 </p>

<h1>Email</h1>
<p>info@seabiscuit.in </p>

<h1>Twitter</h1>
<p>@SeabiscuitIndia </p>


                </div>
                
                <div class="col-sm-6" style="text-align: center; border : 1px solid green">
                  <h1 style="text-align: center">Quick Contact</h1><br>
                    
                    <input type="text" placeholder="Name">
                    </br>
                    
                    <input type="text" placeholder="Contcat No">
                    <br>
                    <input type="text" placeholder="Email ID">
                    <br>
                    <input type="text" placeholder="Company Name">
                    <br>
                    <input type="text" placeholder="City">
                    <br>
                    <input type="text" placeholder="Subject">
                    <br>
                    <textarea placeholder="Description"></textarea>
                    <br>
                    <input type="submit" value="Send Message">
                    
                </div>
              
            </div>
 
     </div>
     </div>
      </div>
      </div>
      
     
      
      
   </body>
</html>