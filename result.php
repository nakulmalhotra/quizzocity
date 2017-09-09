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
h2{
	font-family:Showcard Gothic;
	font-size :38px;
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
<br>
<div class='dropdown2'>
	<button class='dropbutton2' >
	<a href='http://localhost/project/logout.php'>LOGOUT</a>
	</button>
	</div> 
	
<h2> SCORE </h2>
<br><br>
<font face="Segoe Script">
<?php

if(isset($_SESSION['totalQuestions'])) $q=$_SESSION['totalQuestions'];
if(isset($q))
{
//echo "Total Questions - $q <br>";
}

if(isset($_SESSION['attemptedQuestions'])) 
{
 $b=$_SESSION['attemptedQuestions'];
echo "Attempted Questions - $b <br>";
}

if(isset($_SESSION['rightAnswer'])) 
{
 $c=$_SESSION['rightAnswer'];
echo "Correct Answers - $c <br>";
}

if(isset($_SESSION['wrongAnswer'])) 
{
 $d= $_SESSION['wrongAnswer'];
echo "Wrong Answers - $d <br>";
}

if(isset($_SESSION['starttime']) && isset($_SESSION['endtime']))
{
	$t1=$_SESSION['starttime'];
	$t2=$_SESSION['endtime'];
	$time3=$t2-$t1; 
	echo "Time Taken - $time3 minutes<br>";
}


?>
</font>	

</center>
</body>
</html>