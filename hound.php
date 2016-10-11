<?php


class hound{

	public function getCurrentQuote()
	{
		require('phpQuery-onefile.php');
		$currentDay = date("Y-m-d");
		var_dump($currentDay);
		$this->getGoldQuote($Quote, $currentDay);
		$this->getRate($Quote, $currentDay);
		/*
		require('phpQuery-onefile.php');
		$url = "http://www.xe.com/currencytables/?from=XAU&date=2016-09-29"; 

		$content = file_get_contents($url);

		//$usdollar = substr($content ,  , $length )
		//var_dump($content);
		//var_dump($doc);
		$doc = phpQuery::newDocumentHTML($content);

		//var_dump(strpos($doc,'historicalRateTable'));
		$temp_US = substr($doc, strpos($doc, 'US Dollar', strpos($doc, 'historicalRateTable-wrap'))+0, 100);
		$Quote['US_Gold'] = substr($temp_US, strpos($temp_US, "\">")+2 , strpos($temp_US, "<", strpos($temp_US, "\">")) - strpos($temp_US, "\">") - 2);
		
		$temp_JP = substr($doc, strpos($doc, 'Japanese Yen', strpos($doc, 'historicalRateTable-wrap'))+0, 100);

		$Quote['JP_Gold'] = substr($temp_JP, strpos($temp_JP, "\">")+2 , strpos($temp_JP, "<", strpos($temp_JP, "\">")) - strpos($temp_JP, "\">") - 2);

		var_dump($Quote['US_Gold']);

		var_dump($Quote['JP_Gold']);
		//$usd = pq($doc)->find('US Dollar');
		//<div class="historicalRateTable-wrap">
		//var_dump($usd);
		phpQuery::$documents = array();
		*/
		//$article_title = pq('h2',$article)->text();
		return $Quote;
		//var_dump($article);
	}
	public function getGoldQuote(&$Quote, $date)
	{
		//$currentDay = date("Y-m-d");
		//var_dump($currentDay);
		$url = "http://www.xe.com/currencytables/?from=XAU&date=".$date; 

		$content = file_get_contents($url);

		//$usdollar = substr($content ,  , $length )
		//var_dump($content);
		//var_dump($doc);
		$doc = phpQuery::newDocumentHTML($content);

		//var_dump(strpos($doc,'historicalRateTable'));
		$temp_US = substr($doc, strpos($doc, 'US Dollar', strpos($doc, 'historicalRateTable-wrap'))+0, 100);
		$Quote['US_Gold'] = substr($temp_US, strpos($temp_US, "\">")+2 , strpos($temp_US, "<", strpos($temp_US, "\">")) - strpos($temp_US, "\">") - 2);
		
		$temp_JP = substr($doc, strpos($doc, 'Japanese Yen', strpos($doc, 'historicalRateTable-wrap'))+0, 100);

		$Quote['JP_Gold'] = substr($temp_JP, strpos($temp_JP, "\">")+2 , strpos($temp_JP, "<", strpos($temp_JP, "\">")) - strpos($temp_JP, "\">") - 2);

		var_dump($Quote['US_Gold']);

		var_dump($Quote['JP_Gold']);
		//$usd = pq($doc)->find('US Dollar');
		//<div class="historicalRateTable-wrap">
		//var_dump($usd);
		phpQuery::$documents = array();
	}
	public function getRate(&$Quote, $date)
	{
		
		$url = "http://www.xe.com/currencytables/?from=JPY&date=".$date; 

		$content = file_get_contents($url);

		//$usdollar = substr($content ,  , $length )
		//var_dump($content);
		//var_dump($doc);
		$doc = phpQuery::newDocumentHTML($content);

		//var_dump(strpos($doc,'historicalRateTable'));
		//$temp_US = substr($doc, strpos($doc, 'US Dollar', strpos($doc, 'historicalRateTable-wrap'))+0, 100);
		//$Quote['US_Gold'] = substr($temp_US, strpos($temp_US, "\">")+2 , strpos($temp_US, "<", strpos($temp_US, "\">")) - strpos($temp_US, "\">") - 2);
		
		$temp_USDJPY = substr($doc, strpos($doc, 'US Dollar', strpos($doc, 'historicalRateTable-wrap'))+0, 138);
//var_dump($temp_USDJPY);
		$Quote['JPYUSD'] = substr($temp_USDJPY, strpos($temp_USDJPY, "\">")+2, strpos($temp_USDJPY, "<", strpos($temp_USDJPY, "\">")) - strpos($temp_USDJPY, "\">") - 2);
		//var_dump(strrpos($temp_USDJPY, "\">"));
		$Quote['USDJPY'] = substr($temp_USDJPY, strrpos($temp_USDJPY, "\">")+2, strrpos($temp_USDJPY, "<", strrpos($temp_USDJPY, "\">")) - strrpos($temp_USDJPY, "\">") - 2);

		var_dump($Quote['JPYUSD']);
		var_dump($Quote['USDJPY']);


		$temp_TWDJPY = substr($doc, strpos($doc, 'Taiwan New Dollar', strpos($doc, 'historicalRateTable-wrap'))+0, 145);
var_dump($temp_TWDJPY);
		$Quote['JPYTWD'] = substr($temp_TWDJPY, strpos($temp_TWDJPY, "\">")+2, strpos($temp_TWDJPY, "<", strpos($temp_TWDJPY, "\">")) - strpos($temp_TWDJPY, "\">") - 2);
		//var_dump(strrpos($temp_USDJPY, "\">"));
		$Quote['TWDJPY'] = substr($temp_TWDJPY, strrpos($temp_TWDJPY, "\">")+2, strrpos($temp_TWDJPY, "<", strrpos($temp_TWDJPY, "\">")) - strrpos($temp_TWDJPY, "\">") - 2);

		var_dump($Quote['JPYUSD']);
		var_dump($Quote['USDJPY']);
		
		//var_dump($Quote['JP_Gold']);
		//$usd = pq($doc)->find('US Dollar');
		//<div class="historicalRateTable-wrap">
		//var_dump($usd);
		phpQuery::$documents = array();
	}
	public function getQuoteAt($date)
	{	
		var_dump($date);		//$date = "2016-10-10";
		$this->getGoldQuote($Quote, $date);
		$this->getRate($Quote, $date);
		return $Quote;
	}
}
?>