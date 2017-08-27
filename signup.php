<html>
<title>SIGN-UP</title>
<body bgcolor=Purple >
<style>


h1	{
	font-family:Showcard Gothic;
	font-size :68px;
	
}



.formheading{  
    font-family:Showcard Gothic;
    background-color:Grey; 
    border-radius:30px; 	
    color:black;  
    padding:1px;  
    text-align:center;  
} 
.signupform{  
    padding:15px;   
    font-family:Showcard Gothic;
	border-radius:20px;  
    float:right;  
	width:450px;
    margin-top:-20px;  
	margin-right:780px; 
	 background-color:lightblue;
} 
.sub{  
	background-color:	#cd2626;  
	padding: 7px 70px 7px 50px; 
	color:lightsteelblue;  
	font-weight:bold;  
	margin-left:15px;  
	border-radius:5px;  
}
 .box2{ 
 position:absolute; 
 top:150px;
 font-family:Showcard Gothic;
 left:1000px;
 width:300px;
 height:350px;
 border-radius:20px; 
 background-color:lightblue;
 }
</style>
<form action="http://localhost/project/signup.php" method=post>    
<center>
<h1>
QUIZZOCITY<hr>
</h1> 

<div class="signupform" style="border:2px solid green">
<h2 class="formheading">SIGN-UP</h2>
 

FIRST-NAME :      <input type=text name='t1' ></input>  <br> <br>
LAST-NAME :       <input type=text name='t2' ></input>  <br> <br> 
USERNAME :        <input type=text name='t3' ></input>  <br> <br>
PASSWORD :        <input type=password name='t4'></input>  <br><br>
DATE OF BIRTH :   <input type='date' name='d1'></input> <br><br>
MOBILE :          <input type=number name='n1'></input> <br><br>
GENDER :
<input type=radio name='r1' value='MALE'>MALE</input>
<input type=radio name='r1' value='FEMALE'>FEMALE</input>
<input type=radio name='r1' value='OTHERS'>OTHERS</input><br><br>

 COUNTRY :
			 <?php
			$arr=array('Afghanistan','Africa','Australia','Canada','China','England','Finland','Greece','India','Japan','Pakistan','Sri-lanka','Russia');
			echo " <select name='s1'>";
			echo "<option>    </option> ";
			foreach($arr as $i)
			{
			echo "<option value='$i'>$i</option>";
			}
			echo "</select> ";
			?>  
			
<br><br><br>


<input  type=submit class="sub"  value='Create Account'></input> 



					<?php
					if(isset($_POST['t1']))$b=$_POST['t1'];
					if(isset($_POST['t2']))$c=$_POST['t2'];
					if(isset($_POST['t3']))$d=$_POST['t3'];
					if(isset($_POST['t4']))$e=$_POST['t4'];
                    if(isset($_POST['d1']))$f=$_POST['d1'];
					if(isset($_POST['n1']))$g=$_POST['n1'];
					if(isset($_POST['r1']))$h=$_POST['r1'];
					if(isset($_POST['s1']))$i=$_POST['s1'];
					
					
					if(isset($b) && isset($c) && isset($d) && isset($e) && isset($f) && isset($g) && isset($h) && isset($i))
						{
						$dblink=mysql_connect("localhost","root","");
						if(!$dblink) die("could not connect to mysql");
						$myDB="quizzocity";
						mysql_select_db($myDB);
						mysql_query("Insert into signup values('$b','$c','$d','$e','$f',$g,'$h','$i');",$dblink);
						mysql_close($dblink);
						}
					?>

</form>
</div>



  
<div class='box2' align='center' style="border:2px solid green;">
<form action='http://localhost/project/signupgate.php' method=post>
<h2 class="formheading">LOG-IN</h2>
<br>
USERNAME : <input type='text' name='u1' ></input><br><br>
PASSWORD : <input type='password' name='p1' ></input><br><br>
<input type='submit' class='sub' value='Log In'><br><br><br>
Don't have an account ?<br> <a href='http://localhost/project/signup.php'>Sign Up</a>
</form>
</div>



 </center>
 </body>
 </html>