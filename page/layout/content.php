 <!DOCTYPE html>
 <html>
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport" />
		<title><?=$pageInfo['title']; ?> - <?=strip_tags($pageInfo['sub-title']); ?> | MtF 小站 - By.悦咚@YueDongQwQ</title>
		<link rel="stylesheet" href="/assets/css/main.css?r=<?=time(); ?>">
		<link rel="stylesheet" href="/assets/vendor/viewer.js/viewer.min.css">
		<link rel="stylesheet" href="//at.alicdn.com/t/font_3336549_p6hxmbr834.css">
		
	</head>
	<body>
		<div class="container">
			<section id="content">
				<h1 class="title"><?=$pageInfo['title']; ?></h1>
				<h2 class="sub-title"><?=$pageInfo['sub-title']; ?> | 写于 <?=$pageInfo['time'];?></h2>

				<?php include('page/' . $page . '.php'); ?>
				<?php if($page != 'dir' || ($search ?? '') != ''){  ?>
				<h2 style="text-align:center;"><a href="javascript:history.go(-1)"><i class="iconfont icon-back"></i> 返回</a></h2>
				<?php } ?>
				
				<hr/>
				
				<p>这是一个跨性别相关文章的存储/备份网站。部分内容转载于互联网，具体来源请见文章开头，如有侵权请联系dark495@moesys.cn</p>
				<p>
					相关链接: 
					<a target="_blank" href="https://mtf.wiki/">MtF.Wiki</a>(<a target="_blank" href="https://wiki.qwq.pink/">国内镜像</a>) |
					<a target="_blank" href="https://wiki.qwq.pink/zh-cn/docs/useful-info/colloquialism/">通俗用语表</a> |
					<a target="_blank" href="https://wiki.qwq.pink/zh-cn/docs/useful-info/abbreviation/">缩写词语表</a> |
					<a target="_blank" href="https://www.pixiv.net/artworks/89245990">背景图PID:89245990</a> | 
					<a target="_blank" href="https://github.com/xlch88/mtf-site">Github</a>
				</p>
			</section>
		</div>
		
		<section id="author" onclick="alert('Twitter:@YueDongQwQ')">
			<img src="https://q1.qlogo.cn/g?b=qq&s=640&nk=787700998" alt="噔噔咚" title="噔噔咚" />
			<p>By.悦咚</p>
		</div>
		
		<script src="/assets/vendor/viewer.js/viewer.min.js"></script>
		<script src="/assets/js/main.js?r=<?=time(); ?>"></script>
	</body>
</html>