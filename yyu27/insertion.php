<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
$table ='PATIENT' ;
?>
<title>Insertion Page</title>
</head>

<link rel="stylesheet" type="text/css" href="patient.css">
   <body>
	<h2>Insertion</h2>
<!-- Insertion code -->
<FORM NAME = "form2" METHOD ="post" ACTION = "">
<INPUT TYPE = "TEXT" VALUE ="Patient_Id" NAME = "PI">
<INPUT TYPE = "TEXT" VALUE ="First_Name" NAME = "FN">
<INPUT TYPE = "TEXT" VALUE ="Last_Name" NAME = "LN">
<INPUT TYPE = "TEXT" VALUE ="Gender" NAME = "G">
<INPUT TYPE = "TEXT" VALUE ="Home_Phone" NAME = "HP">
<INPUT TYPE = "TEXT" VALUE ="Cell_Phone" NAME = "CP">
<INPUT TYPE = "TEXT" VALUE ="Emerg_Cont" NAME = "EC">
<INPUT TYPE = "TEXT" VALUE ="Birthday" NAME = "BD">
<INPUT TYPE = "TEXT" VALUE ="Allergies" NAME = "A">
<INPUT TYPE = "TEXT" VALUE ="Surgical_History" NAME = "SH">
<INPUT TYPE = "TEXT" VALUE ="Visit_Date" NAME = "VD">
<INPUT TYPE = "TEXT" VALUE ="Staff_Id" NAME = "SI">
<INPUT TYPE = "TEXT" VALUE ="Insurance" NAME = "I">
<INPUT TYPE = "TEXT" VALUE ="Med_Id" NAME = "MI">
<INPUT TYPE = "TEXT" VALUE ="Reason" NAME = "R">
<INPUT TYPE="button" onclick="alert('Input Canceled')" value="Cancel">
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
	    '<th>Emerg_Cont</th>',
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
if( (!isset($_POST['PI'])) || (!isset($_POST['FN'])) || (!isset($_POST['LN'])) || (!isset($_POST['G'])) || (!isset($_POST['HP'])) || (!isset($_POST['CP'])) || (!isset($_POST['EC'])) || (!isset($_POST['BD']))|| (!isset($_POST['A'])) || (!isset($_POST['SH']))|| (!isset($_POST['VD'])) || (!isset($_POST['SI']))|| (!isset($_POST['I'])) || (!isset($_POST['MI']))|| (!isset($_POST['R'])))
{
	if (!isset($_POST['PI'])) echo nl2br("\nERROR : need Patient_Id");
	if (!isset($_POST['FN'])) echo nl2br("\nERROR : need Patient First_Name");
	if (!isset($_POST['LN'])) echo nl2br("\nERROR : need Patient Last_Name");
	if (!isset($_POST['G'])) echo nl2br("\nERROR : need Patient Gender");
	if (!isset($_POST['HP'])) echo nl2br("\nERROR : need Patient Home_Phone");
	if (!isset($_POST['CP'])) echo nl2br("\nERROR : need Patient Cell_Phone");
    if (!isset($_POST['EC'])) echo nl2br("\nERROR : need Patient Emerg_Cont");
	if (!isset($_POST['BD'])) echo nl2br("\nERROR : need Patient Birthday");
	if (!isset($_POST['A'])) echo nl2br("\nERROR : need Patient Allergies");
	if (!isset($_POST['SH'])) echo nl2br("\nERROR : need Patient Surgical_History");
	if (!isset($_POST['VD'])) echo nl2br("\nERROR : need Patient Visit_Date");
    if (!isset($_POST['SI'])) echo nl2br("\nERROR : need Patient Staff_Id");
    if (!isset($_POST['I'])) echo nl2br("\nERROR : need Patient Insurance");
    if (!isset($_POST['MI'])) echo nl2br("\nERROR : need Patient Med_Id");
    if (!isset($_POST['R'])) echo nl2br("\nERROR : need Patient Reason");
	echo nl2br("\nERROR : Insertion incomplete");
}
else
{
//**************************************
// insertion into PATIENT
$IPI = $_POST['PI'];
$IFN = $_POST['FN'];  
$ILN = $_POST['LN'];
$IG = $_POST['G'];
$IHP = $_POST['HP'];
$ICP = $_POST['CP'];
$IEC = $_POST['EC'];
$IB = $_POST['BD'];
$IA = $_POST['A'];
$ISH = $_POST['SH'];
$IVD = $_POST['VD'];
$ISI = $_POST['SI'];
$II = $_POST['I'];
$IMI = $_POST['MI'];
$IR = $_POST['R'];
//****************************************
	$sql2 = "insert into $table values($IPI,'$IFN', '$ILN',$IG,$IHP,$ICP,'$IB',$IEC,'$IA','$ISH','$IVD',$ISI,'$II',$IMI,'$IR')";
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
$Emerg_Cont = $row['Emerg_Cont'];
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
echo "<td class='firstrow'>$Emerg_Cont</td>";
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
