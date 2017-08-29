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
<body bgcolor=#004478>
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
	font-family:Showcard Gothic;
	color:lightsteelblue;  
	font-weight:bold;  
	margin-left:10px;  
	border-radius:5px;  
}
.sub:hover {
	color:black;
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
a   {
	font-family:Showcard Gothic;
	text-decoration:none;
 }
 
a:hover {
	color:red;
 }

</style>


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

<br>

		<?php
		$dblink=mysql_connect("localhost","root","");
		if(!$dblink) die("could not connect to mysql");
		$myDB="quizzocity";
		mysql_select_db($myDB);
		
		$query1 = mysql_query("Select distinct paperid from questions",$dblink);
		while($row1 = mysql_fetch_row($query1))
		{       
				$query2=mysql_query("Select subject_id from testpaper where paperid=$row1[0]",$dblink);
				while($row2 = mysql_fetch_row($query2))
					{   
						$query3=mysql_query("Select subject_name from subject_info where subject_id=$row2[0]",$dblink);
							while($row3 = mysql_fetch_row($query3))
								{ 
									$subName[]=$row3[0];
								}	
					}
		}
				$ss=array_unique($subName);
		     for($i=0;$i<count($ss);$i++)
			 {
									echo " <a href='http://localhost/project/level.php?sub=$ss[$i]' class='sub'>$ss[$i]</a> ";			
				}			
					
		
			mysql_close($dblink);
		
			?>







</center>
</body>
</html>