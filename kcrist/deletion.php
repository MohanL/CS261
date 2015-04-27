<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
//$table = $_GET['table'];
//$attribute = $_GET['attribute'];
//$value = $_GET['value'];
$table ='MEDICATION' ;
?>

<title>Deletion Page</title>
</head>

   <body>
	<h2>Deletion</h2>
<!-- Insertion code -->
<FORM NAME = "form2" METHOD =" " ACTION = "">
Med ID:<INPUT TYPE = "TEXT" VALUE =" " NAME = "Med_Id">
<br><br>
<INPUT TYPE = "Submit" Name = "Delete" VALUE = "Delete">
</FORM>
<!-- Delete code -->
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
echo '<table border ="1">';
echo '<tr>',
	    '<th>Med_Id</th>',
	    '<th>Name</th>',
	    '<th>Manf</th>',
	    '<th>Contents</th>',
	    '<th>Effects</th>',
	    '<th>Form</th>',
	    '<th>Dosage</th>',
	    '<th>Side_Effects</th>',
	    '<th>Schedule</th>',
	    '<th>Description</th>',
	    '<th>Cost</th>',
	    '<th>show</th>',
      "</tr>\n";

if(!isset($_GET['Med_Id']) )
{
	if (!isset($_GET['Med_Id'])) echo nl2br("\nERROR : need Med_Id");
	echo nl2br("\nERROR : Deletion incomplete");
}
else
{
//**************************************
// insertion into STAFF
$ISI = $_GET['Med_Id'];
//****************************************
	
	// change to deletion 
	$sql2 = "delete from $table where Med_Id = $ISI";
	echo PHP_EOL;
	echo $sql2;
	$count = $db->exec($sql2);
	/* Return number of rows that were deleted */
	print("\nDelete $count rows.\n");
}
// print out 
$sql = "select * From $table";
$stmt = $db->query($sql);
foreach($stmt->fetchAll() as $row) {
$Med_Id= $row['Med_Id'];
$Name= $row['Name'];
$Manf= $row['Manf'];
$Contents= $row['Contents'];
$Effects= $row['Effects'];
$Form = $row['Form'];
$Dosage= $row['Dosage'];
$Side_Effects= $row['Side_Effects'];
$Schedule= $row['Schedule'];
$Description= $row['Description'];
$Cost= $row['Cost'];
$show= 'show';

echo '<tr>';
echo "<td class='firstrow'>$Med_Id</td>";
echo "<td class='firstrow'>$Name</td>";
echo "<td class='firstrow'>$Manf</td>";
echo "<td class='firstrow'>$Contents</td>";
echo "<td class='firstrow'>$Effects</td>";
echo "<Td class='firstrow'>$Form</td>";
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
