<?php
session_start();
?>


<?php


// Turn off all error reporting
error_reporting(0);

error_reporting(0);


if(isset($_POST['submit'])){
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = new PDO("mysql:host=localhost;dbname=hms", "root", "");
//$conn = mysql_connect($dbhost, $dbuser, $dbpass);
$id = filter_var($_POST[id], FILTER_SANITIZE_EMAIL);
$diagnosis = filter_var($_POST['diagnosis'], FILTER_SANITIZE_EMAIL);
$medicine = filter_var($_POST['medicine'], FILTER_SANITIZE_EMAIL);
$dose = filter_var($_POST['dose'], FILTER_SANITIZE_EMAIL);
$instructions = filter_var($_POST['instructions'], FILTER_SANITIZE_EMAIL);
//$doc_name = filter_var($_POST['doc_name'], FILTER_SANITIZE_EMAIL);

//$id=$_POST['id'];
//$medicine=$_POST['medicine'];
//$diagnosis=$_POST['diagnosis'];
//$instructions=$_POST['instructions'];
//$doc_name=$_POST['doc_name'];
$doc_name= $_SESSION[user];
//mysql_select_db('hms');
//echo $id;
    if (ctype_digit($id)) 
    {   $sql="SELECT * FROM patients WHERE id = $id";
        $result=$conn->query($sql);
        //$result = mysql_query("SELECT * FROM patients WHERE id = $id");
        $matchFound = /*mysql_num_rows($result) > 0 ?*/ 'TRUE';// : 'FALSE';
        //if(mysql_num_rows($result) > 0)
        //{
            //if (ctype_alpha($doc_name))
            //{


$str="insert into prescription values('$pid','$id','$medicine','$diagnosis','$instructions','$doc_name','$dose')";
$res=$conn->query($str);
//$res=@mysql_query($str)or die(mysql_error());
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$id = $_POST['id']; 
$sql="SELECT * FROM patients WHERE id='$id'";

$retval=$conn->query($sql);
//$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
//while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
while($row = $retval->fetch(PDO::FETCH_ASSOC))
{
	echo "<big><b>PRESCRIPTION : </b></big><br><br><br>";
	echo "DOCTOR NAME : $doc_name<br>"; 
	echo "<b>Patient Details : </b><br>";
    echo "PATIENT ID : {$row['id']}  <br><br> ".
         "NAME 		 : {$row['name']} <br><br> ".
         "AGE		 : {$row['age']} <br><br> ".
         "GENDER	 : {$row['gender']} <br><br> ".
         "MOBILE	 : {$row['mobile']} <br><br> ".
        
         "--------------------------------<br>";
} 
echo "MEDICINE : $medicine <br><br>";
        if($dose==1)
        {echo "DOSE : morning<br><br>";}
	 elseif($dose==2)
        {echo "DOSE : afternoon<br><br>";}
	 elseif($dose==5)
        {echo "DOSE : evining<br><br>";}
    elseif($dose==3)
        {echo "DOSE : morning and afternoon<br><br>";}
	 elseif($dose==6)
        {echo "DOSE : morning and evining<br><br>";}
        elseif($dose==7)
        {echo "DOSE : afternoon and evining <br><br>";}
	 elseif($dose==8)
        {echo "DOSE : morning, afternoon and evining<br><br>";}
    else{echo "";}
    
	echo "DIAGNOSIS : $diagnosis <br><br>".	
	 "ADDITIONAL INSTRUCTIONS : $instructions <br><br>".
	     "--------------------------------<br>";	
$conn=null;
//mysql_close($conn);


            //}   else{   echo 'Enter valid name';}
        //}
        //else {  echo 'No such patient exists';}
    }
    else {echo 'Enter valid id';}
}
?>
<html>
<br><br>
<input type="button" onClick="window.print();" value="Print Prescription"/><br><br>
<a href="home.html"><b>HOME</b></a>
</html>
