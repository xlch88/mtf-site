<?php
$go = $_GET['go'] ?? false;
$urlRewrite = include('url-rewrite.php');
if($urlRewriteInfo = ($urlRewrite[$go] ?? false)){
	switch($urlRewriteInfo['type']){
		case 'args':
			$_GET = array_merge($_GET, $urlRewriteInfo['args']);
			break;
		
		case '302':
			header('Location: ' . $urlRewriteInfo['url']);
			die();
			break;
			
		case '301':
			header("HTTP/1.1 301 Moved Permanently");
			header('Location: ' . $urlRewriteInfo['url']);
			die();
			break;
	}
}else if($go !== false){
	header('Content-Type: text/text; charset=utf-8');
	die('404 not found. 不要把你的脸bia在键盘上。');
}

$page = $_GET['page'] ?? 'dir';
$pageDatabase = include('page-database.php');

uasort($pageDatabase, function($a, $b){
	return StrToTime($b['time']) - strtotime($a['time']);
});

if(!($pageInfo = ($pageDatabase[$page] ?? false))){
	header('Content-Type: text/text; charset=utf-8');
	die('404 not found. 不要瞎尝试。');
}

include('page/template/functions.php');
include('page/layout/content.php');