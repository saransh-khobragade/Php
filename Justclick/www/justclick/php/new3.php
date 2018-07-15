<?php
session_start();
$c=$_GET["q"];
$cat3=$_SESSION['cat3'];
//$cat3=$_GET['s'];
require("database.php");
$rowset=mysql_query("select categoryID from category where categoryNAME='$cat3'");
$catID=mysql_fetch_array($rowset);

$rowset=mysql_query("select DISTINCT shopID from item where categoryID=$catID[0]");
echo"<table border='1' cellspacing='0' cellpadding='0' width='80%' align='center' bordercolor='#F2F2F2'>";
echo"<tr>
	<th>SHOP NAME</th>
	<th>SHOP CONTACT1</th>
	<th>SHOP CONTACT2</th>
	<th>SHOP ADDRESS</th>
	</tr>";

while($row=mysql_fetch_array($rowset))
{
	$rowset2=mysql_query("select * from shop where sid=$row[0] and area='$c'");
	$row2=mysql_fetch_array($rowset2);
	echo"<tr>
	<td>$row2[2]</td>
	<td>$row2[4]</td>
	<td>$row2[5]</td>
	<td>$row2[6]</td>
	</tr>";
	
}
echo"</table>";

?>