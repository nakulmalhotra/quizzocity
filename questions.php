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
<body bgcolor=Purple>
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
	left:600px;
	top:-458px;
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


<form action="http://localhost/project/questions.php" method=post>    
<center>


<h1>
QUIZZOCITY<hr>
</h1> 

<div class="signupform" style="border:2px solid green">


            <?php
			
					
			if(isset($_SESSION['pid']))
			{
			$j=$_SESSION['pid'];
			$y=1;
			
			echo "PAPER ID - ";
			echo " $j<br>";
			$dblink=mysql_connect("localhost","root","");
			if(!$dblink) die("could not connect to mysql");
			$myDB="quizzocity";
			mysql_select_db($myDB);
			
			$query="Select max(questionid) from questions group by paperid having paperid=$j ";
			
			echo "LAST QUESTION ID ENTERED- ";
			$roll=mysql_query($query,$dblink);
			
			if($row = mysql_fetch_row($roll))
			{	
				$y=$row[0]+1;
				echo " $y<br>";
			}
			else
			{
			echo " 1<br> ";
			}
			$_SESSION['qid']=$y;
			mysql_close($dblink);
			}
			
			
			?>

<br>


Question :<br>
<textarea rows='10' cols='30' name='ta1'>

</textarea>
<br><br>

Total No. of options  :
<select name='s4'>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
</select>
<br><br>


Marks  :
<select name='s5'>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
</select>
<br><br>

Correct option :
<select name='s6'>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
</select>
<br><br>


			<?php
	        if(isset($_POST['s4'])) $e=$_POST['s4'];
	        if(isset($_POST['s5'])) $w=$_POST['s5'];
	        if(isset($_POST['s6'])) $z=$_POST['s6'];
	        if(isset($_POST['ta1']))$v=$_POST['ta1'];
			
			 if(isset($e) && isset($w) && isset($z) && isset($v))
			{
			$dblink=mysql_connect("localhost","root","");
			if(!$dblink) die("could not connect to mysql");
			$myDB="quizzocity";
			mysql_select_db($myDB);
			mysql_query("Insert into questions(paperid,questionid,question,totaloptions,marks,answer) values($j,$y,'$v',$e,$w,$z)",$dblink);
				
			mysql_close($dblink);
			}		
			
			?>
			
			
<input type=submit class='sub' value='NEXT '></input>
<br><br>
<div class='dropdown2'>
	<button class='dropbutton2' >
	<a href='http://localhost/project/logout.php'>LOGOUT</a>
	</button>
	</div>


</form>
</body>
</html>
