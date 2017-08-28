<?php
 function check_subject_name($subject_name)
 {
 $dblink = mysql_connect("localhost","root","");
 if(!$dblink) die("Could't connect to MySQL");
 mysql_select_db("quizzocity");
 
 
 $sub_name=mysql_query("select * from subject_info where subject_name='$subject_name'");
 $totRows = mysql_num_rows($sub_name);
 if($totRows==0) return 0;
 else return 1;
  
mysql_close($dblink);
}
 function auto_genrate_id()
 {
 $dblink = mysql_connect("localhost","root","");
 if(!$dblink) die("Could't connect to MySQL");
 mysql_select_db("quizzocity");
 
 $query=mysql_query("select max(subject_id) from subject_info",$dblink);
 $row=mysql_fetch_row($query);
 $max_id=$row[0];
 return $max_id;
    
 mysql_close($dblink);
 }
?>