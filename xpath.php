<?php

class XPATH {

	public $dom, $xpath, $proxy;

	function __construct($url){
		set_time_limit(0);
		$html = $this->__curl($url);
		$this->dom = new DOMDocument();
		@$this->dom->loadHTML($html);
		$this->xpath = new DOMXPath($this->dom);

	}

	public function query($q){
		$result = $this->xpath->query($q);
		return $result;
	}

	public function preview($results){
		echo "<pre>";
		print_r($results);
		echo "<br>Node Values <br>";
		foreach($results as $result){
			echo trim($result->nodeValue) . '<br>';
			$array[] = $result;
		}
		if(is_array($array)){
			echo "<br><br>";
			print_r($array);
		}
	}

	private function __curl($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
		curl_setopt($ch, CURLOPT_AUTOREFERER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_FAILONERROR, true);

		$result = curl_exec($ch);
		if(!$result){
			echo "<br />cURL error number :" .curl_errno($ch);
			echo "<br />cURL error:" .curl_error($ch) . "on URL - " . $url;
			var_dump(curl_getinfo($ch));
			var_dump(curl_error($ch));
			exit;
		}
		return $result;
	}

	private function __getProxy(){
		$fh = fopen("../proxy.txt", 'r+');
		while(!feof($fh)){
			$proxies[] = trim(fgets($fh));
		}
		$proxy = $proxies[array_rand($proxies)]; // choose random proxy
		fclose($fh);
		return $proxy;
	}
}
?>
