<?php
session_start();

if(isset($_SESSION['r']))
{
		   $hhg=$_SESSION['r'];
		   $uname=$_SESSION['username'];
}
else
{
header("Location:http://localhost/project/signup.php");
}
?>


<html>
<title>
QUIZZOCITY
</title>
<body bgcolor=#000058>
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

.nav{
    background-color:slateGrey;
     height:50px;
	 width:650px;
	border-radius:4px;  
	font-weight:bold;  
	margin-top:-110px; 
	
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
.user1{
	margin-right:1140px;
	margin-top:20px;
	border-right:3px solid black;
	font-family:Segoe Script;
	font-size:20px;
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


<form action="http:localhost/project/questions.php" method=post>    
<center>
<h1>
QUIZZOCITY<hr>
</h1> 

<?php
echo "<div class='user1' ><b>Welcome , $uname</b><br>";
$dblink = mysql_connect("localhost","root","");
if(!$dblink) die("Could't connect to MySQL");
mysql_select_db("quizzocity");
$querry = mysql_query("Select fname,lname,mobile from signup where username='$uname'");
while($field = mysql_fetch_row($querry))
 {
   foreach($field as $i)
   {
	   print "$i ";
    }  
 }
 echo"</div>";
 mysql_close($dblink);

?>

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



</form>
</body>
</html>