<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
$table ='PATIENT' ;
?>
<title>Insertion Page</title>
</head>

   <body>
	<h2>Insertion</h2>
<!-- Insertion code -->
<FORM NAME = "form2" METHOD =" " ACTION = "">
<INPUT TYPE = "TEXT" VALUE ="Patient_Id" NAME = "PI">
<INPUT TYPE = "TEXT" VALUE ="First_Name" NAME = "FN">
<INPUT TYPE = "TEXT" VALUE ="Last_Name" NAME = "LN">
<INPUT TYPE = "TEXT" VALUE ="Gender" NAME = "G">
<INPUT TYPE = "TEXT" VALUE ="Home_Phone" NAME = "HP">
<INPUT TYPE = "TEXT" VALUE ="Cell_Phone" NAME = "CP">
<INPUT TYPE = "TEXT" VALUE ="Emerg_Contact" NAME = "EC">
<INPUT TYPE = "TEXT" VALUE ="Birthday" NAME = "BD">
<INPUT TYPE = "TEXT" VALUE ="Allergies" NAME = "A">
<INPUT TYPE = "TEXT" VALUE ="Surgical_History" NAME = "SH">
<INPUT TYPE = "TEXT" VALUE ="Visit_Date" NAME = "VD">
<INPUT TYPE = "TEXT" VALUE ="Staff_Id" NAME = "SI">
<INPUT TYPE = "TEXT" VALUE ="Insurance" NAME = "I">
<INPUT TYPE = "TEXT" VALUE ="Med_Id" NAME = "MI">
<INPUT TYPE = "TEXT" VALUE ="Reason" NAME = "R">
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
if( (!isset($_GET['PI'])) || (!isset($_GET['FN'])) || (!isset($_GET['LN'])) || (!isset($_GET['G'])) || (!isset($_GET['HP'])) || (!isset($_GET['CP'])) || (!isset($_GET['EC'])) || (!isset($_GET['BD']))|| (!isset($_GET['A'])) || (!isset($_GET['SH']))|| (!isset($_GET['VD'])) || (!isset($_GET['SI']))|| (!isset($_GET['I'])) || (!isset($_GET['MI']))|| (!isset($_GET['R'])))
{
	if (!isset($_GET['PI'])) echo nl2br("\nERROR : need Patient_Id");
	if (!isset($_GET['FN'])) echo nl2br("\nERROR : need Patient First_Name");
	if (!isset($_GET['LN'])) echo nl2br("\nERROR : need Patient Last_Name");
	if (!isset($_GET['G'])) echo nl2br("\nERROR : need Patient Gender");
	if (!isset($_GET['HP'])) echo nl2br("\nERROR : need Patient Home_Phone");
	if (!isset($_GET['CP'])) echo nl2br("\nERROR : need Patient Cell_Phone");
    if (!isset($_GET['EC'])) echo nl2br("\nERROR : need Patient Emerg_Contact");
	if (!isset($_GET['BD'])) echo nl2br("\nERROR : need Patient Birthday");
	if (!isset($_GET['A'])) echo nl2br("\nERROR : need Patient Allergies");
	if (!isset($_GET['SH'])) echo nl2br("\nERROR : need Patient Surgical_History");
	if (!isset($_GET['VD'])) echo nl2br("\nERROR : need Patient Visit_Date");
    if (!isset($_GET['SI'])) echo nl2br("\nERROR : need Patient Staff_Id");
    if (!isset($_GET['I'])) echo nl2br("\nERROR : need Patient Insurance");
    if (!isset($_GET['MI'])) echo nl2br("\nERROR : need Patient Med_Id");
    if (!isset($_GET['R'])) echo nl2br("\nERROR : need Patient Reason");
	echo nl2br("\nERROR : Insertion incomplete");
}
else
{
//**************************************
// insertion into STAFF
$IPI = $_GET['PI'];
$ILN = $_GET['LN'];  
$IFN = $_GET['FN'];
$IG = $_GET['G'];
$IHP = $_GET['HP'];
$ICP = $_GET['CP'];
$IEC = $_GET['EC'];
$IB = $_GET['BD'];
$IA = $_GET['A'];
$ISH = $_GET['SH'];
$IVD = $_GET['VD'];
$ISI = $_GET['SI'];
$II = $_GET['I'];
$IMI = $_GET['MI'];
$IR = $_GET['R'];
//****************************************
	$sql2 = "insert into $table values($IPI,'$ILN', '$IFN',$IG,$IHP,$ICP,'$IB',$IEC,'$IA','$ISH','$IVD',$ISI,'$II',$IMI,'$IR')";
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
