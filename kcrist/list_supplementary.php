<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
//$table = $_GET['table'];
//$attribute = $_GET['attribute'];
//$value = $_GET['value'];
$table ='MEDICATION' ;
$attribute = 'Med_Id';
$value = $_GET['value'];
// type this in the browser : http://betaweb.csug.rochester.edu/~mliu26/show.php?value=200X

?>
<title>show Page</title>
</head>

   <body>
	<h2>Show</h2>
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
echo '<p>', 'Query pull (kcrist) as of ', date("Y-m-d H:i:s"), '</p>';
// print out format 
echo '<table border = "1">';
echo '<tr>',
	    '<th>Med_Id</th>',
	    '<th>Name</th>',
	    '<th>Manf</th>',
	    '<th>Contents</th>',
	    '<th>Effects</th>',
	    '<th>Dosage</th>',
	    '<th>Side_Effects</th>',
	    '<th>Schedule</th>',
	    '<th>Description</th>',
	    '<th>Cost</th>',
      "</tr>\n";

// sql query formation
echo "Query Generated:";
$sql = "select * from $table where $attribute = $value";
echo PHP_EOL;
echo $sql;
$stmt = $db->query( $sql );

// print out 
foreach($stmt->fetchAll() as $row) {
$Med_Id= $row['Med_Id'];
$Name= $row['Name'];
$Manf= $row['Manf'];
$Contents= $row['Contents'];
$Effects= $row['Effects'];
$Dosage= $row['Dosage'];
$Side_Effects= $row['Side_Effects'];
$Schedule= $row['Schedule'];
$Description= $row['Description'];
$Cost= $row['Cost'];
echo '<tr>';
// make the entry listing the team span across n+1 rows, where n = size of the team
echo "<td class='firstrow'>$Med_Id</td>";
echo "<td class='firstrow'>$Name</td>";
echo "<td class='firstrow'>$Manf</td>";
echo "<td class='firstrow'>$Contents</td>";
echo "<td class='firstrow'>$Effects</td>";
echo "<td class='firstrow'>$Dosage</td>";
echo "<td class='firstrow'>$Side_Effects</td>";
echo "<td class='firstrow'>$Schedule</td>";
echo "<td class='firstrow'>$Description</td>";
echo "<td class='firstrow'>$Cost</div></td>";
echo "</tr>\n"; 
}              
echo '</table>';

// second table 
echo '<br>';
echo '<br>';

echo '<table border = "1">';
echo '<tr>',
	    '<th>Patient_Id</th>',
	    '<th>First_Name</th>',
	    '<th>Last_Name</th>',
	    '<th>Gender</th>',
	    '<th>Allergies</th>',
	    '<th>Reason</th>',
	    '<th>Med_Id</th>',
      "</tr>\n";

// sql query formation
echo "Query Generated:";
$sql = "select * from PATIENT  where Med_Id = $Med_Id";
echo PHP_EOL;
echo $sql;
$stmt = $db->query( $sql );


// print out 
foreach($stmt->fetchAll() as $row) {
$Patient_Id = $row['Patient_Id'];
$First_Name = $row['First_Name'];
$Last_Name = $row['Last_Name'];
$Gender= $row['Gender'];
$Allergies= $row['Allergies'];
$Reason= $row['Reason'];
$Med_Id= $row['Med_Id'];
echo '<tr>';
// make the entry listing the team span across n+1 rows, where n = size of the team
echo "<td class='firstrow'>$Patient_Id</td>";
echo "<td class='firstrow'>$First_Name</td>";
echo "<td class='firstrow'>$Last_Name</td>";
echo "<td class='firstrow'>$Gender</td>";
echo "<td class='firstrow'>$Allergies</td>";
echo "<td class='firstrow'>$Reason</td>";
echo "<td class='firstrow'>$Med_Id</td>";
echo "</tr>\n"; 
}              
echo '</table>';

//echo '<br>'

echo '<br>';
echo '<table border = "1">';
echo '<tr>',
	    '<th>Diag_Id</th>',
	    '<th>Diag_Details</th>',
	    '<th>Patient_Id</th>',
	    '<th>Patient_FName</th>',
	    '<th>Patient_LName</th>',
	    '<th>Staff_Id</th>',
	    '<th>Remark</th>',
      "</tr>\n";

// sql query formation
echo "Query Generated:";
$sql = "select * from DIAGNOSIS where Med_id = $Med_Id";
echo PHP_EOL;
echo $sql;
$stmt = $db->query( $sql );


// print out 
foreach($stmt->fetchAll() as $row) {
$Diag_Id= $row['Diag_Id'];
$Diag_Details= $row['Diag_Details'];
$Patient_Id= $row['Patient_Id'];
$Patient_FName= $row['Patient_FName'];
$Patient_LName= $row['Patient_LName'];
$Staff_Id= $row['Staff_Id'];
$Remark= $row['Remark'];
echo '<tr>';
// make the entry listing the team span across n+1 rows, where n = size of the team
echo "<td class='firstrow'>$Diag_Id</td>";
echo "<td class='firstrow'>$Diag_Details</td>";
echo "<td class='firstrow'>$Patient_Id</td>";
echo "<td class='firstrow'>$Patient_FName</td>";
echo "<td class='firstrow'>$Patient_LName</td>";
echo "<td class='firstrow'>$Staff_Id</td>";
echo "<td class='firstrow'>$Remark</td>";
echo "</tr>\n"; 
}              
echo '</table>';

echo '<br>';

echo "This is about Medication: $Name";
?>
    </body>
</html>   
