<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
$table ='MEDICATION' ;
?>
<title>Update Page</title>
</head>

   <body>
	<h2>Update</h2>
<!-- Insertion code -->
<FORM NAME = "form2" METHOD ="POST" ACTION = "">
Med ID:<INPUT TYPE = "TEXT" VALUE ="Med_Id" NAME = "Med_Id">
<br><br>
Name:<INPUT TYPE = "TEXT" VALUE ="Name" NAME = "Name">
<br><br>
Manufacturer:<INPUT TYPE = "TEXT" VALUE ="Manf" NAME = "Manf">
<br><br>
Contents:<INPUT TYPE = "TEXT" VALUE ="Contents" NAME = "Contents">
<br><br>
Effects:<INPUT TYPE = "TEXT" VALUE ="Effects" NAME = "Effects">
<br><br>
Dosage:<INPUT TYPE = "TEXT" VALUE ="Dosage" NAME = "Dosage">
<br><br>
Side Effects:<INPUT TYPE = "TEXT" VALUE ="Side_Effects" NAME = "Side_Effects">
<br><br>
Schedule:<INPUT TYPE = "TEXT" VALUE ="Schedule" NAME = "Schedule">
<br><br>
Description:<INPUT TYPE = "TEXT" VALUE ="Description" NAME = "Description">
<br><br>
Cost:<INPUT TYPE = "TEXT" VALUE ="Cost" NAME = "Cost">
<br><br>
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
    print "DB Connection Error!: " . $e->POSTMessage();
    die();
}
// print out information about the query
echo '<p>', 'Query pull (ssun10) as of ', date("Y-m-d H:i:s"), '</p>';
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
//*****************************************************update code
echo nl2br("\nUpdate Query Generated:");
if( (!isset($_POST['Med_Id'])) || (!isset($_POST['Name'])) || (!isset($_POST['Manf'])) || (!isset($_POST['Form'])) || (!isset($_POST['Contents'])) || (!isset($_POST['Effects'])) || (!isset($_POST['Dosage'])) || (!isset($_POST['Side_Effects'])) || (!isset($_POST['Schedule'])) || (!isset($_POST['Description']))|| (!isset($_POST['Cost'])))
{
	if (!isset($_POST['Med_Id'])) echo nl2br("\nERROR : need Med_Id");
	if (!isset($_POST['Name'])) echo nl2br("\nERROR : need Medicine Name");
	if (!isset($_POST['Manf'])) echo nl2br("\nERROR : need Medicine Manufacturer");
	if (!isset($_POST['Contents'])) echo nl2br("\nERROR : need Medicine Contents");
	if (!isset($_POST['Effects'])) echo nl2br("\nERROR : need Effects");
	if (!isset($_POST['Form'])) echo nl2br("\nERROR : need Form");
	if (!isset($_POST['Dosage'])) echo nl2br("\nERROR : need Dosage");
	if (!isset($_POST['Side_Effects'])) echo nl2br("\nERROR : need Side Effects");
	if (!isset($_POST['Schedule'])) echo nl2br("\nERROR : need Schedule");
	if (!isset($_POST['Description'])) echo nl2br("\nERROR : need Description");
	if (!isset($_POST['Cost'])) echo nl2br("\nERROR : need Cost");
	echo nl2br("\nERROR :Update incomplete");
//****************************************
}
else
{
//**************************************
// insertion into med
//// insertion into MED
$IMI = $_POST['Med_Id'];
$IN = $_POST['Name'];  
$IM = $_POST['Manf'];
$IC = $_POST['Contents'];
$IE = $_POST['Effects'];
$IF = $_POST['Form'];
$ID = $_POST['Dosage'];
$ISE = $_POST['Side_Effects'];
$IS = $_POST['Schedule'];
$IDS = $_POST['Description'];
$IC = $_POST['Cost'];
//****************************************
	
if((isset($_POST['IN'])) && ($IN != 'Name')){
$sql2 = "UPDATE $table SET Name='$IN' WHERE Med_Id=$IMI";
echo PHP_EOL;
echo $sql2;
$count = $db->exec($sql2);
/* Return number of rows that were deleted */
print("Update $count rows.\n");}
if ((isset($_POST['IM'])) && ($IM != 'Manf')){
$sql2 = "UPDATE $table SET Manf='$IM' WHERE Med_Id=$IMI";
echo PHP_EOL;
echo $sql2;
$count = $db->exec($sql2);
/* Return number of rows that were deleted */
print("Update $count rows.\n");}
if ((isset($_POST['IC'])) && ($IMI != 'Contents')){
$sql2 = "UPDATE $table SET Contents='$IC' WHERE Med_Id=$IMI";
echo PHP_EOL;
echo $sql2;
$count = $db->exec($sql2);
/* Return number of rows that were deleted */
print("Update $count rows.\n");}
if ((isset($_POST['IE'])) && ($IE !='Effects')){
$sql2 = "UPDATE $table SET Effects='$IE' WHERE Med_Id=$IMI";
echo PHP_EOL;
echo $sql2;
$count = $db->exec($sql2);
/* Return number of rows that were deleted */
print("Update $count rows.\n");}
if ((isset($_POST['IF'])) && ($IF != 'Form')){
$sql2 = "UPDATE $table SET Form='$IF' WHERE Med_Id=$IMI";
echo PHP_EOL;
echo $sql2;
$count = $db->exec($sql2);
/* Return number of rows that were deleted */
print("Update $count rows.\n");}
if ((isset($_POST['ID'])) && ($ID != 'Dosage')){
$sql2 = "UPDATE $table SET Dosage='$ID' WHERE Med_Id=$IMI";
echo PHP_EOL;
echo $sql2;
$count = $db->exec($sql2);
/* Return number of rows that were deleted */
print("Update $count rows.\n");}
if ((isset($_POST['ISE'])) && ($ISE != 'Side_Effects')){
$sql2 = "UPDATE $table SET Side_Effects='$ISE' WHERE Med_Id=$IMI";
echo PHP_EOL;
echo $sql2;
$count = $db->exec($sql2);
/* Return number of rows that were deleted */
print("Update $count rows.\n");}
if ((isset($_POST['IS'])) && ($IS != 'Schedule')){
$sql2 = "UPDATE $table SET Schedule='$IS' WHERE Med_Id=$IMI";
echo PHP_EOL;
echo $sql2;
$count = $db->exec($sql2);
/* Return number of rows that were deleted */
print("Update $count rows.\n");}
if ((isset($_POST['IDS'])) && ($IDS != 'Description')){
$sql2 = "UPDATE $table SET Description='$IDS' WHERE Med_Id=$IMI";
echo PHP_EOL;
echo $sql2;
$count = $db->exec($sql2);
/* Return number of rows that were deleted */
print("Update $count rows.\n");}
if ((isset($_POST['IC'])) && ($IC != 'Cost')){
$sql2 = "UPDATE $table SET Cost='$IC' WHERE Med_Id=$IMI";
echo PHP_EOL;
echo $sql2;
$count = $db->exec($sql2);
/* Return number of rows that were deleted */
print("Update $count rows.\n");}
}
//******************************************************insertion code
// print out 
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

// make the entry listing the team span across n+1 rows, where n = size of the team
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
echo '</table>';
?>
    </body>
</html> 
