<html>
<body>

<?php
if(isset($_REQUEST['search']))
{
$a=$_GET['searchboxtxt'];
require("database.php");
if($rowset=mysql_query("select * from item where itemname='$a'"))
{
	echo"<table border='1' cellspacing=0px width='100%'>";
	echo"<tr><th>NAME</th><th>PRICE</th><th>DESCRIPTION</th></tr>";
	while($row=mysql_fetch_array($rowset))
	{
	echo"<tr>";
	echo"<td>$row[3]</td>";
	echo"<td>$row[4]</td>";
	echo"<td>$row[5]</td>";
	echo"</tr>";
	}
	echo"</table>";
}
else echo"no items found try again";

}?>


</body>
</html>