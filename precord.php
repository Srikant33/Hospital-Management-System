<?php
$aid = filter_var($_POST['aid'], FILTER_SANITIZE_EMAIL);

//$aid=$_POST['aid'];
if($aid=='0000')
{   $id = filter_var($_POST['id'], FILTER_SANITIZE_EMAIL);
//$id=$_POST['id'];
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
$sql = "SELECT * from patients where id='$id'";

$retval = $conn->query( $sql );
//$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
echo 'Patient details';
//while($row = mysql_fetch_array($retval, MYSQL_ASSOC))

while($row = $retval->fetch(PDO::FETCH_ASSOC))
{
    echo "<br><table border=1 width:='50%'>
    <tbody>
      <tr>
        <td>PATIENT ID <br>
        </td>
        <td>{$row['id']}<br>
        </td>
      </tr>
      <tr>
        <td>NAME <br>
        </td>
        <td>{$row['name']}<br>
        </td>
      </tr><tr>
        <td>AGE<br>
        </td>
        <td>{$row['age']}<br>
        </td>
      </tr><tr>
        <td>GENDER <br>
        </td>
        <td>{$row['gender']}<br>
        </td>
      </tr>
      <tr>
        <td>OCCUPATION <br>
        </td>
        <td>{$row['occupation']}<br>
        </td>
      </tr>
      <tr>
        <td>MOBILE <br>
        </td>
        <td>{$row['mobile']}<br>
        </td>
      </tr>
      <tr>
        <td>ADDRESS <br>
        </td>
        <td>{$row['address']}<br>
        </td>
      </tr>
      </tbody>
  </table><br><br>";
      
         
} 

$i = filter_var($_POST['id'], FILTER_SANITIZE_EMAIL);

//$i=$_POST['id'];

echo 'Prescriptions received till date';
$sql = "SELECT * FROM prescription WHERE id= '$id'" ;

//$retval = mysql_query( $sql, $conn );
$retval = $conn->query( $sql );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

    echo "<table border=1 width:='50%'>
    <tbody>
      <tr>
        <th>PRISCRIPTION ID</th>
        <th>MEDICINE</th>
        <th>DOSAGE</th>
        <th>DIAGNOSIS</th>
        <th>INSTRUCTIONS</th>
        <th>DOCTOR NAME</th>
      
      </tr>  
        ";
 //while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
   while($row = $retval->fetch(PDO::FETCH_ASSOC))
    {
        
     echo" 
      <tr>
        <td>{$row['pid']}<br>
        </td>
      
        <td>{$row['medicine']}<br>
        </td>
     
        <td>{$row['dose']}<br>
        </td>
        
        <td>{$row['diagnosis']}<br>
        </td>
     
        <td>{$row['instructions']}<br>
        </td>
     
        <td>{$row['doc_name']}<br>
        </td>
      
      </tr>
      
";}
" 
      </tbody>
  </table><br><br>
  ";




$conn=null;
//mysql_close($conn);
}
else
{   
    echo 'You are not authorised to view';
}
?>
<html>
<br><br>
<a href="home.html"><b>Click here to return to the main page</b></a>
</html>
