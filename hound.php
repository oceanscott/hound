<?php
require "phpQuery-onefile.php";
phpQuery::newDocumentFileXHTML('phpQuery.html')->find('p'); 
$ul = pq('ul'); 
var_dump($ul);
//phpQuery::newDocumentFile('http://www.wyzu.cn/2014/0519/94980.html/'); 
//echo pq(".blkTop h1:eq(0)")->html();
//$pq_obj_1 = phpQuery::newDocumentFileHTML("phpQuery.html");
//phpQuery::newDocumentFileXHTML('http://www.wyzu.cn/2014/0519/94980.html/')->find('p'); 
//$ul = pq('ul'); 
//var_dump($str[1]);
//$str[1] = pq('div.test',$pq_obj_1)->html();
//var_dump($str[1]);
//	phpQuery::newDocumentFile('http://www.jb51.net'); 
//$artlist = pq(".blog_li"); 
/*
foreach($str[1] as $li){ 
   echo pq($li)->find('h2')->html().""; 
}
*/
/*
// Load Mike Fisher's player page on thescore.com 
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, 'http://www.thescore.com/nhl/player_profiles/859-mike-fisher'); 
 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
 	$html = curl_exec($ch); 
 	curl_close($ch); 
  
 	// Create phpQuery document with returned HTML 
 	$doc = phpQuery::newDocument($html); 
  
 	// Create array to hold stats 
 	$stats = array(); 
  
 	// Add stats from page to array 
 	// Notice the CSS style selector 
 	foreach($doc['#career_stats_regular table tr:nth-child(1) td'] as $td) 
 	{ 
 		$stats[] = pq($td)->html(); 
 	} 
  
 	// Display stats 
 	print_r($stats); 
*/

?>