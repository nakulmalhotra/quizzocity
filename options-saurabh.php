<html>
<head><title>Options</title></head>
<body>
<?php
session_start();
$a=$_SESSION['user'];
$b=$_SESSION['pass'];
if(isset($a) && isset($b))
{              
echo "<form method='post' action='http://localhost/project/options_fill.php'>";
$dblink = mysql_connect("localhost","root","");
if(!$dblink) die("Could't connect to MySQL");
mysql_select_db("quizzocity");

$querry = mysql_query("Select paper_id from testpaper");
echo "Select paper id:<select name='p_id'>";
while($row = mysql_fetch_row($querry))
 {
 
    foreach($row as $field)
      {
	   print "<option value='$field'>$field </option>";
      }
 }
  echo "</select><br>";
  
  $querry2 = mysql_query("Select question_id from question ");
echo "Select question id:<select name='q_id'>";
while($row = mysql_fetch_row($querry2))
 {
 
    foreach($row as $field)
      {
	   print "<option value='$field'>$field </option>";
      }
 }
  echo "</select><br><br>";
echo "<input type='submit'value='insert option'>";
echo"</form>";
mysql_close($dblink);

echo "<br><br><a href='user.php'>Back</a>";
}
else
{
 header("location:index.html");
}
?>
</body>
</html>