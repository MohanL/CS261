<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
//$table = $_GET['table'];
//$attribute = $_GET['attribute'];
//$value = $_GET['value'];
$table ='DIAGNOSIS' ;
$attribute = 'Diag_Id';
$value = $_GET['value'];

// type this in the browser : http://betaweb.csug.rochester.edu/~mliu26/show.php?value=200X

?>
<title>show Page</title>
<!--<?PHP$value = $_POST['value'];?> -->
</head>

   <body>
	<h2>Show</h2>


<?php
// need to add checking mechanisms

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
echo '<table border = "1">';
echo '<tr>',
	    '<th>Diag_Id</th>',
	    '<th>Patient_Id</th>',
	    '<th>Patient_FName</th>',
	    '<th>Patient_LName</th>',
	    '<th>Diag_Details</th>',
	    '<th>Staff_Id</th>',
	    '<th>Diag_Date</th>',
      "</tr>\n";

// sql query formation
echo "Query Generated:";
$sql = "select * from $table ";
echo PHP_EOL;
echo $sql;

$sqll ="insert into DIAGNOSIS values(4021,"Mohan","Liu",2001,"I am 100",0,"/1/2014",0,"NA",1021,"never")";
echo PHP_EOL;
echo $sqll;

//$stmt = $db->query( $sql2 );

$stmt = $db->query( $sql );
// print out 
foreach($stmt->fetchAll() as $row) {
$Diag_Id = $row['Diag_Id'];
$Patient_Id = $row['Patient_Id'];
$Patient_FName = $row['Patient_FName'];
$Patient_LName = $row['Patient_LName'];
$Diag_Details = $row['Diag_Details'];
$Staff_Id = $row['Staff_Id'];
$Diag_Date = $row['Diag_Date'];

echo '<tr>';
// make the entry listing the team span across n+1 rows, where n = size of the team
echo "<td class='firstrow'>$Diag_Id</td>";
echo "<td class='firstrow'>$Patient_Id</td>";
echo "<td class='firstrow'>$Patient_FName</td>";
echo "<td class='firstrow'>$Patient_LName</td>";
echo "<td class='firstrow'>$Diag_Details SN</td>";
echo "<td class='firstrow'>$Staff_Id</td>";
echo "<td class='firstrow'>$Diag_Date</td>";
echo "</tr>\n"; 
}              
echo '</table>';
?>
    </body>
</html>   
