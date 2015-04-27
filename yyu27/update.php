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
echo "<td class='firstrow'><a href='list_supplementary.php?value=$Diag_Id'>$link</a>
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
