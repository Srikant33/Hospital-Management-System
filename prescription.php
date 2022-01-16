<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
  <title></title>
  
</head>
<body style="background-image: url(image1.jpg);">
<br>

<br>

<form method="post" action="generateprescription.php"><big><big>PRESCRIPTION :<br>
  <br>
  </big></big>
  <table width:="50%">
    <tbody>
      <tr>
        <td>Patient ID : <br>
        </td>
        <td>
        
        
        
        

        
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
//$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
echo "<select name='id'>";

while($row = $retval->fetch(PDO::FETCH_ASSOC))
{
echo "<option value={$row['id']} > {$row['id']}. {$row['name']} </option>";
      
         
} 
echo "</select>";
?>



 
 
 
        </td>
      </tr>
      <tr>
        <td>Medicine : <br>
        </td>
        <td><textarea cols="30" rows="3"  name="medicine"></textarea><br>
        </td>
      </tr>
      <tr>
        <td>Dosage : <br>
        </td>
        <td>
		<input name="dose" type="checkbox" value='1'> Morning<br>
        <input name="dose" type="checkbox" value='2'> Afternoon<br>
        <input name="dose" type="checkbox" value='5'> Night<br>
        </td>
      </tr>
      <tr>
        <td>Diagnosis :<br>
        </td>
        <td><textarea cols="30" rows="3" name="diagnosis"></textarea><br>
        </td>
      </tr>
      <tr>
        <td>Additional Instructions :<br>
        </td>
        <td><textarea cols="30" rows="3" name="instructions"></textarea> </td>
      </tr>
    </tbody>
  </table>
  <br>
  <br>
  <input name="submit" value="Generate Prescription" type="submit">&nbsp; &nbsp; <input name="reset" value="RESET" type="reset"> <big><big><br>
  </big></big></form>

</body>
</html>
