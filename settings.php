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
<body bgcolor=Skyblue>


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
	font-weight:light;
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
.dropdown1 {
    position: relative;
    display: inline-block;
}
.dropbutton1 {
    background-color:Orchard;
    color: indigo;
    padding: 16px;
	font-family:Showcard Gothic;
	text-decoration:none;
    font-size: 16px;
    border-radius:10px;
    cursor: none;
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

</style>
<form action="http://localhost/project/settings.php" method=post>  

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

<br><br><br>

<div class="signupform" style="border:2px solid red">

	<div class='dropdown1'>
	<button class='dropbutton1' >CHANGE PASSWORD</button>
	</div>
<br><br><br>

Username :
<input type=text name='uuu1'></input>

<br><br>

Old Password :
<input type=text name='ttt3'></input> 

<br><br>

New Password :
<input type=password name='ttt1'></input> 

<br><br>

Confirm New Password :
<input type=password name='ttt2'></input> 
<br><br><br><br>
<input type=submit value=' SAVE ' class='sub'></input>

		<?php
		if(isset($_POST['uuu1'])) $un=$_POST['uuu1'];
		if(isset($_POST['ttt1'])) $np=$_POST['ttt1'];
	    if(isset($_POST['ttt2'])) $cnp=$_POST['ttt2'];
		if(isset($_POST['ttt3'])) $op=$_POST['ttt3'];
		
		if(isset($np) && isset($cnp) && isset($un) && isset($op))
		{   
		
				$dblink=mysql_connect("localhost","root","");
				if(!$dblink) die("could not connect to mysql");
				$myDB="quizzocity";
				mysql_select_db($myDB);
				
				if($np==$cnp)
				{
				
				$roll=mysql_query("Select password from signup where username='$un'",$dblink);
				while($row = mysql_fetch_row($roll))
				{ 
					if($row[0]==$op)
					{  
					$x=mysql_query("Update signup set password='$cnp' where username='$un'",$dblink);
					}
					else
					{
						echo"<script language='javascript' type='text/javascript'>";
						echo"alert('Trying to fool me!') ";
						echo"</script>";
					}
				}
				}
				else
				{
					echo"<script language='javascript' type='text/javascript'>";
					echo"alert(' Passwords do not match! ') ";
					echo"</script>";
				}
			mysql_close($dblink);
		
		}
		
		
		?>
		
		
		
		

</div>
</center>
</form>
</body>
</html>
