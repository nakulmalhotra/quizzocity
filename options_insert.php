<html>
<head><title>Question</title></head>
<body>
<?php  
session_start();
$a=$_SESSION['user'];
$b=$_SESSION['pass'];
if(isset($a) && isset($b))
{              

$dblink = mysql_connect("localhost","root","");
if(!$dblink) die("Could't connect to MySQL");
mysql_select_db("quizzocity");
   

  session_start();
  $opt=$_SESSION['op'];
  $p_id=$_SESSION['pid'];
  $q_id=$_SESSION['qid'];
  
  //echo "opt:$opt<br>p:$p_id<br>q:$q_id";
   if($opt>0)
   {
      for($i=1;$i<=$opt;$i++)
      {
         if(isset($_POST["option$i"]))
		 {	  
	      $o="option$i";
          ${$o}=$_POST["option$i"];
         }
      }
    }
	for($i=1;$i<=$opt;$i++)
      {
	  if(isset($o) && strlen($o)>0)
	   {
	    //echo "opt$i:${option.$i}  <br> ";
		$query="insert into options values('$p_id','$q_id','${option.$i}')";
		mysql_query($query,$dblink) or die ("couldn't insert");
		echo "sucessfully inserted<br>";
	   }
      }
 mysql_close($dblink);

echo "<br><br><a href='options.php'>Back</a>"; 
 }
 else
 {
   header("location:index.html");
 }
?>
</body>
</html>