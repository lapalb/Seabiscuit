
<!DOCTYPE html>

<html>
<head>
<link rel="stylesheet" type="text/css" href="load_style.css">
<script type="text/javascript" src="https://ajax.microsoft.com/ajax/jQuery/jquery-1.4.2.min.js"></script>

<script type="text/javascript">



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


<center>
 <h1>Seabiscuit</h1>
 <div id="content">
  <div >
   <?php
  mysql_connect('localhost','root','');
  mysql_select_db('seabiscuit');
  
  $select = mysql_query("SELECT * FROM post ORDER BY date_time DESC LIMIT 0,10");
  while($row = mysql_fetch_array($select))
  {
   echo "<p class='result'>Title:  ".$row['title']."<br>Body:<br>".$row['body']."</p>";
  }
  ?>
  <div id="loadpost"></div>
  <input type="hidden" id="loadpost_count" value="10">
  <input type="button" id="load" value="Load More Results" onClick="loadmore()" ">
  </div>
 </div>
</center>

</body>
</html>