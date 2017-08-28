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
<body bgcolor=Maroon>
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
	left:650px;
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
.dropdown0 {
    position: relative;
    display: inline-block;
	text-align:center;
	left:-60px;
	top:208px;
}
.dropbutton0 {
    background-color:Lightcyan;
    color: white;
    padding: 16px;
	width:127px;
	height:60px;
    font-size: 15px;
    border-radius:2px;
    cursor: pointer;
}
 
.dropdown0:hover .dropbutton0 {
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
if(isset($_POST['que1'])) $opt=$_POST['que1'];

if(isset($_SESSION['pID'])) $papID=$_SESSION['pID'];
if(isset($opt) && isset($papID))
    {
			$_SESSION['quesID']=$opt;
			$dblink = mysql_connect("localhost","root","");
			if(!$dblink) die("Could't connect to MySQL");
			mysql_select_db("quizzocity");
			$querry = mysql_query("Select totaloptions from questions where questionid=$opt");
			if($row = mysql_fetch_row($querry))
			 {
				  for($i=1;$i<=$row[0];$i++)
					 {
						echo "OPTION : ";
						echo"<input type=text name='$i'></input><br><br>";
					 }
			 }		 
			
			mysql_close($dblink);
    }
			

			for($i=1;$i<=$opt;$i++)
			{
	        if(isset($_POST['$i'])) $aaa=$_POST['$i'];
			if(isset($_SESSION['quesID'])) $qID=$_SESSION['quesID'];
			if(isset($_SESSION['pID'])) $papID=$_SESSION['pID'];
		
			if(isset($aaa) && isset($qID) && isset($papID))
			{
			$dblink=mysql_connect("localhost","root","");
			if(!$dblink) die("could not connect to mysql");
			$myDB="quizzocity";
			mysql_select_db($myDB);
			mysql_query("Insert into options values($papID,$qID,'$aaa')",$dblink);

			mysql_close($dblink);
				}	
			}
			?>


<center>
<input type=submit value='SAVE ' class='sub'></input>
</center>

<div class='dropdown2'>
	<button class='dropbutton2' >
	<a href='http://localhost/project/logout.php'>LOGOUT</a>
	</button>
	</div>


<div class='dropdown0'>
	<button class='dropbutton0' >
	<a href='http://localhost/project/options.php'>NEXT QUESTION</a>
	</button>
	</div>



</div>
</center>
</form>
</body>
</html>