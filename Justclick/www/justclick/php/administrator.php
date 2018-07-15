<html>
<body>
</body>
</html>

<?php
require("database.php");
$admin=mysql_query("select username from users where authority=1");
$usr=mysql_fetch_array($admin);														/*for showing categories*/
echo"<h1 align='center'>Welcome Adminintrator $usr[0]</h1>";

echo"<h1>Categories Are</h1>"; 
$row=mysql_query("select a.categoryNAME as pARENT,b.categoryNAME as child from category as a,category as b where a.categoryID=b.parentcategoryID and b.parentcategoryID=1");						

echo"<form method='get' action='#'>";
echo"<table>";
echo"<ol>";
while($row1=mysql_fetch_array($row))
echo"<tr><td><li>$row1[1]</li></td><td><input type='checkbox' name='del[]' value='$row1[1]'>delete</td></tr>";
echo"<tr><td></td><td><input type='submit' value='delete' name='delete'></td></tr>";
echo"</table>";
echo"</ol>";
echo"</form>";

?>

<form method="post" action="#">
<h3>ADD MAIN CATEGORY</h3>
<input type="text" name="cat" >		
<input type="submit" value="add" name="submit">
<br>


<?php
if(isset($_REQUEST['delete']))
{
	$count=$_REQUEST['del'];
	$a=count($count);
	for($i=0;$i<$a;$i++)
	{
		require("database.php");
		if(mysql_query(" delete from category where categoryNAME='$count[$i]'"))
			{
				header("location:administrator.php");
				
			}
		else
		echo"not deleted";
	}
}
if(isSet($_REQUEST['submit']))
{
$a=$_POST['cat'];
if($a==NULL)
{echo"blank values cant be accepted";}
else
{
require("database.php");
$rs=mysql_query("select max(CategoryID) from category;");
$row=mysql_fetch_array($rs);
$uid=(int)$row[0]+1; 
if(mysql_query("insert into category VALUES('$a',1,'',$uid)"))
{
	echo"inserted succesfully";header("location:administrator.php");
}
else
echo"category existed,try other name";
}
echo"<br>";
}
?>
</form>

<form method="post" action="#">
<h3>FOR ADDING SUB-CAT</h3>
<h4>Select Main/parent category</h4>
<?php

require("database.php");
$dy=mysql_query("select b.categoryNAME,a.categoryNAME from category as a,category as b where a.parentCategoryID=1");
echo"<select name='mncat' >";
while($row5=mysql_fetch_array($dy))
{echo"<option>$row5[1]</option>";}
echo"</select>";

?>
Enter sub-cat<input type="text" name="subcat">
<input type="submit" value="add" name="submit2">
</form> 

<?php
if(isSet($_REQUEST['submit2']))
{
$c=$_POST['mncat'];
$d=$_POST['subcat'];
require("database.php");

$rs1=mysql_query("select max(CategoryID) from category;");
$row6=mysql_fetch_array($rs1);
$uid2=(int)$row6[0]+1; 


$rowset=mysql_query("select categoryID from category where categoryNAME='$c'");
$catID=mysql_fetch_array($rowset);

if(mysql_query("insert into category values('$d',$catID[0],'',$uid2)"))
echo"Sub-category inserted  in $c";

$row=mysql_query("select a.categoryNAME as pARENT,b.categoryNAME as child from category as
a,category as b where a.categoryID=b.parentcategoryID and a.categoryID=$catID[0]");						/*for showing categories*/

echo"<ol>";
while($row1=mysql_fetch_array($row))
echo"<li>$row1[1]</li>";
echo"</ol>";
}
?>


</body>
</html>
