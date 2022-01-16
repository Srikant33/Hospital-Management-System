<?php
error_reporting(0);
$id = filter_var($_POST['id'], FILTER_SANITIZE_EMAIL);

//$id=$_POST['id'];
if($id=='0000')
{
$username = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
$password = filter_var($_POST['password'], FILTER_SANITIZE_EMAIL);
    
//$username=$_POST['username'];
//$password=$_POST['password'];
$con = new PDO("oci:host=localhost'oracle.cise.ufl.edu';dbname=orcl", "k.iyer", "1TS21P4FGtVtklUwNW9h96DX");
//$con=@mysql_connect("localhost","root","") or die(mysql_error());
//$db=@mysql_select_db("hms",$con)or die(mysql_error());
$str="insert into users values('$username','$password')";
$res =$con->query($str);
//$res=@mysql_query($str)or die(mysql_error());
if($res>=0)
{
echo'<br><br><b>Thank you for registeration !! <br>';
}
}
else
{   
    echo'<br>You are not authorised to register <br>';
}
?>
<html>
<br><br><br><br>
<a href="index.html"><b>Click here to return to the main page</b></a>
</html>
