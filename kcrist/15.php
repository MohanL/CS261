<html>
<head>
<title>A BASIC HTML FORM</title>
<?PHP

$username = $_POST['Diag_Id'];
print ($username);

?>
</head>
<body>

<FORM NAME ="form1" METHOD =" " ACTION = "">

<INPUT TYPE = "TEXT" VALUE ="Diag_Id" NAME = "Diag_Id">
<INPUT TYPE = "Submit" Name = "Submit1" VALUE = "search">


</FORM>


</body>
</html>
