<html>
<head>
<title>Shop Registration</title>
<link rel="stylesheet" type="text/css" href="../css/justclick.css" />
</head>
<body>
<?php 
session_start();
$ssusr=$_SESSION['usrid'];
if(isset($_POST["submit"]))
{
$a=$_POST['sname'];
$b=$_POST['mail'];
$c=$_POST['ph1'];
$d=$_POST['area'];
$e=$_POST['addr'];
$f=$_POST['url'];
$g=$_POST['desc'];



	require("database.php");
	$cnt=mysql_query("select max(sID) from shop");
	$row=mysql_fetch_array($cnt);
	$sid=(int)$row[0]+1;
	echo"$sid";
	if(mysql_query("insert into shop values($ssusr,$sid,'$a','$b',$c,'$d','$e','$f','$g')"))
	{	
		$_SESSION['shopid']=$sid;
		echo"Your shop has been registered,refresh to see details";
		header("Refresh: 3;item.php");
		
	}
	else
	echo " Error";
}
?>

<form method="post" action="#" >

<h1>Shop Registration </h1><br />
<h5><font color="#FF0000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* :Required Field</font></h5>
<table align="center" cellspacing="10">
<tr align="center">
  <td align="righ">Shop Name: </td>
  <td align="left"><input name="sname" type="text" required size="80" maxlength="70" /></td>
</tr>
<tr align="center">
  <td align="center" colspan="100%"><font size="5">Contact Information:</font></td>
</tr>
<tr>
  <td align="right">Shop"s Email ID: </td>
  <td align="left"><input type="email" maxlength="50" size="80" required autocomplete="on" name="mail"/></td>
</tr>
<tr align="center">
  <td align="right">Contact No </td>
  <td align="left"><input type="tel" maxlength="50" name="ph1" required /></td>
</tr>
<tr align="center">
  <td align="right">Area</td>
  <td align="left">
  <select name="area" >
  <option>Sector1</option>
  <option>Sector2</option>
  <option>Sector3</option>
  <option>Sector4</option>
  <option>Sector5</option>
  <option>Sector6</option>
  <option>Sector7</option>
  <option>Sector8</option>
  <option>Sector9</option>
  <option>Sector10</option>
  </select>
</td>
</tr>
<tr align="center">
  <td align="right">Full Address: </td>
  <td align="left"><textarea cols="80" rows="3" required name="addr" ></textarea></td>
</tr>
<tr align="center">
  <td align="right">Website: </td>
  <td align="left"><input type="url" name="url" size="80" autocomplete="on"/></td>
</tr>

<tr>
  <td align="center" colspan="100%"><font size="5">Details:</font></td>
 </tr>
<tr align="center">
  <td align="right">Description About Shop: </td>
  <td align="left"><textarea cols="80" rows="5" required name="desc"></textarea></td>
</tr>

<tr><tr>
<tr><td colspan="100%" align="center"><input type="checkbox" required name="c" />I agree with the terms and conditions of using this website</td></tr>
<td align="right"><input type="reset" /></td>
<td align="left"><input type="submit" name="submit" value="Submit" /></td>
</tr>
</tr>
</table>

</form>


</body>
</html>