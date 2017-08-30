<html>
<head><title>Question</title></head>
<body>
<?php
session_start();
$a=$_SESSION['user'];
$b=$_SESSION['pass'];
if(isset($a) && isset($b))
{              
                      
echo "<form method='post' action='http://localhost/project/options_insert.php'>";
if(isset($_POST['p_id'])){$p_id=$_POST['p_id'];} 
if(isset($_POST['q_id'])){$q_id=$_POST['q_id'];}

 $dblink = mysql_connect("localhost","root","");
 if(!$dblink) die("Could't connect to MySQL");
 mysql_select_db("quizzocity");
 
 if(isset($p_id) && isset($q_id)){
 $query="select total_opt from question where paper_id=$p_id AND question_id=$q_id";
 $data=mysql_query($query,$dblink) or die("couldn't"); 
 $row=mysql_fetch_row($data);
 $opt=$row[0];
   if($opt>0)
    {
//echo "$p_id<br>$q_id<br>";	
	 session_start();
     $_SESSION['op']=$opt;
	 $_SESSION['pid']=$p_id;
	 $_SESSION['qid']=$q_id;
	 
       for($i=1;$i<=$opt;$i++)
        {
		  echo "Enter option$i<input type='text' name='option$i'>";
		  echo "<br>";
		}	   
	}
	
 }   
 mysql_close($dblink);
 echo "<input type='submit'value='insert option'>";

echo "<br><br><a href='options.php'>Back</a>";
 echo"</form>";
 
 }
 else 
 {
   header("location:index.html");
 }
?>
</body>
</html>