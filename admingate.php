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
<body bgcolor=Green >
<style>
h1{
	font-family:Showcard Gothic;
	font-size :68px;
}
.dropdown {
    position: relative;
    display: inline-block;
	text-align:center;
	left:-100px;
	top:100px;
}
.dropbutton {
    background-color:Skyblue;
    color: white;
    padding: 16px;
	width:127px;
	height:60px;
    font-size: 15px;
    border-radius:5px;
    cursor: pointer;
}
 
.dropdown:hover .dropbutton {
    background-color:Musk ;
	
}
.dropdown2 {
    position: relative;
    display: inline-block;
	text-align:center;
	left:600px;
	top:-35px;
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
.dropdown3 {
    position: relative;
    display: inline-block;
	text-align:center;
	left:200px;
	top:100px;
}
.dropbutton3 {
    background-color:Skyblue;
    color: white;
    padding: 16px;
	width:127px;
	height:60px;
    font-size: 15px;
    border-radius:5px;
    cursor: pointer;
}
 
.dropdown3:hover .dropbutton3 {
    background-color:Musk ;
	
}
.dropdown4 {
    position: relative;
    display: inline-block;
	text-align:center;
	left:-140px;
	top:100px;
}
.dropbutton4 {
    background-color:Skyblue;
    color: white;
    padding: 16px;
	width:127px;
	height:60px;
    font-size: 15px;
    border-radius:5px;
    cursor: pointer;
}
 
.dropdown4:hover .dropbutton4 {
    background-color:Musk ;
	
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



<div class='dropdown2'>
	<button class='dropbutton2' >
	<a href='http://localhost/project/logout.php'>LOGOUT</a>
	</button>
	</div>

	<br><BR>
	

<div class='dropdown'>
	<button class='dropbutton' >
	<a href='http://localhost/project/subject.php'>SUBJECT ENTRY</a>
	</button>
	</div>

		
	
	
<div class='dropdown3'>
	<button class='dropbutton3' >
	<a href='http://localhost/project/testpaper.php'>QUIZ ENTRY</a>
	</button>
	</div>

	
	
		
<div class='dropdown4'>
	<button class='dropbutton4' >
	<a href='http://localhost/project/options.php'>OPTION ENTRY</a>
	</button>
	</div>

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</body>
</html>