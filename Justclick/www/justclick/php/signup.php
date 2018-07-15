<html>
<head>
</head>
<body>
<?php
$a=$_GET['user'];
$b=$_GET['pass'];
$c=$_GET['con_pass'];
require("database.php");


$rs=mysql_query("select max(userID) from users");
$row=mysql_fetch_array($rs);

$uid=(int)$row[0]+1;

$userinfo=mysql_query("select username,password from users");
while($US=mysql_fetch_array($userinfo))
{
if($a==$US[0])
$flag=1;
else
$flag=2;
}

if($flag==2)
{
	if($b==$c)
	{
		if($a==NULL|$b==NULL)
		{$flag=3;}
		else
		{
			if(mysql_query("insert into users values($uid,'$a','$c',0)"))
        		{echo"username registered succesfully";header("location:../html/login.html");}
		}
	}	
	else
	echo"password mismatch";
}
else
echo"sorry,username already registered";

if($flag==3)
echo"vaules cant be blank";

?>
</body>
</html>