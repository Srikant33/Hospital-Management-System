<?php
session_start()
?>

<?php

// Turn off all error reporting
error_reporting(0);


$id;
//$id=$_POST['id'];
$name = filter_var($_POST['name'], FILTER_SANITIZE_EMAIL);
$age = filter_var($_POST['age'], FILTER_SANITIZE_EMAIL);
$gender = filter_var($_POST['gender'], FILTER_SANITIZE_EMAIL);
$occupation = filter_var($_POST['occupation'], FILTER_SANITIZE_EMAIL);
$mobile = filter_var($_POST['mobile'], FILTER_SANITIZE_EMAIL);
$address = filter_var($_POST['address'], FILTER_SANITIZE_EMAIL);

//$name=$_POST['name'];
//$age=$_POST['age'];
//$gender=$_POST['gender'];
//$occupation=$_POST['occupation'];
//$mobile=$_POST['mobile'];
//$address=$_POST['address'];

if ($gender=='m'|$gender=='f')
{   
    if (ctype_digit($age)) 
    {   
        if (ctype_digit($mobile)) 
        {
        
$con = new PDO("mysql:host=localhost;dbname=hms", "root", "");
//$con=@mysql_connect("localhost","root","") or die(mysql_error());
//$db=@mysql_select_db("hms",$con)or die(mysql_error());
$str="insert into patients values('$id','$name','$age','$gender','$occupation','$mobile','$address')";
$res=$con->query($str);
//$res=@mysql_query($str)or die(mysql_error());
if($res>=0)
{
echo'<br><br><b>Patient added !!<br>';
}
            
        }
        else
        {   echo ' Enter valid phone number';}
    }
    
    else 
    {   echo 'Enter valid age';}
}

else 
{   echo 'Enter valid gender';}
?>
<html>
<body style="background-image:url(image1.jpg)"><br><br>
<a href="addnewpatient.html"><br> Add Patient </b></a>
<br><br>

<a href="home.html"><b>Click here to return to the home page</b></a>
</body></html>
