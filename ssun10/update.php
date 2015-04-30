<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
$table ='DIAGNOSIS' ;
?>
<title>Update Page</title>
</head>

<link rel="stylesheet" type="text/css" href="diagnosis.css">
   <body>
	<h2>Update</h2>
<!-- Insertion code -->
<FORM NAME = "form2" METHOD ="post" ACTION = "">
<INPUT TYPE = "TEXT" VALUE ="Diag_Id" NAME = "DI">
<INPUT TYPE = "TEXT" VALUE ="Patient_FName" NAME = "PF">
<INPUT TYPE = "TEXT" VALUE ="Patient_LName" NAME = "PL">
<INPUT TYPE = "TEXT" VALUE ="Patient_Id" NAME = "PI">
<INPUT TYPE = "TEXT" VALUE ="Staff_Id" NAME = "SI">
<INPUT TYPE = "TEXT" VALUE ="Diag_Details" NAME = "DD">
<INPUT TYPE = "TEXT" VALUE ="Severity" NAME = "Severity">
<INPUT TYPE = "TEXT" VALUE ="Diag_Date" NAME = "DDate">
<INPUT TYPE = "TEXT" VALUE ="Med_Id" NAME = "MI">
<INPUT TYPE = "TEXT" VALUE ="Remark" NAME = "Remark">
<INPUT TYPE = "TEXT" VALUE ="Second_Diag_Date" NAME = "SDD">
<INPUT TYPE = "Submit" Name = "Update" VALUE = "Update">
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
echo '<p>', 'Query pull (ssun10) as of ', date("Y-m-d H:i:s"), '</p>';
// print out format 
echo '<table border ="1">';
echo '<tr>',
	    '<th>Diag_Id</th>',
	    '<th>Patient_FName</th>',
	    '<th>Patient_LName</th>',
	    '<th>Patient_Id</th>',
	    '<th>Staff_Id</th>',
	    '<th>Diag_Details</th>',
	    '<th>Severity</th>',
	    '<th>Diag_Date</th>',
	    '<th>Med_Id</th>',
	    '<th>Remark</th>',
	    '<th>Second_Diag_Date</th>',
	    '<th> show</th>',
      "</tr>\n";
//******************************************************insertion code
echo nl2br("\nUpdate Query Generated:");
if( (!isset($_POST['DI'])) || (!isset($_POST['PF'])) || (!isset($_POST['PL'])) || (!isset($_POST['PI'])) || (!isset($_POST['SI'])) || (!isset($_POST['DD'])) || (!isset($_POST['Severity'])) || (!isset($_POST['DDate'])) || (!isset($_POST['MI']))|| (!isset($_POST['Remark'])) || (!isset($_POST['SDD'])))
{
	if (!isset($_POST['DI'])) echo nl2br("\nERROR : need Diag_Id");
	if (!isset($_POST['PF'])) echo nl2br("\nERROR : need Patient First_Name");
	if (!isset($_POST['PL'])) echo nl2br("\nERROR : need Patient Last_Name");
	if (!isset($_POST['PI'])) echo nl2br("\nERROR : need Patient_Id");
	if (!isset($_POST['SI'])) echo nl2br("\nERROR : need Staff_Id");
	if (!isset($_POST['DD'])) echo nl2br("\nERROR : need Diagnosis Details");
	if (!isset($_POST['Severity'])) echo nl2br("\nERROR : need Severity");
	if (!isset($_POST['DDate'])) echo nl2br("\nERROR : need Diagnosis Date");
	if (!isset($_POST['MI'])) echo nl2br("\nERROR : need Staff Med_Id");
	if (!isset($_POST['Remark'])) echo nl2br("\nERROR : need Remark");
	if (!isset($_POST['SDD'])) echo nl2br("\nERROR : need Second Diagnosis Date");
	echo nl2br("\nERROR : Insertion incomplete");
}
else
{
//**************************************
// insertion into STAFF
$IDI = $_POST['DI'];
$IPF = $_POST['PF'];  
$IPL = $_POST['PL'];
$IPI = $_POST['PI'];
$ISI = $_POST['SI'];
$IDD = $_POST['DD'];
$ISeverity = $_POST['Severity'];
$IDDate = $_POST['DDate'];
$IMI= $_POST['MI'];
$IRemark = $_POST['Remark'];
$ISDD = $_POST['SDD'];
//****************************************
	
if((isset($_POST['PF'])) && ($IPF != 'Patient_FName')){

$sql2 = "UPDATE $table SET Patient_FName='$IPF' WHERE Diag_Id=$IDI";
echo PHP_EOL;
echo $sql2;
$count = $db->exec($sql2);
/* Return number of rows that were deleted */
print("Update $count rows.\n");}

if ((isset($_POST['PL'])) && ($IPL != 'Patient_LName')){

$sql2 = "UPDATE $table SET Patient_LName='$IPL' WHERE Diag_Id=$IDI";
echo PHP_EOL;
echo $sql2;
$count = $db->exec($sql2);
/* Return number of rows that were deleted */
print("Update $count rows.\n");}

if ((isset($_POST['PI'])) && ($IPI != 'Patient_Id')){

$sql2 = "UPDATE $table SET Patient_Id=$IPI WHERE Diag_Id=$IDI";
echo PHP_EOL;
echo $sql2;
$count = $db->exec($sql2);
/* Return number of rows that were deleted */
print("Update $count rows.\n");}

if ((isset($_POST['SI'])) && ($ISI != 'Staff_Id')){

$sql2 = "UPDATE $table SET Staff_Id=$ISI WHERE Diag_Id=$IDI";
echo PHP_EOL;
echo $sql2;
$count = $db->exec($sql2);
/* Return number of rows that were deleted */
print("Update $count rows.\n");}

if ((isset($_POST['DD'])) && ($IDD != 'Diag_Details')){

$sql2 = "UPDATE $table SET Diag_Details='$IDD' WHERE Diag_Id=$IDI";
echo PHP_EOL;
echo $sql2;
$count = $db->exec($sql2);
/* Return number of rows that were deleted */
print("Update $count rows.\n");}

if ((isset($_POST['Severity'])) && ($ISeverity != 'Severity')){

$sql2 = "UPDATE $table SET Severity='$ISeverity' WHERE Diag_Id=$IDI";
echo PHP_EOL;
echo $sql2;
$count = $db->exec($sql2);
/* Return number of rows that were deleted */
print("Update $count rows.\n");}

if ((isset($_POST['DDate'])) && ($IDDate != 'Diag_Date')){

$sql2 = "UPDATE $table SET Diag_Date='$IDDate' WHERE Diag_Id=$IDI";
echo PHP_EOL;
echo $sql2;
$count = $db->exec($sql2);
/* Return number of rows that were deleted */
print("Update $count rows.\n");}

if ((isset($_POST['MI'])) && ($IMI != 'Med_Id')){

$sql2 = "UPDATE $table SET Med_Id=$IMI WHERE Diag_Id=$IDI";
echo PHP_EOL;
echo $sql2;
$count = $db->exec($sql2);
/* Return number of rows that were deleted */
print("Update $count rows.\n");}

if ((isset($_POST['Remark'])) && ($IRemark != 'Remark')){

$sql2 = "UPDATE $table SET Remark='$IRemark' WHERE Diag_Id=$IDI";
echo PHP_EOL;
echo $sql2;
$count = $db->exec($sql2);
/* Return number of rows that were deleted */
print("Update $count rows.\n");}

if ((isset($_POST['SDD'])) && ($ISDD != 'Second_Diag_Date')){

$sql2 = "UPDATE $table SET Second_Diag_Date='$ISDD' WHERE Diag_Id=$IDI";
echo PHP_EOL;
echo $sql2;
$count = $db->exec($sql2);
/* Return number of rows that were deleted */
print("Update $count rows.\n");}

}
$sql = "select * From $table";
$stmt = $db->query($sql);
foreach($stmt->fetchAll() as $row) {
$Diag_Id = $row['Diag_Id'];
$Patient_FName = $row['Patient_FName'];
$Patient_LName = $row['Patient_LName'];
$Patient_Id = $row['Patient_Id'];
$Staff_Id = $row['Staff_Id'];
$Diag_Details = $row['Diag_Details'];
$Severity = $row['Severity'];
$Diag_Date = $row['Diag_Date'];
$Med_Id = $row['Med_id'];
$Remark = $row['Remark'];
$Second_Diag_Date = $row['Second_Diag_Date'];
$link = 'show';
echo '<tr>';
// make the entry listing the team span across n+1 rows, where n = size of the team
echo "<td class='firstrow'>$Diag_Id</td>";
echo "<td class='firstrow'>$Patient_FName</td>";
echo "<td class='firstrow'>$Patient_LName</td>";
echo "<td class='firstrow'>$Patient_Id</td>";
echo "<td class='firstrow'>$Staff_Id</td>";
echo "<td class='firstrow'>$Diag_Details</td>";
echo "<td class='firstrow'>$Severity</td>";
echo "<td class='firstrow'>$Diag_Date</td>";
echo "<td class='firstrow'>$Med_Id</td>";
echo "<td class='firstrow'>$Remark</td>";
echo "<td class='firstrow'>$Second_Diag_Date</td>"; 
echo "<td class='firstrow'><a href='show.php?value=$Diag_Id'>$link</a>
</div>
</td>";

echo "</tr>\n"; 


}
//******************************************************insertion code
// print out 

echo '</table>';
?>
    </body>
</html>   
