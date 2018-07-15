<html>
<head>
<title>show shop</title>

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
xmlhttp.open("GET","new2.php?q="+str,true);
xmlhttp.send();
}
</script>

</head>
<form method="get" action="#">
<?php
require("database.php");
$dy=mysql_query("select b.categoryNAME,a.categoryNAME from category as a,category as b where a.parentCategoryID=b.CategoryID;");
echo"<input type='submit' value='show all' name='showall'>";
echo"Search by shop name<input type='text' name='searchbox'>";
echo"<input type='submit' value='search' name='search'>";
?>
</form>



<?php
session_start();
if(isset($_REQUEST['showall']))
{
	require("database.php");
	$rowset=mysql_query("select * from shop");
	echo"<table border=1 width='100%'>"; 
	echo"<tr>
	<th>X</th><th>shop name</th><th>shop mail</th><th>contact1</th><th>contact2</th><th>shop address</th><th>shop website</th><th>shop description</th>";
	echo"<form method='get' action='#'>";
	while($row1=mysql_fetch_array($rowset))
	{
	echo"<tr>";
	echo"<td><input type='checkbox' name='del[]' value='$row1[2]'></td>";
	echo"<td>$row1[2]</td>";
	echo"<td>$row1[3]</td>";
	echo"<td>$row1[4]</td>";
	echo"<td>$row1[5]</td>";
	echo"<td>$row1[6]</td>";
	echo"<td>$row1[7]</td>";
	echo"<td>$row1[8]</td>";
	echo"</tr>";
	}
	echo"</table>";
echo"<input type='submit' value='del' name='delete'>";	
echo"</form>";
}
if(isset($_REQUEST['search']))
{
	$shop=$_GET['searchbox'];
	require("database.php");
	if($rowset4=mysql_query("select * from shop where sname='$shop'"))
	{
		echo"<table border=1 width='100%'>"; 
		echo"<tr>
		<th>X</th>
		<th>shop name</th>
		<th>shop mail</th>
		<th>contact1</th>
		<th>contact2</th>
		<th>shop address</th>
		<th>shop website</th>
		<th>shop description</th>
		</tr>";
		echo"<form method=get' action='#'>";
		while($row1=mysql_fetch_array($rowset4))
		{
		echo"<td><input type='checkbox' name='del[]' value='$row1[2]'></td>";
		echo"<td>$row1[2]</td>";
		echo"<td>$row1[3]</td>";
		echo"<td>$row1[4]</td>";
		echo"<td>$row1[5]</td>";
		echo"<td>$row1[6]</td>";
		echo"<td>$row1[7]</td>";
		echo"<td>$row1[8]</td>";
		echo"</tr>";
		}
		echo"</table>";
    	echo"<input type='submit' value='del' name='delete'>";	

	}
	else
	echo"not matched";
	echo"</form>";
}

if(isset($_REQUEST['delete']))
{
	$count=$_REQUEST['del'];
	$a=count($count);
	for($i=0;$i<$a;$i++)
	{
		require("database.php");
		if(mysql_query(" delete from shop where sname='$count[$i]'"))
			{
				echo"deleted,refresh to see the list";
				
			}
		else
		echo"not deleted";
	}
}
?>

</html>