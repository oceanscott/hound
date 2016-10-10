<?php


class hound{

	public function getCurrentQuote()
	{
		require('phpQuery-onefile.php');
		$url = "http://www.xe.com/currencytables/?from=XAU&date=2016-09-29"; 

		$content = file_get_contents($url);

		//$usdollar = substr($content ,  , $length )
		//var_dump($content);
		//var_dump($doc);
		$doc = phpQuery::newDocumentHTML($content);

		//var_dump(strpos($doc,'historicalRateTable'));
		$temp_US = substr($doc, strpos($doc, 'US Dollar', strpos($doc, 'historicalRateTable-wrap'))+0, 100);
		$GoldQuote['US'] = substr($temp_US, strpos($temp_US, "\">")+2 , strpos($temp_US, "<", strpos($temp_US, "\">")) - strpos($temp_US, "\">") - 2);
		
		$temp_JP = substr($doc, strpos($doc, 'Japanese Yen', strpos($doc, 'historicalRateTable-wrap'))+0, 100);

		$GoldQuote['JP'] = substr($temp_JP, strpos($temp_JP, "\">")+2 , strpos($temp_JP, "<", strpos($temp_JP, "\">")) - strpos($temp_JP, "\">") - 2);

		var_dump($GoldQuote['US']);

		var_dump($GoldQuote['JP']);
		//$usd = pq($doc)->find('US Dollar');
		//<div class="historicalRateTable-wrap">
		//var_dump($usd);
		phpQuery::$documents = array();

		//$article_title = pq('h2',$article)->text();
		return $GoldQuote;
		//var_dump($article);
	}
}
?>