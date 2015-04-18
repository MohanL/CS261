<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
//$table = $_GET['table'];
//$attribute = $_GET['attribute'];
//$value = $_GET['value'];
$table ='STAFF' ;
$attribute = 'Staff_Id';
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
echo '<p>', 'Query pull (mliu26) as of ', date("Y-m-d H:i:s"), '</p>';
// print out format 
echo '<table border = "1">';
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
echo "</tr>\n"; 
}              
echo '</table>';
?>
    </body>
</html>   
