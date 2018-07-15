<?php
$to_crawl="http://dl2.my98music.com/Data/Serial/";
$value=$_POST['value'];

$value=str_ireplace(" ","%20",$value);
$value=strtoupper($value);

function get_links($url){
	global $value;
	$input=@file_get_contents($url);
	$regexp="<a\s[^>]*href=(\"??)([^\">]*?)\\1[^>]*>(.*)<\/a>";
	preg_match_all("/$regexp/siU",$input,$matches);
	$l=$matches[2];
	
	
	echo'<ul>';
	foreach($l as $link)
	{		
		
			if(substr($link,0,3)!="../")
				{
					//echo strtoupper($link."<br>");
					if (strpos(strtoupper($link),$value) !== false)
							{
								$link=str_ireplace("%20"," ",$link);
								$link=str_ireplace("/","",$link);
								echo '<li><a href=#>'.$link.'<br>'.'</a></li>';
							}
				}
		
	}
	echo'</ul>';


}

get_links($to_crawl);
