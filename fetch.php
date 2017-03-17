<?php
 mysql_connect('localhost','root','');
 mysql_select_db('seabiscuit');

 $no = $_POST['getresult'];
 $select = mysql_query("SELECT * FROM post LIMIT $no,10");
 while($row = mysql_fetch_array($select))
 {
  echo "<p class='result'>Title:  ".$row['title']."<br>Body:<br>".$row['body']."</p>";
 }
?>