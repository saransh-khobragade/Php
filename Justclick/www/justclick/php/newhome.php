<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Untitled Document</title>
<link href="boilerplate.css" rel="stylesheet" type="text/css">
<link href="newhome.css" rel="stylesheet" type="text/css">
<!-- 
To learn more about the conditional comments around the html tags at the top of the file:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

Do the following if you're using your customized build of modernizr (http://www.modernizr.com/):
* insert the link to your js here
* remove the link below to the html5shiv
* add the "no-js" class to the html tags at the top
* you can also remove the link to respond.min.js if you included the MQ Polyfill in your modernizr build 
-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="respond.min.js"></script>
<script src="../javascript/jquery.js">
</script>
<script>
$(document).ready(function(){
  $("#txt2").focusout(function(){
	$("#loginpanel").animate({
      left:'400px',
      height:'30px',
      width:'0px',
      opacity:'0',
	});
  });
});
$(document).ready(function(){
  $("#login").click(function(){
	$("#loginpanel").animate({
      left:'725px',
      height:'30px',
      width:'400px',
      opacity:'1',
	});
  });
});


$(document).ready(function(){
  $("#searchbox2").hide();
  $("#sitelogo2").hide();
  $("#buttons").hide();
   });
$(document).ready(function(){
  $("#cssmenu").click(function(){
    $("#sitelogo2").show(1000);
	$("#searchbox2").show(1000);
	$("#buttons").show(1000);
  });
})




function hide(a)
{
a.value=""
}
function home()
{document.location.href="/";}
function goBack()
  {
  window.history.back()
}
</script>
</head>
<body>
<div class="gridContainer clearfix">
  <div id="LayoutDiv1">
  
  
 <body id="body">
<div id="mndiv">


<div id='cat'>
<div id="cssmenu" >
<ul>
<?php

require("database.php");

$row=mysql_query("select categoryNAME,categoryID from category where parentcategoryID=1");	
					
while($row1=mysql_fetch_array($row))
{
		echo"<li  class='has-sub' ><a href='element2.php?cat3=$row1[0]' target='iframe_a' ><span>$row1[0]</span></a>";
					if($row1[1]==1){}
					else
					{
						$dy1=mysql_query("select a.categoryNAME as pARENT,b.categoryNAME as child from category as a,category as b where 			                    	a.categoryID=b.parentcategoryID and a.categoryID=$row1[1]");
						
						echo"<ul>";
						while($row3=mysql_fetch_array($dy1))
						{echo"<li class='last'><a href='element2.php?cat3=$row3[1]' target='iframe_a'><span>$row3[1]</span></a></li>";}
						echo"</ul>";
						
					}
					
					
		echo"</li>";
		
}
?>
</ul>
</div>
</div>

<div id="iframe" style="position: absolute; width: 57%; height: 477px; top: 123px; left: 27%;">
<iframe src="next.php" width="100%" height="100%" name="iframe_a" id="iframe2" frameborder="0">
</iframe>
</div>

  

<a href="#" ><div id="login" onClick="formSubmit();">LOGIN </div></a>

<div id="loginpanel" style=" position: absolute; left: 288px; top: 33px; width: 296px; opacity: 0; z-index:0">
<form method="get" action="../php/login.php" name="frm1">
<input type="text" name="txt1" style="width:100px; height:24px;">
<input type="text" name="txt2" style="width:100px; height:24px;" id="txt2">
<input type="submit" value="login" style="background:#CDFB8E;height: 24px; width: 99px; visibility:collapse">
</form>
</div>

<div id="buttons" style="position: absolute; left: 491px; top: 25px; z-index:5">
<input type="image" src="../images/back.jpg" style="height:50px; width:50px" onClick="goback();" value="back"/>
<input type="image" src="../images/home.jpg" style="height:50px; width:50px" onClick="home();"/>
</div>

<a href="../html/signup.html"><div id="signup">SIGN UP </div></a>
<div id="contactus" >Contact us  |  Help  |  About us </div>




<a href="nexthome.php" ><div id="sitelogo2">JUST CLICK </div></a>
<div id='searchbox2'>
<form method='get' action='elements.php' target='iframe_a'>  
<input type='text' style='width:70%; height:50%; color:#727272;'  value='click here to search' name='searchboxtxt' onFocus='hide(this);' id='search'>
<input type='submit' value='SEARCH' align='middle' style='height:50%;' name='search'>
</form>
</div>
</div>



</body>
</div>
</div>
</body>
</html>
