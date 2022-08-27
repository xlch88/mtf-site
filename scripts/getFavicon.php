<?php
$data = json_decode(file_get_contents(ROOT_PATH . '/assets/data/2345-lgbt.json'), true);

$domains = array_values(array_unique(array_map(function($link){
	return parse_url($link, PHP_URL_HOST);
}, array_column($data['links'], 'url'))));

$downloaded = scandir(ROOT_PATH . "/assets/img/site-logo/favicon/");
foreach($domains as $domain){
	foreach($downloaded as $file){
		if(str_starts_with($file, $domain)){
			continue 2;
		}
	}
	
	getFavicon($domain);
}

foreach($data['links'] as &$link){
	$domain = parse_url($link['url'], PHP_URL_HOST);
	foreach($downloaded as $file){
		if(str_starts_with($file, $domain)){
			$link['favicon'] = $file;
			continue 2;
		}
	}
}

file_put_contents(ROOT_PATH . '/assets/data/2345-lgbt.json', json_encode($data, JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT));

function getFavicon($domain){
	echo "https://$domain/ ";
	
	$data = proxyCurl("https://$domain/");
	
	$favicon = "https://$domain/favicon.ico";
	if($data){
		$data = str_replace(['<', "'"], ["\r\n<", '"'], preg_replace('/\s/', ' ', str_replace(["\r", "\n"], "", $data)));
		preg_match_all('/<link.*?rel="(icon|apple-touch-icon|shortcut icon)".*?>/', $data, $matches);
		
		$favicons = [];
		foreach($matches[0] as $match){
			preg_match_all('/.*?=".*?"/', str_replace(" ", "\r\n", $match), $matches2);
			
			$tmp = [
				'sizes'	=> '0x0'
			];
			foreach($matches2[0] as $match2){
				$match2 = explode('=', $match2);
				$tmp[$match2[0]] = substr($match2[1], 1, -1);
			}
			
			$favicons[] = $tmp;
		}
		
		array_multisort(array_column($favicons, 'sizes'), SORT_NATURAL, $favicons);
		if(count($favicons) >= 1){
			$favicon = $favicons[count($favicons) - 1]['href'];
			
			if(str_starts_with($favicon, '/')){
				$favicon = "https://$domain" . $favicon;
			}elseif(!str_starts_with($favicon, 'https://')){
				$favicon = "https://$domain/" . $favicon;
			}
		}
	}
	
	echo "$favicon ";
	
	if($data = proxyCurl($favicon)){
		$faviconPath = parse_url($favicon, PHP_URL_PATH);
		file_put_contents(ROOT_PATH . "/assets/img/site-logo/favicon/$domain." . substr($faviconPath, strripos($faviconPath, '.') + 1), $data);
		echo "OK";
	}
	
	echo "\r\n";
}

function proxyCurl($url, $proxy = '127.0.0.1:6565'){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_PROXY, '127.0.0.1:6565');
	curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
	curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	
	$retry = 0;
	$data = curl_exec($ch);
	while(curl_errno($ch) == 28 && $retry < 3){
		$data = curl_exec($ch);
		$retry++;
	}
	
	if($data === false){
		echo 'Curl error: ' . curl_error($ch) . '(' . curl_errno($ch) . ') ';
		return false;
	}
	curl_close($ch);
	
	$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	if($code != 200){
		echo "Curl error: $code ";
		return false;
	}
	
	return $data;
}
