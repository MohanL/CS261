<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
//$table = $_GET['table'];
//$attribute = $_GET['attribute'];
//$value = $_GET['value'];
$table ='PATIENT' ;
$attribute = 'Patient_Id';
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
echo '<p>', 'Query pull (yy27) as of ', date("Y-m-d H:i:s"), '</p>';
// print out format 
// sql query formation
echo "Query Generated:";
$sql = "select * from $table where Patient_Id= $value";
echo PHP_EOL;
echo $sql;
$stmt = $db->query( $sql );

//***********************************************************************
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
      "</tr>\n";



// print out 
foreach($stmt->fetchAll() as $row) {
$Patient_Id= $row['Patient_Id'];
$First_Name= $row['First_Name'];
$Last_Name= $row['Last_Name'];
$Gender= $row['Gender'];
$Home_Phone= $row['Home_Phone'];
$Cell_Phone= $row['Cell_Phone'];
$Emerg_Cont= $row['Emerg_Cont'];
$Birthday= $row['Birthday'];
$Allergies= $row['Allergies'];
$Surgical_History= $row['Surgical_History'];
$Visit_Date= $row['Visit_Date'];
$Staff_Id= $row['Staff_Id'];
$Insurance= $row['Insurance'];
$Med_Id = $row['Med_Id'];
$Reason = $row['Reason'];

echo '<tr>';
echo "<td class='firstrow'>$Patient_Id</td>";
echo "<td class='firstrow'>$First_Name</td>";
echo "<td class='firstrow'>$Last_Name </td>";
echo "<td class='firstrow'>$Gender</td>";
echo "<td class='firstrow'>$Home_Phone</td>";
echo "<td class='firstrow'>$Cell_Phone</td>";
echo "<td class='firstrow'>$Emerg_Cont</td>";
echo "<td class='firstrow'>$Birthday</td>";
echo "<td class='firstrow'>$Allergies</td>";
echo "<td class='firstrow'>$Surgical_History</td>";
echo "<td class='firstrow'>$Visit_Date</td>";
echo "<td class='firstrow'>$Staff_Id</td>";
echo "<td class='firstrow'>$Insurance</td>";
echo "<td class='firstrow'>$Med_Id </td>";
echo "<td class='firstrow'>$Reason</div></td>";
echo "</tr>\n";            
}              
echo '</table>';
//***********************************************************************


//************* Doctor 
echo '<br>';

echo '<table border = "1">';
echo '<tr>',
	    '<th>Staff_Id</th>',
	    '<th>First_Name</th>',
	    '<th>Last_Name</th>',
	    '<th>Gender</th>',
	    '<th>Position_Title</th>',
	    '<th>Email</th>',
      "</tr>\n";

// sql query formation
echo "Query Generated:";
$sql = "select * from STAFF  where Staff_Id = $Staff_Id";
echo PHP_EOL;
echo $sql;
$stmt = $db->query( $sql );


// print out 
foreach($stmt->fetchAll() as $row) {
$Staff_Id = $row['Staff_Id'];
$SFirst_Name = $row['First_Name'];
$SLast_Name = $row['Last_Name'];
$Gender= $row['Gender'];
$Position_Title= $row['Position_Title'];
$Email= $row['Email'];
echo '<tr>';
// make the entry listing the team span across n+1 rows, where n = size of the team
echo "<td class='firstrow'>$Staff_Id</td>";
echo "<td class='firstrow'>$SFirst_Name</td>";
echo "<td class='firstrow'>$SLast_Name</td>";
echo "<td class='firstrow'>$Gender</td>";
echo "<td class='firstrow'>$Position_Title</td>";
echo "<td class='firstrow'>$Email</td>";
echo "</tr>\n"; 
}              
echo '</table>';
// *****************************

//*********************medication 
echo '<br>';
echo '<table border = "1">';
echo '<tr>',
	    '<th>Med_id</th>',
	    '<th>Name</th>',
	    '<th>Effects</th>',
	    '<th>Cost</th>',
      "</tr>\n";

// sql query formation
echo "Query Generated:";
$sql = "select * from MEDICATION where Med_id = $Med_Id";
echo PHP_EOL;
echo $sql;
$stmt = $db->query( $sql );


// print out 
foreach($stmt->fetchAll() as $row) {
$Med_id= $row['Med_Id'];
$Name= $row['Name'];
$Effects= $row['Effects'];
$Cost = $row['Cost'];
echo '<tr>';
// make the entry listing the team span across n+1 rows, where n = size of the team
echo "<td class='firstrow'>$Med_Id</td>";
echo "<td class='firstrow'>$Name</td>";
echo "<td class='firstrow'>$Effects</td>";
echo "<td class='firstrow'>$Cost</td>";
echo "</tr>\n"; 
}              
echo '</table>';
// ************medication
// sql query formation

//************
echo '<br>';
echo '<table border = "1">';
echo '<tr>',
	    '<th>Diag_Id</th>',
	    '<th>Patient_Id</th>',
	    '<th>Patient_FName</th>',
	    '<th>Patient_LName</>',
	    '<th>Diag_Details</>',
	    '<th>Staff_Id</>',
	    '<th>Diag_Date</>',
	    '<th>Med_id</>',
      "</tr>\n";
echo "Query Generated:";
$sql = "select * from DIAGNOSIS where Patient_Id= $Patient_Id";

echo PHP_EOL;
echo $sql;
$stmt = $db->query( $sql );
// sql query formation
// print out 
foreach($stmt->fetchAll() as $row) {
$Diag_Id = $row['Diag_Id'];
$Patient_Id = $row['Patient_Id'];
$Patient_FName = $row['Patient_FName'];
$Patient_LName = $row['Patient_LName'];
$Diag_Details = $row['Diag_Details'];
$Staff_Id = $row['Staff_Id'];
$Diag_Date = $row['Diag_Date'];
$Med_id = $row['Med_id'];
echo '<tr>';
// make the entry listing the team span across n+1 rows, where n = size of the team
echo "<td class='firstrow'>$Diag_Id</td>";
echo "<td class='firstrow'>$Patient_Id</td>";
echo "<td class='firstrow'>$Patient_FName</td>";
echo "<td class='firstrow'>$Patient_LName</td>";
echo "<td class='firstrow'>$Diag_Details SN</td>";
echo "<td class='firstrow'>$Staff_Id</td>";
echo "<td class='firstrow'>$Diag_Date</td>";
echo "<td class='firstrow'>$Med_id</td>";
echo "</tr>\n"; 
}              
echo '</table>';
echo '<br>';

echo '<br>';
echo "This patient $Patient_FName $Patient_LName is taking $Name by the prescription of doctor $SFirst_Name $SLast_Name";

?>
    </body>
</html>   
