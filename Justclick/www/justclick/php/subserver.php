<?php

$c=$_GET['q'];
require("database.php");
$dy1=mysql_query("select a.categoryNAME as pARENT,b.categoryNAME as child from category as
a,category as b where a.categoryID=b.parentcategoryID and a.categoryID=$c");

while($row3=mysql_fetch_array($dy1))
{echo"$row3[1]";}



?>


