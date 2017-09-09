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
<body bgcolor=#3366FF>
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

.dropdown3 {
    position: relative;
    display: inline-block;
	text-align:center;
	left:600px;
	top:150px;
}
.dropbutton3 {
    background-color:black;
    color: white;
    padding: 16px;
	width:127px;
	height:60px;
    font-size: 15px;
    border-radius:2px;
    cursor: pointer;
}
 
.dropdown3:hover .dropbutton3 {
    background-color:Lightcoral ;
	
}
.dropdown4{
    position: relative;
    display: inline-block;
	text-align:center;
	right:600px;
	top:209px;
}
.dropbutton4 {
    background-color:black;
    color: white;
    padding: 16px;
	width:127px;
	height:60px;
    font-size: 15px;
    border-radius:2px;
    cursor: pointer;
}
 
.dropdown4:hover .dropbutton4 {
    background-color:Lightcoral ;
	
}
</style>

<form action="http://localhost/project/quizgate.php" method=post>
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
	
			<?php
			
			if(isset($_SESSION['Qid'])) 
			{
				$id=$_SESSION['Qid'];
				$id1=$id+1;
				$_SESSION['Qid']=$id1;
				$quizID=$_SESSION['pID'];
			}
			
			else
			{
			$_SESSION['Qid']=1;
			$id1=$_SESSION['Qid'];
			if(isset($_POST['quizName'])) $quizID=$_POST['quizName'];
			$_SESSION['pID']=$quizID;
			$_SESSION['attemptedQuestions']=0;
			$_SESSION['rightAnswer']=0;
			$_SESSION['wrongAnswer']=0;
			$_SESSION['actualCorrect']=0;
			$time1= (int)date("i",time());
			$_SESSION['starttime']=$time1;
			
			}
			
			
						
			
			if(isset($quizID))
			{
			
			$dblink=mysql_connect("localhost","root","");
			if(!$dblink) die("could not connect to mysql");
			$myDB="quizzocity";
			mysql_select_db($myDB);
			$total=0;
			$query2=mysql_query("Select question,answer from questions where questionid=$id1 and paperid=$quizID",$dblink);
				
			if($row = mysql_fetch_row($query2))
				{
					$total=$total+1;
                  echo "<br> <b>$row[0] </b><br><br>";
				  $_SESSION['correctAnswer']=$row[1];
				  $query3=mysql_query("Select optionvalue from options where questionid=$id1 and paperid=$quizID",$dblink);
						$x=1;
						 while($roll = mysql_fetch_row($query3))
						 {
						    echo " <input type=radio name='optionValue' value='$x'>$roll[0]</option><br><br> "; 
							$x=$x+1;
						 }

							echo "<input type=submit value='NEXT' class='sub'></input> ";
				}
				else
				{
				$_SESSION['totalQuestions']=$total;
				echo "<font face='Showcard Gothic'><br> Quiz complete<br></font>";
				$time2= (int)date("i",time());
				$_SESSION['endtime']=$time2;
				}	
				mysql_close($dblink);
				}
							
				?>
			
	<div class='dropdown4'>
	<button class='dropbutton4' >
	<a href='http://localhost/project/quiz.php'> PASS QUESTION </a>
	</button>
	</div>

				
<br>
	<div class='dropdown3'>
	<button class='dropbutton3' >
	<a href='http://localhost/project/result.php'> FINISH QUIZ </a>
	</button>
	</div>






</center>
</form>
</body>
</html>