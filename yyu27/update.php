<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
$table ='PATIENT' ;
?>
<title>Update Page</title>
</head>

   <body>
	<h2>Update</h2>
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

echo nl2br("\nUpdate Query Generated:");
if(!isset($_POST['SI'])) 
{
	echo nl2br("\nERROR : need Patient_Id");
	echo nl2br("\nERROR : Query can't be completed because Patient_Id needed");
}

else{
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
	if(isset($_POST['LN'])&&($ILN!="Last_Name"))
	{	$sql2 = "update $table set Last_Name= '$ILN' where Patient_Id = $IPI";
		echo PHP_EOL;
		echo $sql2;
		$count = $db->exec($sql2);
		// Return number of rows that were deleted 
		print("Insert $count rows.\n");
	}
	if(isset($_POST['FN'])&&($IFN!="First_Name"))
	{	$sql2 = "update $table set First_Name= '$IFN' where Patient_Id = $IPI";
		echo PHP_EOL;
		echo $sql2;
		$count = $db->exec($sql2);
		// Return number of rows that were deleted 
		print("Insert $count rows.\n");
	}
	if(isset($_POST['G'])&&($IG!="Gender"))
	{	$sql2 = "update $table set Gender= $IG where Patient_Id = $IPI";
		echo PHP_EOL;
		echo $sql2;
		$count = $db->exec($sql2);
		// Return number of rows that were deleted 
		print("Insert $count rows.\n");
	}
	if(isset($_POST['HP'])&&($IHP!="Home_Phone"))
	{	$sql2 = "update $table set Home_Phone= $IHP where Patient_Id = $IPI";
		echo PHP_EOL;
		echo $sql2;
		$count = $db->exec($sql2);
		// Return number of rows that were deleted 
		print("Insert $count rows.\n");
	}
	if(isset($_POST['CP'])&&($ICP!="Cell_Phone"))
	{	$sql2 = "update $table set Cell_Phone= $ICP where Patient_Id = $IPI";
		echo PHP_EOL;
		echo $sql2;
		$count = $db->exec($sql2);
		// Return number of rows that were deleted 
		print("Insert $count rows.\n");
	}
	if(isset($_POST['EC'])&&($IEC!="Emerg_Cont"))
	{	$sql2 = "update $table set Emerg_Cont= $IEC where Patient_Id = $IPI";
		echo PHP_EOL;
		echo $sql2;				
		$count = $db->exec($sql2);
		print("Insert $count rows.\n");
	}
	if(isset($_POST['BD'])&&($IB!="Birthday"))
	{	$sql2 = "update $table set Birthday='$IB' where Patient_Id = $IPI";
		echo PHP_EOL;
		$count = $db->exec($sql2);
		// Return number of rows that were deleted 
		print("Insert $count rows.\n");
	}
	if(isset($_POST['A'])&&($IA!="Allergies"))
	{	$sql2 = "update $table set Allergies= $IA where Patient_Id = $IPI";
		echo PHP_EOL;
		$count = $db->exec($sql2);
		// Return number of rows that were deleted 
		print("Insert $count rows.\n");
	}
	if(isset($_POST['SH'])&&($ISH!="Surgical_History"))
	{	$sql2 = "update $table set Surgical_History= $ISH where Patient_Id = $IPI";
		echo PHP_EOL;
		$count = $db->exec($sql2);
		// Return number of rows that were deleted 
		print("Insert $count rows.\n");
	}
	if(isset($_POST['VD'])&&($IVD!="Visit_Date"))
	{	$sql2 = "update $table set Visit_Date= $IVD where Patient_Id = $IPI";
		echo PHP_EOL;
		$count = $db->exec($sql2);
		// Return number of rows that were deleted 
		print("Insert $count rows.\n");
	}
	if(isset($_POST['SI'])&&($ISI!="Staff_Id"))
	{	$sql2 = "update $table set Staff_Id= $ISI where Patient_Id = $IPI";
		echo PHP_EOL;
		$count = $db->exec($sql2);
		// Return number of rows that were deleted 
		print("Insert $count rows.\n");
	}
	if(isset($_POST['I'])&&($II!="Insurance"))
	{	$sql2 = "update $table set Insurance= $II where Patient_Id = $IPI";
		echo PHP_EOL;
		$count = $db->exec($sql2);
		// Return number of rows that were deleted 
		print("Insert $count rows.\n");
	}
	if(isset($_POST['MI'])&&($IMI!="Med_Id"))
	{	$sql2 = "update $table set Med_Id= $IMI where Patient_Id = $IPI";
		echo PHP_EOL;
		$count = $db->exec($sql2);
		// Return number of rows that were deleted 
		print("Insert $count rows.\n");
	}
	if(isset($_POST['R'])&&($IR!="Reason"))
	{	$sql2 = "update $table set Reason= $IR where Patient_Id = $IPI";
		echo PHP_EOL;
		$count = $db->exec($sql2);
		// Return number of rows that were deleted 
		print("Insert $count rows.\n");
	}
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
