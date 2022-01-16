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
$sql = 'SELECT * from patients';

//mysql_select_db('hms');
$retval = $conn->query( $sql );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

    echo "<table border=1 width:='50%'>
    <tbody>
      <tr>
        <th>PATIENT ID</th>
        <th>NAME</th>
        <th>AGE</th>
        <th>GENDER</th>
        <th>OCCUPATION</th>
        <th>MOBILE</th>
        <th>ADDRESS</th>
      </tr>  
        ";
 while($row = $retval->fetch(PDO::FETCH_ASSOC))
    {
        
     echo" 
      <tr>
        <td>{$row['id']}<br>
        </td>
      
        <td>{$row['name']}<br>
        </td>
     
        <td>{$row['age']}<br>
        </td>
     
        <td>{$row['gender']}<br>
        </td>
     
        <td>{$row['occupation']}<br>
        </td>
      
        <td>{$row['mobile']}<br>
        </td>
      
        <td>{$row['address']}<br>
        </td>
      </tr>
      
";}
" 
      </tbody>
  </table><br><br>
  ";
  
      
         

$conn=null;

 echo "<br><a href='home.html'>Home</a><br>";
?>
