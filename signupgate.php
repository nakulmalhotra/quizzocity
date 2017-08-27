<?php
if(isset($_POST['u1']))$uu=$_POST['u1'];
if(isset($_POST['p1']))$pp=$_POST['p1'];
if(isset($uu) && isset($pp))
{
			if($uu=='H4Ck3R' && $pp=='Nakul@1607')
			{
			session_start();
			$_SESSION['r']="NIMIT";
			$_SESSION['username']=$uu;
			header("Location:http://localhost/project/mygate.php");
			break;
			}
			else
			{
		$dblink=mysql_connect("localhost","root","");
		if(!$dblink) die("could not connect to mysql");
		$myDB="quizzocity";
		mysql_select_db($myDB);
		$roll=mysql_query("Select username,password from signup",$dblink);
	while($row = mysql_fetch_row($roll))
	{       
			if($uu==$row[0] && $pp==$row[1])
			{
			$ok=1;
			break;
			}
			else
			{
			$ok=0;
			}
			mysql_close($dblink);
	}
	}
	
	        if($ok==1)
			{
				
				session_start();
				$_SESSION['r']="NIMIT";
				$_SESSION['username']=$uu;
							
			  header("Location:http://localhost/project/profile.php");
			}
			else
			{
			header("Location:http://localhost/project/signup.php");
			}
	}
	
	
?>