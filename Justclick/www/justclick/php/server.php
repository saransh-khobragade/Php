<?php
session_start();
$a=$_REQUEST["q"];
echo"$a";
require("database.php");
$rowset=mysql_query("select sid from shop where sname='$a'");
$row=mysql_fetch_array($rowset);
$_SESSION['shopid']=$row[0];
?>