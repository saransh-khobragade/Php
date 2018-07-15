<?php
session_start();
$a=$_GET['txt1'];
$b=$_GET['txt2'];

require("database.php");
$userinfo=mysql_query("select username,password,authority,userID from users");
while($row=mysql_fetch_array($userinfo))
{


if($a==$row[0])
{
	if($b==$row[1])
	{
     $flag=0;
	 $_SESSION['usrid']=$row[3];
	 if($row[2]==1)
     $flag=3;
	 
	break;
	}
	else
	{
		$flag=1;
		break;
	}
}
else
{
	$flag=2;
}

}
if($flag==0)
{header("location:intuser.php");


 }
if($flag==1)
echo"password incorrect,try again";
if($flag==2)
echo"user not resgistered";
if($flag==3)
header("location:../html/intadmin.html");


?>