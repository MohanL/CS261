<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
$table ='STAFF' ;
?>
<title>Update Page</title>
</head>
<link rel="stylesheet" type="text/css" href="staff.css">
   <body>
	<h2>Update</h2>
<!-- Insertion code -->
<FORM NAME = "form2" METHOD ="post" ACTION = "">
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
<INPUT TYPE = "BuTTON" onclick="history.go(0)" value ="Cancel">
<INPUT TYPE = "Submit" Name = "Insert" VALUE = "Update">
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

echo nl2br("\nUpdate Query Generated:");
if(!isset($_POST['SI'])) 
{
	echo nl2br("\nERROR : need Staff_Id");
	echo nl2br("\nERROR : Query can't be completed because Staff_Id needed");
}

else{
//**************************************
// insertion into STAFF

$ISI = $_POST['SI'];
$IFN = $_POST['FN'];
$ILN = $_POST['LN'];  
$IG = $_POST['G'];
$ISSN = $_POST['SSN'];
$IHP = $_POST['HP'];
$IMP = $_POST['MP'];
$IE = $_POST['E'];
$IDI = $_POST['DI'];
$IPI = $_POST['PI'];
$IPT = $_POST['PT'];

//****************************************
	if(isset($_POST['LN'])&&($ILN!="Last_Name"))
	{	$sql2 = "update $table set Last_Name= '$ILN' where Staff_Id = $ISI";
		echo PHP_EOL;
		echo $sql2;
		$count = $db->exec($sql2);
		// Return number of rows that were deleted 
		print("Insert $count rows.\n");
	}
	if(isset($_POST['FN'])&&($IFN!="First_Name"))
	{	$sql2 = "update $table set First_Name= '$IFN' where Staff_Id = $ISI";
		echo PHP_EOL;
		echo $sql2;
		$count = $db->exec($sql2);
		// Return number of rows that were deleted 
		print("Insert $count rows.\n");
	}
	if(isset($_POST['G'])&&($IG!="Gender"))
	{	$sql2 = "update $table set Gender= $IG where Staff_Id = $ISI";
		echo PHP_EOL;
		echo $sql2;
		$count = $db->exec($sql2);
		// Return number of rows that were deleted 
		print("Insert $count rows.\n");
	}
	if(isset($_POST['SSN'])&&($ISSN!="SSN"))
	{	$sql2 = "update $table set SSN= $ISSN where Staff_Id = $ISI";
		echo PHP_EOL;
		echo $sql2;
		$count = $db->exec($sql2);
		// Return number of rows that were deleted 
		print("Insert $count rows.\n");
	}
	if(isset($_POST['HP'])&&($IHP!="Home_Phone"))
	{	$sql2 = "update $table set Home_Phone= $IHP where Staff_Id = $ISI";
		echo PHP_EOL;
		echo $sql2;
		$count = $db->exec($sql2);
		// Return number of rows that were deleted 
		print("Insert $count rows.\n");
	}
	if(isset($_POST['MP'])&&($IMP!="Mobile_Phone"))
	{	$sql2 = "update $table set Mobile_Phone= $IMP where Staff_Id = $ISI";
		echo PHP_EOL;
		echo $sql2;				
		$count = $db->exec($sql2);
		print("Insert $count rows.\n");
	}
	if(isset($_POST['E'])&&($IE!="Email"))
	{	$sql2 = "update $table set Email='$IE' where Staff_Id = $ISI";
		echo PHP_EOL;
		$count = $db->exec($sql2);
		// Return number of rows that were deleted 
		print("Insert $count rows.\n");
	}
	if(isset($_POST['DI'])&&($IDI!="Department_Id"))
	{	$sql2 = "update $table set Department_Id= $IDI where Staff_Id = $ISI";
		echo PHP_EOL;
		$count = $db->exec($sql2);
		// Return number of rows that were deleted 
		print("Insert $count rows.\n");
	}
	if(isset($_POST['PI'])&&($IPI!="Position_Id"))
	{	$sql2 = "update $table set Position_Id= $IPI where Staff_Id = $ISI";
		echo PHP_EOL;
		$count = $db->exec($sql2);
		// Return number of rows that were deleted 
		print("Insert $count rows.\n");
	}
	if(isset($_POST['PT'])&&($IPT!="Position_Title"))
	{	$sql2 = "update $table set Position_Title= $IPT where Staff_Id = $ISI";
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
echo "<td class='firstrow'><a href='show.php?value=$Staff_Id'>$link</a>
</div>
</td>";
echo "</tr>\n"; 
}              
echo '</table>';
?>
    </body>
</html>   
