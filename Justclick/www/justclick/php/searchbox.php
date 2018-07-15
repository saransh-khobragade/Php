<?php
$c=$_GET["q"];
require("database.php");
$rowset=mysql_query("select itemname from item where Itemname like '%$c%' order by categoryID LIMIT 5");
echo"<table cellspacing='0px' width='100%' cellpadding='10' style='color:#727272'>";
while($row=mysql_fetch_array($rowset))
echo"<tr><td>$row[0]</td><tr>";
echo"</table>";

?>