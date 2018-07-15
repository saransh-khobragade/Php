<?php
$to_crawl="http://dl2.saberfun.ir/mersad/serial/";
$c= array();


function get_links($url){
	global $c;
	
	$input=url_get_contents($url);
	
	$regexp="<a\s[^>]*href=(\"??)([^\">]*?)\\1[^>]*>(.*)<\/a>";
	preg_match_all("/$regexp/siU",$input,$matches);
	$l=$matches[2];
	
	foreach($l as $link)
	{		
		
		if(!in_array($link,$c))
		{
					
					array_push($c,$link);
				
		}
	}
	


}

get_links($to_crawl);


foreach($c as $pages)
{
	echo $pages."<br />";

}
function url_get_contents ($Url) {
    if (!function_exists('curl_init')){ 
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}
?>