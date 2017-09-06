<?php
session_start();
if(isset($_SESSION['r']))
{
		  $b=$_SESSION['r'];
}
else
{
header("Location:http://localhost/project/signup.php");
}
?>


<html>
<body bgcolor=Chamaleon>
<style>

h1{
	font-family:Showcard Gothic;
	font-size :68px;
}
.signupform{  
    padding:15px;   
    font-family:Showcard Gothic;
	border-radius:20px;  
    float:center;  
	width:450px;
    margin-top:-20px;  
	background-color:lightblue;
}
.sub{  
	background-color:	#cd2626;  
	padding: 9px 40px 9px 40px; 
	color:lightsteelblue;  
	font-weight:bold;  
	margin-left:10px;  
	border-radius:5px;  
}
.dropdown2 {
    position: relative;
    display: inline-block;
	text-align:center;
	left:500px;
	top:-88px;
}
.dropbutton2 {
    background-color:black;
    color: white;
    padding: 16px;
	width:127px;
	height:60px;
    font-size: 15px;
    border-radius:2px;
    cursor: pointer;
}
 
.dropdown2:hover .dropbutton2 {
    background-color:Lightcoral ;
	
}
a   {
	font-family:Showcard Gothic;
	text-decoration:none;
 }
 
a:hover {
	color:red;
 }
</style>


<form action="http://localhost/project/insertoptions.php" method=post>    
<center>
<h1>
QUIZZOCITY<hr>
</h1> 


<div class="signupform" style="border:2px solid green">



<?php
if(isset($_POST['pap1'])) $x=$_POST['pap1'];
$_SESSION['pID']=$x;
if(isset($x))
{

$dblink = mysql_connect("localhost","root","");
if(!$dblink) die("Could't connect to MySQL");
mysql_select_db("quizzocity");
$querry = mysql_query("Select questionid from questions where paperid=$x");
echo "QUESTION ID : <select name='que1'>";
while($row = mysql_fetch_row($querry))
 {
      foreach($row as $i)
	  {
	   print "<option value='$i'>$i</option>";
      }
 }
 echo "</select><br>";
 
 mysql_close($dblink);
}


?> 
 <br><BR><Br>
 
 
 <input type='submit' class='sub' value='Insert Options'></input>
 
 
 
 <div class='dropdown2'>
	<button class='dropbutton2' >
	<a href='http://localhost/project/logout.php'>LOGOUT</a>
	</button>
	</div>


	</form>
	</body>
	</html>