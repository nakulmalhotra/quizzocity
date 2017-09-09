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
<body bgcolor=Salmon>
<style>

h1	{
	font-family:Showcard Gothic;
	font-size :68px;
}
.sub{  
	background-color:	#cd2626;  
	padding: 9px 40px 9px 40px; 
	color:lightsteelblue;  
	font-weight:bold;  
	margin-left:10px;  
	border-radius:5px;  
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
<center>
<h1>
QUIZZOCITY<hr>
</h1> 
<form action='http://localhost/project/testpaper.php' method=post>




<br><br>
<div class="signupform" style="border:2px solid green">


			<?php
			$x=1;
			
			$dblink=mysql_connect("localhost","root","");
			if(!$dblink) die("could not connect to mysql");
			$myDB="quizzocity";
			mysql_select_db($myDB);
			$roll=mysql_query("Select paperid from testpaper;");
			echo " PAPER ID - ";
			$tot=mysql_num_rows($roll);
			if($tot==0)
			{
			echo " 1 <br>";
			}
			else
			{
			    $x=$tot+1;
			   echo "$x<br>";
			}
             	mysql_close($dblink);
				
			
			$_SESSION['pid']=$x;
				
			?>
<br><br>


				   PAPER-NAME :


			<input type=text name='t5'></input>

<br><br>

					  <?php
		              $dt= date("j  F Y - g :i a",time());
                      $t[]=strtok($dt,"-");
	                  $t[]=strtok("-");
                     echo " DATE OF CREATION - $t[0] <br><br> TIME OF CREATION - $t[1] ";
                    ?>					



<br><br>



			<?php
			$dblink=mysql_connect("localhost","root","");
			if(!$dblink) die("could not connect to mysql");
			$myDB="quizzocity";
			mysql_select_db($myDB);
			$roll=mysql_query("Select subject_id from subject_info;");
			echo " SUBJECT ID - ";
			echo "<select name='s2'> ";
			echo " <option>    </option> ";
			while($row = mysql_fetch_row($roll))
			{
			foreach($row as $i)
			{
			echo "<option value='$i'>$i</option> ";
			}
			}
			echo "</select><br>";
			mysql_close($dblink);
			?>
			
			
			
<br>		
			
			
			
				LEVEL - 
			<select name='s1'> ";
			<option>    </option>
			<option value=Easy>Easy</option>
			<option value=Medium>Medium</option>
			<option value=Difficult>Difficult</option>
			</select>
			<br>
			
			
				  <?php
	        if(isset($_POST['t5'])) $g=$_POST['t5'];
	        if(isset($_POST['s1'])) $h=$_POST['s1'];
	        if(isset($_POST['s2'])) $f=$_POST['s2'];
	        
			
			 if(isset($g) && isset($h) && isset($f))
			{
			$dblink=mysql_connect("localhost","root","");
			if(!$dblink) die("could not connect to mysql");
			$myDB="quizzocity";
			mysql_select_db($myDB);
			mysql_query("Insert into testpaper(paperid,papername,dateoc,timeoc,subject_id,level) values($x,'$g','$t[0]','$t[1]','$f','$h')",$dblink);
				
			mysql_close($dblink);
			}		
			
			?>
				
				
			
			
<br><br>
<input type=submit class='sub' value='INSERT INTO DATABASE'></input>
<br><br>
<a href="http://localhost/project/questions.php">CREATE QUIZ </a>
</div>

</form>

<div class='dropdown2'>
	<button class='dropbutton2' >
	<a href='http://localhost/project/logout.php'>LOGOUT</a>
	</button>
	</div>



</center>
</body>
</html>