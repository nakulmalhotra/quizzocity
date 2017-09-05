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
<body bgcolor=Coral>
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
	font-size:24px;
	font-weight:bold;  
	margin-left:10px;  
	border-radius:5px;  
}
a{
	text-decoration:none;
}

a:hover{
	text-decoration:none;
	color:black;
}
</style>


<center>
<h1>
QUIZZOCITY<hr>
</h1> 

<button class='sub'><a href='http://localhost/project/admingate.php'>Admin</a></button>

<br><br><br>

<button class='sub'><a href='http://localhost/project/profile.php'>User</a></button>








</center>
</body>
</html>
