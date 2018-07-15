<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/justclick.css"  />
<title>Add New Items</title>
<script src="../javascript/jquery.js">
</script>
<script>
  
$(document).ready(function(){
  $("button").click(function(){
    $("p").hide(1000);
  });
});
$(document).ready(function(){
  $("button").click(function(){
    $("p").show(1000);
  });
});


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
xmlhttp.open("GET","new.php?q="+str,true);
xmlhttp.send();
}
</script>

</head>
<?php
session_start();
$usrID=$_SESSION['usrid'];
$shopid=$_SESSION['shopid'];

require("database.php");
$rowset=mysql_query("select sname from shop where sid=$shopid");
$catID=mysql_fetch_array($rowset);
echo"<h1>Add items for $catID[0] shop</h1>";

require("database.php");
$row=mysql_query("select * from item where shopID=$shopid");				
echo"<table width='50%' border='1'>
<tr>
<th>item name</th><th>price</th><th>description</th><th>cat_id</th>";
																/*for showing list of items*/
echo"<ol>";
while($row1=mysql_fetch_array($row))
echo"
<tr>
<td><li>$row1[3]</li></td>
<td>$row1[4]</td>
<td>$row1[5]</td>
<td>$row1[1]</td>
</tr>
";
echo"</table>";
echo"</ol>";
?>
 
select main category and sub cat for item<br>
<?php
require("database.php");
$dy=mysql_query("select b.categoryNAME,a.categoryNAME from category as a,category as b where a.parentCategoryID=1");
echo"<p><select name='mncat' onchange='showHint(this.value);'>";
while($row2=mysql_fetch_array($dy))
{echo"<option >$row2[1]</option>";}
echo"</select>";
echo"<span id='txtHint'></span></p> ";
?>

<form method="get" action="#" >
<br>
item name<input type="text" name="itname" id="txt1">
price<input type="text" name="price">
description<input type="text" name="des">
<input type="submit" value="add" name="add">

</form>

<?php
$usrID=$_SESSION['usrid'];
$shopid=$_SESSION['shopid'];

if(isset($_REQUEST['add']))
{
$sscat=$_SESSION['cat'];
$itname=$_GET['itname'];
$price=$_GET['price'];
$des=$_GET['des'];

require("database.php");

$rs=mysql_query("select max(itemID) from item;");
$row=mysql_fetch_array($rs);
$itID=(int)$row[0]+1; 

if(mysql_query("insert into item VALUES($shopid,$sscat,$itID,'$itname',$price,'$des')"))
{ echo"inserted";
 header("location:item.php");
	
}
else echo"try again";
}

?>
</html>