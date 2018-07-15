<?php
$to_crawl="http://dl2.my98music.com/Data/Serial/";
$c= array();
$userinput=$_POST['value'];
$userinput=str_ireplace(" ","%20",$userinput);
$userinput=strtoupper($userinput);


function get_links($url){
	global $c,$userinput,$to_crawl;
	
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
						{	
							
							$input=@file_get_contents($to_crawl.$link);
							preg_match_all("/$regexp/siU",$input,$matches2);
							$l2=$matches2[2];
							foreach($l2 as $link2)
							{		
									if(!in_array($link2,$c))
									{
										if(substr($link2,0,3)!="../")
											{
												//echo $to_crawl.$link.$link2."<br>";
												$input=@file_get_contents($to_crawl.$link.$link2);
												preg_match_all("/$regexp/siU",$input,$matches3);
												$l3=$matches3[2];
												foreach($l3 as $link3)
												{		
														if(!in_array($link3,$c))
														{
															if(substr($link3,0,3)!="../")
																{
																	if(stripos($to_crawl.$link.$link2.$link3,".mkv"))
																	{
																		array_push($c,$to_crawl.$link.$link2.$link3);
																	}
																	
																}
														}
												}
												
												
											}
									}
							}
							
							break;
						}
				}
		}
	}
	


}

get_links($to_crawl);
$c = array_reverse($c);

echo '<table style="width:100%; border:1px;">';
echo '<tbody>';
$id=0;
foreach($c as $pages)
{
	$id=$pages;
	$pages=str_ireplace("%20"," ",$pages);
	$pages=str_ireplace("%5"," ",$pages);
	$pages= strrchr($pages,"/")."<br />";
	$pages=str_ireplace("/","",$pages);
	echo '<tr>';
	echo '<td align="center">';echo $pages;echo"</td><td align='center'><button id='".$id."' class='lightbox_trigger' onClick='reply_click(this.id)'>play</button></td>";
	echo '</tr>';
	
}
echo '</tbody>';
echo '</table>';