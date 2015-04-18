<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
$table ='STAFF' ;
?>
<title>Insertion Page</title>
</head>

   <body>
	<h2>Insertion</h2>
<!-- Insertion code -->
<FORM NAME = "form2" METHOD =" " ACTION = "">
<INPUT TYPE = "TEXT" VALUE ="Staff_Id" NAME = "SI">
<INPUT TYPE = "TEXT" VALUE ="First_Name" NAME = "FN">
<INPUT TYPE = "TEXT" VALUE ="Last_Name" NAME = "LN">
<INPUT TYPE = "TEXT" VALUE ="Gender" NAME = "G">
<INPUT TYPE = "TEXT" VALUE ="SSN" NAME = "SSN">
<INPUT TYPE = "TEXT" VALUE ="Home_Phone" NAME = "HP">
<INPUT TYPE = "TEXT" VALUE ="Mobile_Phone" NAME = "MP">
<INPUT TYPE = "TEXT" VALUE ="Email" NAME = "E">
<INPUT TYPE = "TEXT" VALUE ="Department_Id" NAME = "DI">
<INPUT TYPE = "TEXT" VALUE ="Position_Id" NAME = "PI">
<INPUT TYPE = "TEXT" VALUE ="Position_Title" NAME = "PT">
<INPUT TYPE = "Submit" Name = "Insert" VALUE = "Insert">
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
//******************************************************insertion code
echo nl2br("\nInsertion Query Generated:");
if( (!isset($_GET['SI'])) || (!isset($_GET['FN'])) || (!isset($_GET['LN'])) || (!isset($_GET['G'])) || (!isset($_GET['SSN'])) || (!isset($_GET['HP'])) || (!isset($_GET['MP'])) || (!isset($_GET['E'])) || (!isset($_GET['DI']))|| (!isset($_GET['PI'])) || (!isset($_GET['PT'])))
{
	if (!isset($_GET['SI'])) echo nl2br("\nERROR : need Staff_Id");
	if (!isset($_GET['FN'])) echo nl2br("\nERROR : need Staff First_Name");
	if (!isset($_GET['LN'])) echo nl2br("\nERROR : need Staff Last_Name");
	if (!isset($_GET['G'])) echo nl2br("\nERROR : need Staff Gender");
	if (!isset($_GET['SSN'])) echo nl2br("\nERROR : need Staff SSN");
	if (!isset($_GET['HP'])) echo nl2br("\nERROR : need Staff Home_Phone");
	if (!isset($_GET['MP'])) echo nl2br("\nERROR : need Staff Mobile_Phone");
	if (!isset($_GET['E'])) echo nl2br("\nERROR : need Staff Email address");
	if (!isset($_GET['DI'])) echo nl2br("\nERROR : need Staff Department_Id");
	if (!isset($_GET['PI'])) echo nl2br("\nERROR : need Staff Position_Id");
	if (!isset($_GET['PT'])) echo nl2br("\nERROR : need Staff Position_Title");
	echo nl2br("\nERROR : Insertion incomplete");
}
else
{
//**************************************
// insertion into STAFF
$ISI = $_GET['SI'];
$ILN = $_GET['LN'];  
$IFN = $_GET['FN'];
$IG = $_GET['G'];
$ISSN = $_GET['SSN'];
$IHP = $_GET['HP'];
$IMP = $_GET['MP'];
$IE = $_GET['E'];
$IDI = $_GET['DI'];
$IPI = $_GET['PI'];
$IPT = $_GET['PT'];
//****************************************
	$sql2 = "insert into $table values($ISI,'$ILN', '$IFN',$IG,$ISSN,$IHP,$IMP,'$IE',$IDI,$IPI,'$IPT')";
	echo PHP_EOL;
	echo $sql2;
	$count = $db->exec($sql2);
	/* Return number of rows that were deleted */
	print("Insert $count rows.\n");

}
//******************************************************insertion code
// print out 
$sql = "select * From $table";
$stmt = $db->query($sql);
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
echo "<td class='firstrow'><a href='list_supplementary.php?value=$Staff_Id'>$link</a>
</div>
</td>";
echo "</tr>\n"; 
}              
echo '</table>';

?>
    </body>
</html>   
