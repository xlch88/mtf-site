<?php
function url($args = [], $domain = null){
	global $pageRewrite;
	
	$path = '/';
	if(is_string($args)){
		if(substr($args, 0, 1) == '/'){
			$path = $args;
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
