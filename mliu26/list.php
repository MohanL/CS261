<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
//$table = $_GET['table'];
//$attribute = $_GET['attribute'];
//$value = $_GET['value'];
$table ='STAFF' ;
$attribute = 'Staff_Id';
if(isset($_GET['value']))
{
	$value = $_GET['value'];
	if(($value < 2001) || ($value > 2999))
	{	
		$value = 'Staff_Id';
		echo 'input invalid, output everything';
	}
}
else	// do the thing
{
	?>
	<form action = "list.php">
	<label>PLEASE ENTER VALID ID between 2000 to 3000</label>
	</form>
	<?php
}
?>
<title>List Page</title>
</head>
<link rel="stylesheet" type="text/css" href="staff.css">
   <body>
	<h2>List</h2>
<FORM NAME ="form1" METHOD =" " ACTION = "">

<INPUT TYPE = "TEXT" VALUE ="Staff_Id" NAME = "value">
<INPUT TYPE = "Submit" Name = "Submit1" VALUE = "search">
</FORM>

<br>

<FORM METHOD ="link" ACTION = "http://betaweb.csug.rochester.edu/~mliu26/CS261/mliu26/insertion.php">
Click here to the Insertion Page
<INPUT TYPE = "Submit" Name = "Insert" VALUE = "Insert">
</FORM>

<br>
<FORM METHOD ="link" ACTION = "http://betaweb.csug.rochester.edu/~mliu26/CS261/mliu26/deletion.php">
Click here to the Deletion Page
<INPUT TYPE = "Submit" Name = "Delete" VALUE = "Delete">
</FORM>
<?php
// connect to the database 
$dbtype = 'mysql';
$dbuser = 'mliu26';
$dbpass = 'xxxxx';
$dbname = 'test';
$dbhost = 'localhost';
$dsn = "$dbtype:host=$dbhost;dbname=$dbname";

try {
    $db = new PDO($dsn, $dbuser, $dbpass);
}
catch (PDOException $e) {
    print "DB Connection Error!: " . $e->getMessage();
    die();
}
// print out information about the query
echo '<p>', 'Query pull (mliu26) as of ', date("Y-m-d H:i:s"), '</p>';
// print out format 
echo '<table border ="1">';
echo '<tr>',
	    '<th>Staff_Id</th>',
	    '<th>First_Name</th>',
	    '<th>Last_Name</th>',
	    '<th>Gender</th>',
	    '<th>SSN</th>',
	    '<th>Home_phone</th>',
	    '<th>Mobile_Phone</th>',
	    '<th>Email</th>',
	    '<th>Department_Id</th>',
	    '<th>Position_Id</th>',
	    '<th>Position_Title</th>',
	    '<th> show</th>',
      "</tr>\n";

// sql query formation
echo "Query Generated:";
$sql = "select * from $table where $attribute = $value";
echo PHP_EOL;
echo $sql;
$stmt = $db->query( $sql );


// print out 
foreach($stmt->fetchAll() as $row) {
$Staff_Id = $row['Staff_Id'];
$First_Name = $row['First_Name'];
$Last_Name = $row['Last_Name'];
$Gender = $row['Gender'];
$SSN = $row['SSN'];
$Home_Phone = $row['Home_Phone'];
$Mobile_Phone = $row['Mobile_Phone'];
$Email = $row['Email'];
$Department_Id = $row['Department_Id'];
$Position_Id = $row['Position_Id'];
$Position_Title = $row['Position_Title'];
$link = 'show';
echo '<tr>';
// make the entry listing the team span across n+1 rows, where n = size of the team
echo "<td class='firstrow'>$Staff_Id</td>";
echo "<td class='firstrow'>$First_Name</td>";
echo "<td class='firstrow'>$Last_Name</td>";
echo "<td class='firstrow'>$Gender</td>";
echo "<td class='firstrow'>$SSN</td>";
echo "<td class='firstrow'>$Home_Phone</td>";
echo "<td class='firstrow'>$Mobile_Phone</td>";
echo "<td class='firstrow'>$Email</td>";
echo "<td class='firstrow'>$Department_Id</td>";
echo "<td class='firstrow'>$Position_Id</td>";
echo "<td class='firstrow'>$Position_Title</td>"; 
echo "<td class='firstrow'><a href='show.php?value=$Staff_Id'>$link</a>
</div>
</td>";
echo "</tr>\n"; 
}              
echo '</table>';
?>
    </body>
</html>   
