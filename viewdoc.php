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
$sql = 'SELECT * from users';

//mysql_select_db('hms');
$retval = $conn->query( $sql );
//$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
//while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
while($row = $retval->fetch(PDO::FETCH_ASSOC))
{
    echo "<table border=1 width:='50%'>
    <tbody>
      <tr>
        <td>Doctor Name <br>
        </td>
        <td>{$row['username']}<br>
        </td>
      </tr>
      
           
      </tbody>
  </table><br><br>";
      
         
} 
$conn=null;
//mysql_close($conn);
?>
