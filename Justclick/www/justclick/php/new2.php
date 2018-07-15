<?php
session_start();

$c=$_GET["q"];
require("database.php");

$rowset=mysql_query("select categoryID from category where categoryNAME='$c'");
$catID=mysql_fetch_array($rowset);

$dy1=mysql_query("select a.categoryNAME as pARENT,b.categoryNAME as child from category as
a,category as b where a.categoryID=b.parentcategoryID and a.categoryID=$catID[0]");
echo"<select name='subcat'>";
while($row3=mysql_fetch_array($dy1))
{echo"<option>$row3[1]</option>";}
echo"</select>";
$_SESSION['cat2']=$catID[0];

?>


