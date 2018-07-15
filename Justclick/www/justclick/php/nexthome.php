<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/justclick.css">
<link href="../css/styles.css" rel="stylesheet" type="text/css">
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
	$("#loginpanel").hide(50);
  });
});
$(document).ready(function(){
  $("#login").click(function(){
	$("#loginpanel").show();
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
<input type="text" name="txt1" style="width:100px; height:24px;color:#999" value="Username" id="txt1" onFocus='hide(this);'>
<input type="password" name="txt2" style="width:100px; height:24px; color:#999" id="txt2" value="password" onFocus='hide(this);'>
<input type="submit" value="login" style="background:#CDFB8E;height: 24px; width: 99px; visibility:collapse">
</form>
</div>

<div id="buttons" style="position: absolute; left: 491px; top: 25px; z-index:5">
<input type="image" src="../images/back.jpg" style="height:50px; width:50px" onClick="goback();" value="back"/>
<input type="image" src="../images/home.jpg" style="height:50px; width:50px" onClick="home();"/>
</div>

<a href="../html/signup.html"><div id="signup">SIGN UP </div></a>
<div id="contactus" >Contact us  |  Help  |  About us<br> 
<audio src="dhoom.mp3" controls style="opacity:.1" autoplay="1">
<p>If you are reading this, it is because your browser does not support the audio element.</p>
</audio>
</div>




<a href="nexthome.php" ><div id="sitelogo2">JUST CLICK </div></a>
<div id='searchbox2'>
<form method='get' action='elements.php' target='iframe_a'>  
<input type='text' style='width:70%; height:50%; color:#727272;'  value='click here to search' name='searchboxtxt' onFocus='hide(this);' id='search'>
<input type='submit' value='SEARCH' align='middle' style='height:50%;' name='search'>
</form>
</div>
<div style="position: absolute; left: 1001px; height: 24px; top: 3px;">Time: <span id="time" /></div>
</div>



</body>

</html>

