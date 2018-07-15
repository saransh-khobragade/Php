<?php
$to_crawl="http://dl2.saberfun.ir/mersad/serial/";
$c= array();
$userinput="Better Call Saul";
$userinput=str_ireplace(" ","%20",$userinput);
$userinput=strtoupper($userinput);

function get_links($url){
	global $c,$userinput;
	$input=@file_get_contents($url);
	$regexp="<a\s[^>]*href=(\"??)([^\">]*?)\\1[^>]*>(.*)<\/a>";
	preg_match_all("/$regexp/siU",$input,$matches);
	$l=$matches[2];
	
	foreach($l as $link)
	{		
		if(!in_array($link,$c))
		{
			if(substr($link,0,3)!="../")
				{
					
					if (strpos(strtoupper($link),$userinput) !== false)
							array_push($c,$link);
				}
		}
	}
	


}

get_links($to_crawl);


foreach($c as $pages)
{
	echo $pages."<br />";

}
