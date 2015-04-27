<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
//$table = $_GET['table'];
//$attribute = $_GET['attribute'];
//$value = $_GET['value'];
$table ='DIAGNOSIS' ;
$attribute = 'Diag_Id';
if(isset($_GET['value']))
{
	$value = $_GET['value'];
	if(($value < 4001) || ($value > 4999))
	{	
		$value = 'Diag_Id';
		echo 'input invalid, output everything';
	}
}
else	// do the thing
{
	?>
	<form action = "list.php">
	<label>PLEASE ENTER VALID ID between 4000 to 5000</label>
	</form>
	<?php
}
?>
<title>List Page</title>
</head>

   <body>
	<h2>list</h2>
<FORM NAME ="form1" METHOD =" " ACTION = "">
<INPUT TYPE = "TEXT" VALUE ="Diag_Id" NAME = "value">
<INPUT TYPE = "Submit" Name = "Submit1" VALUE = "search">
</FORM>

<FORM METHOD ="link" ACTION = "http://betaweb.csug.rochester.edu/~mliu26/CS261/ssun10/insertion.php">
<INPUT TYPE = "Submit" Name = "Insert" VALUE = "Insert">
</FORM>

<FORM METHOD ="link" ACTION = "http://betaweb.csug.rochester.edu/~mliu26/CS261/ssun10/deletion.php">
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
echo '<p>', 'Query pull (ssun10) as of ', date("Y-m-d H:i:s"), '</p>';
// print out format 
echo '<table border ="1">';
echo '<tr>',
	    '<th>Diag_Id</th>',
	    '<th>Patient_FName</th>',
	    '<th>Patient_LName</th>',
	    '<th>Patient_Id</th>',
	    '<th>Staff_Id</th>',
	    '<th>Diag_Details</th>',
	    '<th>Severity</th>',
	    '<th>Diag_Date</th>',
	    '<th>Med_Id</th>',
	    '<th>Remark</th>',
	    '<th>Second_Diag_Date</th>',
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
$Diag_Id = $row['Diag_Id'];
$Patient_FName= $row['Patient_FName'];
$Patient_LName= $row['Patient_LName'];
$Patient_Id= $row['Patient_Id'];
$Staff_Id= $row['Staff_Id'];
$Diag_Details= $row['Diag_Details'];
$Severity= $row['Severity'];
$Diag_Date= $row['Diag_Date'];
$Med_id= $row['Med_id'];
$Remark= $row['Remark'];
$Second_Diag_Date = $row['Second_Diag_Date'];
$link = 'show';
echo '<tr>';
// make the entry listing the team span across n+1 rows, where n = size of the team
echo "<td class='firstrow'>$Diag_Id</td>";
echo "<td class='firstrow'>$Patient_FName</td>";
echo "<td class='firstrow'>$Patient_LName</td>";
echo "<td class='firstrow'>$Patient_Id</td>";
echo "<td class='firstrow'>$Staff_Id</td>";
echo "<td class='firstrow'>$Diag_Details</td>";
echo "<td class='firstrow'>$Severity</td>";
echo "<td class='firstrow'>$Diag_Date</td>";
echo "<td class='firstrow'>$Med_id</td>";
echo "<td class='firstrow'>$Remark</td>";
echo "<td class='firstrow'>$Second_Diag_Date</td>";
echo "<td class='firstrow'><a href='list_supplementary.php?value=$Diag_Id'>$link</a>
</div>
</td>";
echo "</tr>\n"; 
}              
echo '</table>';
?>
    </body>
</html>   
