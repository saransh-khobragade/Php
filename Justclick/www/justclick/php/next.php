<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/justclick.css">
<link href="../css/styles.css" rel="stylesheet" type="text/css">
<script src="../javascript/jquery.js">
</script>
<script>
$(document).ready(function(){
  $("#hint").hide();
  });

$(document).ready(function(){
  $("#searchbox").keypress(function(){
    $("#hint").show(0);
  });
})

$(document).ready(function(){
  $("#searchbox").focusout(function(){
    $("#hint").hide();
  });
})
  
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
xmlhttp.open("GET","searchbox.php?q="+str,true);
xmlhttp.send();
}
</script>

<script>

function hide(a)
{
a.value=""
}
</script>
</head>

<body >
<div >

<div id="sitelogo"> JUST CLICK </div>

<form method="get" action="elements.php">  
<div id="searchbox">
<input type="text" style="width:70%; height:50%; color:#727272;"  value="click here to search" name="searchboxtxt" onFocus="hide(this)" onKeyPress="showHint(this.value);" >
<input type="submit" name="search" value="SEARCH" align"middle" style="height:50%;" id="68678" >
</div>
</form>
 
<div id="hint" style="position: absolute; left: 39px; top: 177px; width: 494px; height: auto; z-index: 3; background:#FBFBFB; margin-top:0px;"><p><span id="txtHint">no item found</span></p></div>  
</div>




</body>

</html>

