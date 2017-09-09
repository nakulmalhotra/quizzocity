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

<?php
if(isset($_POST['optionValue'])) $a=$_POST['optionValue'];
if(isset($_SESSION['Qid'])) $id=$_SESSION['Qid'];
if(isset($_SESSION['pID'])) $quizID=$_SESSION['pID'];
if(isset($_SESSION['rightAnswer'])) $r=$_SESSION['rightAnswer'];
if(isset($_SESSION['wrongAnswer'])) $w=$_SESSION['wrongAnswer'];
if(isset($_SESSION['attemptedQuestions'])) $aq=$_SESSION['attemptedQuestions'];
if(isset($_SESSION['correctAnswer'])) $correct=$_SESSION['correctAnswer'];

if(isset($a) && isset($id) && isset($quizID) && isset($correct) && isset($r) && isset($w) && isset($aq))
{
    $aq=$aq+1;
	$_SESSION['attemptedQuestions']=$aq;
	
           if($a==$correct)
		   {
				$r=$r+1;
				$_SESSION['rightAnswer']=$r;
		   }
           else
		   {
				$w=$w+1;
				$_SESSION['wrongAnswer']=$w;
		   }
		   
header("Location:http://localhost/project/quiz.php");	
	   
}









?>