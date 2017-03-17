<?php
 mysql_connect('localhost','root','');
 mysql_select_db('seabiscuit');

 $no = $_POST['v1'];
 $select = mysql_query("SELECT * FROM post ");
 while($row = mysql_fetch_array($select))
 {
   if (strpos($row[2], $no) !== false ||$row[3], $no) !== false || $row[7], $no) !== false ) {
   echo "<p class='result'>Title:  ".$row['title']."<br>Body:<br>".$row['body']."</p>";
}
 }
?>