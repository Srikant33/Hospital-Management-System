<?php

session_start();
?>



<?php
$username = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
$password = filter_var($_POST['password'], FILTER_SANITIZE_EMAIL);

//$conn = new PDO("oci:host=localhost'oracle.cise.ufl.edu';dbname=orcl", "k.iyer", "1TS21P4FGtVtklUwNW9h96DX");



$mydb="oracle.cise.ufl.edu:1521:orcl";
//$mydb=
//	"(DESCRIPTION =
//       (ADDRESS = (PROTOCOL = TCP)(HOST = oracle.cise.ufl.edu)(PORT = 1521))
//       (CONNECT_DATA =
//         (SERVER = DEDICATED)
//         (SERVICE_NAME = ORCL)
//       )
//     )";

  $conn_username = "k.iyer";
  $conn_password = "1TS21P4FGtVtklUwNW9h96DX";

  $opt = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM,

];

  try{
      $conn = new PDO("oci:dbname=".$mydb, $conn_username, $conn_password, $opt);
  }catch(PDOException $e){
      echo ($e->getMessage());
}




//$con=@mysql_connect("localhost","root","") or die(mysql_error());
//$db=@mysql_select_db("hms",$con)or die(mysql_error());

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
