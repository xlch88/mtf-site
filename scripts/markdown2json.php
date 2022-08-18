<?php
$markdown = file_get_contents(ROOT_PATH . '/assets/markdown/2345.lgbt/README.md');
$markdown = explode("\n", $markdown);
$markdown = array_slice($markdown, 2); // remove logo

$config = include('config/2345.php');

// 数据结构
$categoryDefault = [
	'name'			=> '',
	'parent'		=> null,
	'renderType'	=> 'normal'
];
$linkDefault = [
	'name'			=> '',
	'url'			=> 'https://',
	'description'	=> '',
	'category'		=> '默认',
	'subCategory'	=> null,
	'tags'			=> []
];

// 描述自动转为标签
$tagKeywords = [
	'lang'		=> [
		'日语', '英语', '法语', '繁体中文', '简体中文'
	],
	'country'	=> [
		'香港', '台湾', '中国大陆', '日本', '韩国', '美国', '英国', '法国', '德国', '意大利', '西班牙', '俄罗斯', '荷兰', '澳大利亚', '加拿大'
	],
	'assets-type'		=> [
		'电子书'
	]
];

// store
$categories = [];
$links = [];

// tmp
$nowCategory = null;
$nowSubCategory = null;
$nowLink = null;

foreach($markdown as $line => $row){
	$row = rtrim($row);
	
	// 跳过空行
	if($row == '') continue;
	
	// 链接
	if(str_starts_with(trim($row), '- [')){
		if(preg_match('/- \[(.*?)\]\((.*?)\)(.*)/', $row, $matches)){
			$nowLink = array_merge($linkDefault, [
				'name'			=> $matches[1],
				'url'			=> $matches[2],
				'description'	=> $matches[3],
				'category'		=> $nowCategory ? $nowCategory['name'] : null,
				'subCategory'	=> $nowSubCategory ? $nowSubCategory['name'] : null,
				'tags'			=> []
			], $config['link'][$matches[2]] ?? []);
			
			foreach($tagKeywords as $key => $keywords){
				foreach($keywords as $keyword){
					if(str_contains($nowLink['description'], $keyword)){
						$nowLink['description'] = preg_replace("/(\（$keyword\）|${keyword}，|，$keyword)/", '', $nowLink['description'], 1);
						$nowLink['tags'][] = "$key:$keyword";
					}
				}
			}
			
			if(str_starts_with($nowLink['description'], '（')){
				$nowLink['description'] = mb_substr($nowLink['description'], 1);
			}
			if(str_ends_with($nowLink['description'], '）')){
				$nowLink['description'] = mb_substr($nowLink['description'], 0, -1);
			}
			
			$links[] = $nowLink;
			continue;
		}
	}
	
	// 一级目录
	if(str_starts_with($row, '## ')){
		$nowLink = null;
		$nowSubCategory = null;
		
		$categoryName = substr($row, 3);
		$nowCategory = array_merge($categoryDefault, [
			'name'	=> $categoryName,
		], $config['category'][$categoryName] ?? []);
		$categories[$categoryName] = $nowCategory;
		
		continue;
	}
	
	// 二级目录
	if((str_starts_with($row, '- ') && substr($row, 3, 1) != '[') || str_starts_with($row, '### ')){
		if(!$nowCategory){
			print_r("没有父目录: line = $line, row = $row\n");
			continue;
		}
		
		$nowLink = null;
		
		$categoryName = trim(str_starts_with($row, '- ') ? substr($row, 2) : substr($row, 4));
		$nowSubCategory = array_merge($categoryDefault, [
			'name'		=> $categoryName,
			'parent'	=> $nowCategory['name'],
		], $config['category'][$categoryName] ?? []);
		$categories[$categoryName] = $nowSubCategory;
		
		continue;
	}
	
	// 分类的描述
	if($nowCategory && !in_array(substr($row, 0, 1), ['-', '#', '>'])){
		$nowCategory['description'] = $row;
		continue;
	}
	
	// 无法识别？
	print_r("无法识别: line = $line, row = $row\n");
}

file_put_contents(ROOT_PATH . '/assets/data/2345-lgbt.json', json_encode([
	'categories'	=> $categories,
	'links'			=> $links
], JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT));
