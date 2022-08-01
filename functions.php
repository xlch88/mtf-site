<?php
function url($args = [], $domain = null){
	global $pageRewrite;
	
	$path = '/';
	if(is_string($args)){
		if(substr($args, 0, 1) == '/'){
			$path = $args;
			$args = [];
		}else{
			$args = [ 'page' => $args ];
		}
	}
	
	if(isset($args['page']) && isset($pageRewrite[$args['page']])){
		$path = $pageRewrite[$args['page']];
		unset($args['page']);
	}
	
	if(DISABLE_REWRITE){
		$args['domain'] = $domain;
		if($path != '/'){
			$args['go'] = $path;
			$path = '/';
		}
		$domain = null;
	}
	
	return ($domain ? "https://$domain" : '') . $path . ($args ? '?' . http_build_query($args) : '');
}

function formatSize($fileSize) {
	$size = sprintf('%u', $fileSize);
	if($size == 0){
		return('0 Bytes');
	}
	
	$sizename = [' Bytes', ' KB', ' MB', ' GB', ' TB', ' PB', ' EB', ' ZB', ' YB'];
	return round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . $sizename[$i];
}
