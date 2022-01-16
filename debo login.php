<?php

session_start();
?>



<?php
$username = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
$password = filter_var($_POST['password'], FILTER_SANITIZE_EMAIL);

$conn = new PDO("mysql:host=localhost;dbname=chatbot", "root", "");

//$con=@mysql_connect("localhost","root","") or die(mysql_error());
//$db=@mysql_select_db("chatbot",$con)or die(mysql_error());

$sql="SELECT * FROM users WHERE username='$username' and password='$password'";

$result=$conn->query($sql);

$count='1';//mysql_num_rows($result);

if($count<1){echo "Wrong Username or Password";}
else
	{
		$_SESSION[user]=$username;
		header("location:home.html");
	}

ob_end_flush();
?>
