<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
$table ='PATIENT' ;
?>
<title>Deletion Page</title>
</head>

   <body>
	<h2>Deletion</h2>
<!-- Insertion code -->
<FORM NAME = "form2" METHOD =" " ACTION = "">
<INPUT TYPE = "TEXT" VALUE ="Patient_Id" NAME = "PI">
<INPUT TYPE = "Submit" Name = "Delete" VALUE = "Delete">
</FORM>
<!-- Insertion code -->

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
echo '<p>', 'Query pull (yyu27) as of ', date("Y-m-d H:i:s"), '</p>';
// print out format 
echo '<table border ="1">';
echo '<tr>',
	     '<th>Patient_Id</th>',
	    '<th>First_Name</th>',
	    '<th>Last_Name</th>',
	    '<th>Gender</th>',
	    '<th>Home_Phone</th>',
	    '<th>Cell_Phone</th>',
	    '<th>Emerg_Contact</th>',
	    '<th>Birthday</th>',
	    '<th>Allergies</th>',
	    '<th>Surgical_History</th>',
  	    '<th>Visit_Date</th>',
	    '<th>Staff_Id</th>',
	    '<th>Insurance</th>',
	    '<th>Med_Id</th>',
	    '<th>Reason</th>',
	    '<th> show</th>',
      "</tr>\n";
//******************************************************insertion code
echo nl2br("\nInsertion Query Generated:");
if(!isset($_GET['PI']) )
{
	if (!isset($_GET['PI'])) echo nl2br("\nERROR : need Patient_Id");
	echo nl2br("\nERROR : Deletion incomplete");
}
else
{
//**************************************
// insertion into STAFF
$IDI = $_GET['PI'];
//****************************************
	
	if($IDI != 'Patient_Id')
	// change to deletion 
{	$sql2 = "delete from $table where Patient_Id = $IDI";
	echo PHP_EOL;
	echo $sql2;
	$count = $db->exec($sql2);
	/* Return number of rows that were deleted */
	print("\nDelete $count rows.\n");
}
}
//******************************************************insertion code
// print out 
$sql = "select * From $table";
$stmt = $db->query($sql);
foreach($stmt->fetchAll() as $row) {
$Patient_Id = $row['Patient_Id'];
$First_Name = $row['First_Name'];
$Last_Name = $row['Last_Name'];
$Gender = $row['Gender'];
$Home_Phone = $row['Home_Phone'];
$Cell_Phone = $row['Cell_Phone'];
$Emerg_Contact = $row['Emerg_Contact'];
$Birthday = $row['Birthday'];
$Allergies = $row['Allergies'];
$Surgical_History = $row['Surgical_History'];
$Visit_Date = $row['Visit_Date'];
$Staff_Id = $row['Staff_Id'];
$Insurance = $row['Insurance'];
$Med_Id = $row['Med_Id'];
$Reason = $row['Reason'];
$link = 'show';
echo '<tr>';
// make the entry listing the team span across n+1 rows, where n = size of the team
echo "<td class='firstrow'>$Patient_Id</td>";
echo "<td class='firstrow'>$First_Name</td>";
echo "<td class='firstrow'>$Last_Name</td>";
echo "<td class='firstrow'>$Gender</td>";
echo "<td class='firstrow'>$Home_Phone</td>";
echo "<td class='firstrow'>$Cell_Phone</td>";
echo "<td class='firstrow'>$Emerg_Contact</td>";
echo "<td class='firstrow'>$Birthday</td>";
echo "<td class='firstrow'>$Allergies</td>";
echo "<td class='firstrow'>$Surgical_History</td>";
echo "<td class='firstrow'>$Visit_Date</td>"; 
echo "<td class='firstrow'>$Staff_Id</td>"; 
echo "<td class='firstrow'>$Insurance</td>"; 
echo "<td class='firstrow'>$Med_Id</td>"; 
echo "<td class='firstrow'>$Reason</td>"; 
echo "<td class='firstrow'><a href='list_supplementary.php?value=$Patient_Id'>$link</a>
</div>
</td>";
echo "</tr>\n"; 
}              
echo '</table>';

?>
    </body>
</html>   
