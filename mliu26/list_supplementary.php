<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
//$table = $_GET['table'];
//$attribute = $_GET['attribute'];
//$value = $_GET['value'];
$table ='DIAGNOSIS' ;
$attribute = 'Staff_Id';
$value = $_GET['value'];

?>
<title>List Page2</title>
</head>

   <body>
	<h2>More Staff Info</h2>
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
echo '<table border = "1">';
echo '<tr>',
	    '<th>Staff_Id</th>',
	    '<th>Diag_Id</th>',
	    '<th>Patient_Id</th>',
	    '<th>Med_Id</th>',
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
$Diag_Id = $row['Diag_Id'];
$Patient_Id = $row['Patient_Id'];
$Med_id = $row['Med_id'];
echo '<tr>';
// make the entry listing the team span across n+1 rows, where n = size of the team
echo "<td class='firstrow'>$Staff_Id</td>";
echo "<td class='firstrow'>$Diag_Id</td>";
echo "<td class='firstrow'>$Patient_Id</td>";
echo "<td class='firstrow'>$Med_id</td>";
echo "</tr>\n"; 
}              
echo '</table>';
?>
    </body>
</html>   
