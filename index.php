<?php
// 常量相关定义 ====================================================================
$envFile = isset($_SERVER['LOCAL_ADDR']) ? '.env.local' : '.env';
if(file_exists($envFile)){
	$env = explode("\n", file_get_contents($envFile));
	foreach($env as $line){
		$line = explode("=", $line);
		if(count($line) < 2) continue;
		defined($line[0]) or define($line[0], is_numeric($line[1]) ? (float)$line[1] : $line[1]);
	}
}
defined('DISABLE_REWRITE')	or define('DISABLE_REWRITE', false);
defined('ROOT_PATH')			or define('ROOT_PATH', dirname(__FILE__));

date_default_timezone_set('Asia/Shanghai');

// 配置文件读取 ====================================================================
$config				= include('config/website.php');
$urlRewrite			= include('config/rewriter.php');
$pageDatabase		= include('config/pageDatabase.php');
$domainDefaultPage	= $config['domainDefaultPage'];
$assetsVersion		= 20220818211700;

// CLI ===========================================================================
if(isset($argv)){
	$argv = array_slice($argv, 1);
	if (count($argv) < 1) {
		die("Usage: php index.php [function] [args]");
	}
	
	if($argv[0] == 'script'){
		if(count($argv) < 2){
			die("Usage: php index.php script <script>");
		}
		
		$file = ROOT_PATH . "/scripts/$argv[1].php";
		if(!file_exists($file)){
			die("Script not found: $file");
		}
		
		include $file;
	}
	
	die();
}

// 短链接相关处理 ===================================================================
$domain	= $_GET['domain'] ?? $_SERVER['HTTP_HOST'] ?? '';
$go		= $_GET['go'] ?? false;
if($urlRewriteInfo = ($urlRewrite[$go] ?? false)){
	switch($urlRewriteInfo['type']){
		case 'args':
			$_GET = array_merge($_GET, $urlRewriteInfo['args']);
			break;
		
		case '302':
			header('Location: ' . $urlRewriteInfo['url']);
			die();
		
		case '301':
			header("HTTP/1.1 301 Moved Permanently");
			header('Location: ' . $urlRewriteInfo['url']);
			die();
	}
}else if($go !== false && $domain !== 'pan.qwq.pink'){
	header('Content-Type: text/text; charset=utf-8');
	die('404 not found. 不要把你的脸bia在键盘上。');
}

$page	= $_GET['page'] ?? $domainDefaultPage[$domain] ?? 'mtf-index';
if($domain === 'pan.qwq.pink'){
	$path = $go;
}

$pageRewrite = [];
foreach($urlRewrite as $_url => $_info){
	if($_info['type'] === 'args' && isset($_info['args']['page'])){
		$pageRewrite[$_info['args']['page']] = $_url;
	}
}

// 页面数据库 ======================================================================
uasort($pageDatabase, function($a, $b){
	return strtotime($b['time']) - strtotime($a['time']);
});

if(!($pageInfo = ($pageDatabase[$page] ?? false))){
	header('Content-Type: text/text; charset=utf-8');
	die('404 not found. 不要瞎尝试。');
}

// 文件引入 ========================================================================
include('functions.php');
include('vendor/autoload.php');

// 某些特殊页面引入单独layout ========================================================
switch($page){
	case 'index':
		include('page/layout/index.php');
		break;
	
	case '2345':
		include('page/layout/2345.php');
		break;
		
	default:
		include('page/template/functions.php');
		include('page/layout/content.php');
		break;
}
