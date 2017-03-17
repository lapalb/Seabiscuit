<?php
 mysql_connect('localhost','root','');
 mysql_select_db('seabiscuit');

 $no = $_POST['id'];
 $select = mysql_query("SELECT * FROM post WHERE postid=".$no);
 while($row = mysql_fetch_array($select))
 {
  $data= "#$#".$row[1]."#$#".$row[2]."#$#".$row[3]."#$#".$row[4]."#$#".$row[7];
  echo $data;
 }




?>

