<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
//$table = $_GET['table'];
//$attribute = $_GET['attribute'];
//$value = $_GET['value'];
$table ='MEDICATION' ;
$attribute = 'Med_Id';
//$value = $_GET['value'];

if(isset($_GET['value']))
{
	$value = $_GET['value'];
	if(($value < 0) || ($value > 100))
	{	
		$value = 'Med_Id';
		echo 'input invalid, output everything';
	}
}
else	// do the thing
{
	?>
	<form action = "list.php">
	<label>PLEASE ENTER VALID ID between 0 to 100</label>
	</form>
	<?php
}
?>
<title>List Page</title>
</head>

   <body>
	<h2>list</h2>
<FORM NAME ="form1" METHOD ="" ACTION = "">

<INPUT TYPE = "TEXT" VALUE ="Med_Id" NAME = "value">
<INPUT TYPE = "Submit" Name = "Submit1" VALUE = "search">

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


</FORM>
// print out information about the query
echo '<p>', 'Query pull (kcrist) as of ', date("Y-m-d H:i:s"), '</p>';
// print out format 
echo '<table border ="1">';
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
	    '<th>show</th>',
      "</tr>\n";

// sql query formation
echo "Query Generated:";
$sql = "select * from $table while $attribute=$value";
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
$show= 'show';
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
echo "<td class='firstrow'>$Cost</td>";
echo "<td class='firstrow'><a href='list_supplementary.php?value=$Med_Id'>$show</a>
</div>
</td>";
echo "</tr>\n"; 
}              
echo '</table>';
?>
    </body>
</html>   
