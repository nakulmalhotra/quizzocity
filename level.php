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
<body bgcolor=Falcon>
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
	background-color:Slateblue;  
	padding: 9px 40px 9px 40px; 
	font-family:Showcard Gothic;
	color:lightsteelblue;
	font-size:20px;
	margin-left:10px;  
	border-radius:5px;  
}
.nav{
    background-color:slateGrey;
     height:50px;
	 width:650px;
	border-radius:4px;  
	font-weight:bold;  
	margin-top:-33px; 
	
}
.dropdown {
    position: relative;
    display: inline-block;
}
.dropbutton {
    background-color:yellow;
    color: white;
    padding: 16px;
    font-size: 16px;
    border-radius:10px;
    cursor: pointer;
}
a   {
	font-family:Showcard Gothic;
	text-decoration:none;
 }
 
a:hover {
	color:red;
 }
 
.dropdown:hover .dropbutton {
    background-color:#000000 ;
	
}
.dropdown2 {
    position: relative;
    display: inline-block;
	text-align:center;
	left:600px;
	top:-58px;
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

</style>

<form action="http://localhost/project/quiz.php" method=post>
<center>
<h1>
QUIZZOCITY<hr>
</h1> 
<table class='nav'>
<tr>
		
	<th>
	<div class='dropdown'>
	<button class='dropbutton' >
	<a href='http://localhost/project/usertopic.php'>Topics</a>
	</button>
	</div>
	</th>
	
	<th>
	<div class='dropdown'>
	<button class='dropbutton' >
	<a href=''>Performance</a>
	</button>
	</div>
	</th>
	
	<th>
	<div class='dropdown'>
	<button class='dropbutton' >
	<a href='http://localhost/project/profile.php'>Home</a>
	</button>
	</div>
	</th>
	
	<th>
	<div class='dropdown'>
	<button class='dropbutton' >
	<a href='http://localhost/project/settings.php'>Settings</a>
	</button>
	
	</div>
	</th>
	
	<th>
	<div class='dropdown'>
	<button class='dropbutton' >
	<a href=''>About Us</a>
	</button>
	</div>
	</th>


</tr>
</table>

<div class='dropdown2'>
	<button class='dropbutton2' >
	<a href='http://localhost/project/logout.php'>LOGOUT</a>
	</button>
	</div>

<br><br><br>
<h3 style="font-family:Showcard Gothic;">SELECT PAPER :

 
		<?php
	   
			if(isset($_GET['sub']))
			{
			$d=$_GET['sub'];
			$dblink=mysql_connect("localhost","root","");
			if(!$dblink) die("could not connect to mysql");
			$myDB="quizzocity";
			mysql_select_db($myDB);
			$query2=mysql_query("Select subject_id from subject_info where subject_name='$d'",$dblink);
			echo "<select name='quizName'> ";
			while($r = mysql_fetch_row($query2))
				{
				echo "<br>$r[0]";
				$roll=mysql_query("Select papername,level,paperid from testpaper where subject_id='$r[0]'",$dblink);
								
				while($row = mysql_fetch_row($roll))
				  {       
					
					echo" <option value='$row[2]'> $row[0] ($row[1]) </option><br> ";
					
					}
				}
				echo"</select> ";
				
					mysql_close($dblink);
			   }
			   ?>
			</h3>
			<br>

<br><br><br>
<input type=submit value=' Start the quiz ' class='sub'></input>
</form>
</center>
</body>
</html>
