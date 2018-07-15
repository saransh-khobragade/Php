<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/justclick.css">
<script>
function showHint(str)
{
var xmlhttp;
if (str.length==0)
  { 
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    	document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
		
		
    }
  }
xmlhttp.open("GET","new3.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>

<body id="body" style="background:#FFF; margin-left:0px; margin-right:0px;">

<div style="position: absolute;">
<form action="#" target="_self">
<h7> Select Area</h7><br>
<?php
$cat3=$_GET['cat3'];
require("database.php");
$rowset=mysql_query("select categoryID from category where categoryNAME='$cat3'");
$catID=mysql_fetch_array($rowset);

$rowset3=mysql_query("select DISTINCT shopID from item where categoryID=$catID[0]");
echo"<select name='select' onChange='showHint(this.value);' >";

while($sid=mysql_fetch_array($rowset3))
{
$rowset4=mysql_query("select area from shop where sid=$sid[0]");
$area=mysql_fetch_array($rowset4);
echo"<option>$area[0]</option>";
}
?>

</select>
</form>

</div>

<div style="position: absolute; left: 120px; width:80%;" id="txtHint">
<?php
session_start();
$cat3=$_GET['cat3'];
$_SESSION['cat3']=$cat3;
require("database.php");
$rowset=mysql_query("select categoryID from category where categoryNAME='$cat3'");
$catID=mysql_fetch_array($rowset);

$rowset=mysql_query("select DISTINCT shopID from item where categoryID=$catID[0]");
echo"<table border='1' cellspacing='0' cellpadding='0' width='80%' align='center' bordercolor='#F2F2F2'>";
echo"<tr>
	<th>SHOP NAME</th>
	<th>SHOP CONTACT1</th>
	<th>SHOP ADDRESS</th>
	<th>DESCRIPTION</th>
	<th>WEBPAGE</th>
	</tr>";

while($row=mysql_fetch_array($rowset))
{
	$rowset2=mysql_query("select * from shop where sid=$row[0]");
	$row2=mysql_fetch_array($rowset2);
	echo"<tr>
	<td>$row2[2]</td>
	<td>$row2[4]</td>
	<td>$row2[6]</td>
	<td>$row2[8]</td>
	<td><a href='$row2[8]'>$row2[7]</a></td>
	</tr>";
	
}
echo"</table>";
?>

</div>


</body>
</html>