<?php
?>

<html>
<body>
<?php   
        $dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = new PDO("mysql:host=localhost;dbname=hms", "root", "");

//$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}


//mysql_select_db('hms');
$sql = "SELECT * from patients";

$retval = $conn->query( $sql );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
echo "<select>";
 while($row = $retval->fetch(PDO::FETCH_ASSOC))
{
    echo "<option value={$row['id']}> {$row['id']} </option>";
      
         
} 
echo "</select>";

$conn=null;
?>
<br><br>
<br><br>  

</body>
</html>
