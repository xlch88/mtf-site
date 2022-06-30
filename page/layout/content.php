 <!DOCTYPE html>
 <html lang="cn">
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport" />
		<title><?=$pageInfo['title']; ?> - <?=strip_tags($pageInfo['sub-title']); ?> | MtF 小站 - By.悦咚@YueDongQwQ</title>
		<link rel="stylesheet" href="/assets/style/main.css?v=<?=$assetsVersion; ?>">
		<link rel="stylesheet" href="/assets/vendor/viewer.js/viewer.min.css">
		<link rel="stylesheet" href="/assets/vendor/iconfont/iconfont.css?v=<?=$assetsVersion; ?>">
	</head>
	
	<body>
		<div class="container">
			<section id="content">
				<h1 class="title"><?=$pageInfo['title']; ?></h1>
				<h2 class="sub-title"><?=$pageInfo['sub-title']; ?> | 写于 <?=$pageInfo['time'];?></h2>

				<?php include('page/' . $page . '.php'); ?>
				
				<?php if(!in_array($page, ['mtf-index'])){  ?>
					<h2 class="url-explode" style="margin:10px 0 25px 0 !important;">
						<?php if(!in_array($page, ['files', 'urls', 'dir']) || ($page == 'dir' && ($search ?? '') != '')){ ?>
							<a href="javascript:history.go(-1)" id="back"><i class="iconfont icon-fanhui"></i> 返回</a><br/><br/>
						<?php } ?>
						<a href="<?=url('dir', 'mtf.qwq.pink'); ?>"><i class="iconfont icon-sucai"></i> 文章</a> |
						<a href="<?=url(domain: 'pan.qwq.pink'); ?>"><i class="iconfont icon-16"></i> 文件</a> |
						<a href="<?=url(domain: 'go.qwq.pink'); ?>"><i class="iconfont icon-wangzhi_huaban"></i> 导航</a>
					</h2>
				<?php } ?>

				<?php if($page === 'urls'){ ?>
					<div class="content-tips">
						<p>这里收录了部分跨性别相关的网站，希望能帮到您~</p>
						<p>如果您还有其他的网站可以推荐，请在<a href="https://github.com/xlch88/mtf-site" target="_blank">Github</a>发起<a href="https://github.com/xlch88/mtf-site/blob/main/page/urls.php" target="_blank">Pull Request</a>或者Issues。</p>
					</div>
				<?php }elseif($page === 'files'){ ?>
					<div class="content-tips">
						<p>这里存储了一些有用的文件，希望能帮到您~</p>
						<p>如果您需要上传其他文件，请在<a href="https://github.com/xlch88/mtf-site" target="_blank">Github</a>发起<a href="https://github.com/xlch88/mtf-site/blob/main/page/files.php" target="_blank">Pull Request</a>或者Issues。</p>
					</div>
				<?php }elseif($page === 'mtf-index'){ ?>
					<div class="content-tips">
						<p>
							这是一个跨性别相关内容的存储/备份网站。<br/>
							部分内容转载于互联网，具体来源请见页面开头，如有侵权和任何疑问请在<a href="https://github.com/xlch88/mtf-site" target="_blank">Github</a>发起Issues。
						</p>
					</div>
				<?php }else{ ?>
					<div class="content-tips">
						<p>
							这是一个跨性别相关文章的存储/备份网站。<br/>
							部分内容转载于互联网，具体来源请见文章开头，如有侵权和任何疑问请在<a href="https://github.com/xlch88/mtf-site" target="_blank">Github</a>发起Issues。
						</p>
						<p class="url-explode">
							<a target="_blank" href="https://mtf.wiki/">MtF.Wiki</a>(<a target="_blank" href="https://wiki.qwq.pink/">国内镜像</a>) |
							<a target="_blank" href="https://wiki.qwq.pink/zh-cn/docs/useful-info/colloquialism/">通俗用语表</a> |
							<a target="_blank" href="https://wiki.qwq.pink/zh-cn/docs/useful-info/abbreviation/">缩写词语表</a> |
							<a target="_blank" href="https://github.com/xlch88/mtf-site">Github</a>
						</p>
					</div>
				<?php } ?>
			</section>
		</div>
		
		<footer class="url-explode">
			<big>
				<a href="https://twitter.com/YueDongQwQ" target="_blank"><i class="iconfont icon-twitter"></i></a> /
				<a href="https://github.com/xlch88/mtf-site" target="_blank"><i class="iconfont icon-github"></i></a> /
				<a href="mailto:dark495@moesys.cn" target="_blank"><i class="iconfont icon-email"></i></a>
			</big><br/>
			Copyright (C) 2022 MtF-Site.<br/>
			<small>
				Designed By <a target="_blank" href="https://dark495.me/">Dark495 / 悦咚</a> with ❤ 2022
			</small>
		</footer>
		
		<script src="/assets/vendor/viewer.js/viewer.min.js"></script>
		<script src="/assets/js/main.js?v=<?=$assetsVersion; ?>"></script>
	</body>
</html>
