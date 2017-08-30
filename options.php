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
<body bgcolor=Cyan>
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
	left:570px;
	top:-108px;
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


<form action="http://localhost/project/optionmid.php" method=post>    
<center>
<h1>
QUIZZOCITY<hr>
</h1> 


<div class="signupform" style="border:2px solid green">

<?php
$dblink = mysql_connect("localhost","root","");
if(!$dblink) die("Could't connect to MySQL");
mysql_select_db("quizzocity");
$querry = mysql_query("Select distinct paperid from questions ");
echo "PAPER ID : <select name='pap1'>";
while($field = mysql_fetch_row($querry))
 {
   foreach($field as $i)
   {
	   print "<option value='$i'>$i</option>";
    }  
 }
 echo "</select><br>";
 

 mysql_close($dblink);
 
 ?>
<br><br>
<center>
<input type='submit' value='Proceed ' class='sub'></input>
</center>
</form>	

	

<div class='dropdown2'>
	<button class='dropbutton2' >
	<a href='http://localhost/project/logout.php'>LOGOUT</a>
	</button>
	</div>



</div>
</center>
</body>
</html>