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
<head><title>Subject_Info</title></head>
<body bgcolor=Greenyellow>
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
</style>


<center>
<h1>
QUIZZOCITY<hr>
</h1> 
<div class="signupform" style="border:2px solid green">

<?php                      //insert subject
include("Function.inc");
echo "<form method='post' action='http://localhost/project/subject.php'>";
echo " Subject Name: "."<input type='text' name='subjectname'>";
echo "<input type='submit'value='add' class='sub'><br>";
echo "</form>";

if(isset($_POST['subjectname']))$subject_name=$_POST['subjectname'];
$dblink = mysql_connect("localhost","root","");
if(!$dblink) die("Could't connect to MySQL");
mysql_select_db("quizzocity");

if(isset($subject_name))
{

$flag=check_subject_name($subject_name);
 if($flag==0)
 {
 $n=auto_genrate_id();
 if($n==NULL){$subject_id=1;}
 else {$subject_id=$n+1;}
 $query = "Insert into subject_info values($subject_id,'$subject_name')";
 mysql_query($query,$dblink) or die("Counldn't insert data...."); 
 echo "Sucessfully inserted and subject id is : $subject_id<br>";
 }
 else
 {
  echo " Subject name already exist ";
 }
}
 
mysql_close($dblink);

?>
<br><br>
<?php
echo "<form method='post' action='http://localhost/project/subject.php'>";
echo "Select the ID to delete subject:  ";
$dblink = mysql_connect("localhost","root","");
if(!$dblink) die("Could't connect to MySQL");
mysql_select_db("quizzocity");
$querry3 = mysql_query("Select subject_id from subject_info");
 echo "<select name='id'>";
while($row = mysql_fetch_row($querry3))
 {
 
    foreach($row as $field)
      {
	   print "<option value='$field'>$field </option>";
      }
 }
  echo "</select>";
  echo "<input type='submit' value='Delete' class='sub'>";
echo "</form>";
  
if(isset($_POST['id']))
{
$sub_id=$_POST['id'];
}

if(isset($sub_id))
{
 $query2 = "delete from subject_info where subject_id=$sub_id";
 mysql_query($query2,$dblink) or die("Counldn't delete data....");
 echo " Sucessfully deleted ";
}
mysql_close($dblink);

?>
<br><br>
<?php
echo "<form method='post' action='http://localhost/project/subject.php'>";
echo " Select the ID to update subject name :  ";

$dblink = mysql_connect("localhost","root","");
if(!$dblink) die("Could't connect to MySQL");
mysql_select_db("quizzocity");
$querry3 = mysql_query("Select subject_id from subject_info");
echo "<select name='id2'>";
while($row = mysql_fetch_row($querry3))
 {
  
    foreach($row as $field)
      {
	   print "<option value='$field'>$field </option>";
      }
  }
echo "</select>";  
    echo "<input type='text' name='subject_name'>   <br><br>";
    echo "<input type='submit' value='update' class='sub'>";
echo "</form>";
  if(isset($_POST['subject_name']))$subject_name=$_POST['subject_name'];
  if(isset($_POST['id2']))$id2=$_POST['id2'];
if(isset($id2) && isset($subject_name))
{
 $query4 = " update subject_info set subject_name='$subject_name' where subject_id=$id2";
 mysql_query($query4,$dblink) or die("Counldn't update data....");
 echo " Sucessfully updated ";
} 
mysql_close($dblink);
?>
</div>
</body>
</html>