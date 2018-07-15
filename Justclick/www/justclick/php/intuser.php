<html>
<head>
<script type="text/javascript">
function show2()
{ 
	document.getElementById("iframe").setAttribute("src","shop1.php");
}
function show(str)
{
var xmlhttp;
if (str.length==0)
  { 
  document.getElementById("iframe").innerHTML="";
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
    document.getElementById("test").value=xmlhttp.responseText;
	document.getElementById("iframe").setAttribute("src","item.php?id.value='test'");
    }
  }
xmlhttp.open("GET","server.php?q="+str,true);
xmlhttp.send();
}
function home()
{document.location.href="/";}
function goBack()
  {
  window.history.back()
}
</script>
<script type="text/javascript">
    <!--
    function updateTime() {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();
        if (minutes < 10){
            minutes = "0" + minutes;
        }
        if (seconds < 10){
            seconds = "0" + seconds;
        }
        var v = hours + ":" + minutes + ":" + seconds + " ";
        if(hours > 11){
            v+="PM";
        } else {
            v+="AM"
        }
        setTimeout("updateTime()",1000);
        document.getElementById('time').innerHTML=v;
    }
    updateTime();
    //-->
</script>
</head>

<body>
<div id="buttons" style="position: absolute; left: 45px; top: 13px; z-index: 5">
<input type="image" src="../images/back.jpg" style="height:50px; width:50px" onClick="goback();" value="back"/>
<input type="image" src="../images/home.jpg" style="height:50px; width:50px" onClick="home();"/>
</div>
<div style="position:absolute; left:90%">
<form method="post" action="#">
<input type="submit" value="logout" name="logout">
</form>
<h4>Time: <span id="time" /></h4>
</div>
<?php
session_start();
$usrID=$_SESSION['usrid'];
require("database.php");
$rowset=mysql_query("select username from users where userID=$usrID");
$catID=mysql_fetch_array($rowset);
echo"
<h1 align='center'>WELCOME $catID[0]</h1>
<form  method='get' action='#'>";
$rowset1=mysql_query("select sname from shop where userID=$usrID");
echo"YOUR SHOPS:";
while($catID1=mysql_fetch_array($rowset1))
{echo"<input type='submit' value='$catID1[0]' name='$catID1[0]' onClick='show(this.value);' onMouseOver='show(this.value);'>";}

echo"<input type='text' id='test' hidden=''>";

echo"<input type='submit'  value='Add shop'  name='add' onClick='show2();'>";
echo"</form>";
?>
<iframe  id="iframe" style=' width: 100%; height: 80%;'  scrolling="auto"></iframe>

<?php
if(isset($_REQUEST['logout']))
{
session_destroy();
header("location:nexthome.php");
}
?>
</body>
</html>