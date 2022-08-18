<?php $urls = [
	'genderdysphoria'	=> [
		'title'	=> '这就是性别烦躁，供参考',
		'desc'	=> '性别烦躁指南是一份有生命的指南 |
					这个网站就是为了记录性别烦躁是如何表现的，并提供性别转变的一些资料，以便为那些正在质疑探索中的人、那些在跨性别道路上的人和单纯想成为盟友的人提供帮助。 |
					此网站的内容会随性别烦躁概念的扩大而增改内容。| 本指南是开源且由公众资助的项目， 非常欢迎您的贡献.',
		'url'	=> 'https://genderdysphoria.fyi/zh/'
	],
	'shizu-hrt-guide'	=> [
		'title'	=> 'Shizu\'s HRT Guide',
		'desc'	=> 'MtF HRT 资料 by shizu |
					这是一份关于跨性别激素治疗(HRT)的医学资料 |
					由于作者察觉到在亚洲，特别是中国的 MtF 圈子对这方面的 知识非常缺乏，所以就写了份个人认为可能有少许帮助的资料.希望一点小知识可以帮助随便用药的姐妹们. |
					同时也写有作者推荐的外国药商一列，可能在价钱上会比某 些姐妹的药商更便宜 (特别是比卡鲁胺)，有需要的话可以看看. |
					作者是日本人所以这份资料可能在中文语法上有些不流利， 请大家多多见谅.',
		'url'	=> 'https://docs.hrt.guide/'
	],
	'mtf-wiki'	=> [
		'title'	=> 'MtF Wiki',
		'desc'	=> '欢迎来到 MtF Wiki。这里是一个或许可以给部分跨性别女性群体提供帮助的地方。 |
					MtF Wiki 致力于成为一个免费开放且持续更新的跨性别知识整合站点，大家可以在这里了解到各种药物知识、医疗资源、女性常识，以及其他等等。',
		'url'	=> 'https://mtf.wiki/'
	],
	'mtf-baike'	=> [
		'title'	=> 'MtF 百科',
		'desc'	=> '非盈利性质的MtF Wiki的中国大陆镜像站，提供简/繁体中文和维语内容的国内镜像。(注:该站点所用服务器处于中国大陆境内，非不可抗力情况下会尽量保持正常运行)',
		'url'	=> 'https://wiki.qwq.pink/'
	],
	'oneamong_us'	=> [
		'title'	=> '那些秋叶 One Among Us',
		'desc'	=> '那些因为各种原因过早离开我们的生命，那些跨性别者和我们的顺性别伙伴们（allies），仍然是我们中的一员（one among us），在默默照顾着、陪伴着我们，赋予我们继续生活的勇气。或许现实中的纪念碑上写着的并不是 ta 们所中意的姓名，也未必体现了 ta 们真实的认同，但我们仍然可以在自己的纪念中实现这一切。',
		'url'	=> 'https://www.one-among.us/'
	],
	'joseika'	=> [
		'title'	=> 'MtF情報発信サイト',
		'desc'	=> '一个日本的MtF相关资讯网站 |
					性同質性障害・GID・MtFについて、情報を発信しているサイトです。',
		'url'	=> 'https://joseika.com/'
	],
	'hrt-cafe'	=> [
		'title'	=> 'HRT.CAFE',
		'desc'	=> '由海外HRT DIY社群整理的HRT药商索引（不出售药物，仅展示信息），纯英文网站，不保证在国内可用。
					(注:请自行评估购买风险)',
		'url'	=> 'https://hrt.cafe/'
	],
]; ?>
<div class="img-text-list">
	<?php foreach($urls as $id => $info){ ?>
	<a class="item" href="<?=$info['url']; ?>" target="_blank">
		<div class="img">
			<img src="/assets/img/site-logo/<?=$id; ?>.png" alt="<?=$info['title']; ?>">
		</div>
		<div class="info">
			<div class="info-title"><?=$info['title']; ?></div>
			<div class="info-url"><?=substr(str_replace(['https://', 'http://'], '', $info['url']), 0, strpos(str_replace(['https://', 'http://'], '', $info['url']), '/'));?></div>
			<div class="info-desc"><?=$info['desc']; ?></div>
		</div>
	</a>
	<?php } ?>
</div>

<center class="white-box" style="margin: 50px 0">
	🪞 以下内容镜像自
	<a href="https://2345.lgbt/" target="_blank" title="2345.lgbt">
		<div class="logo-2345-lgbt"><span></span><span></span><span></span><span></span><span></span></div>
	</a>
	🪞
</center>

<?php template_markdown('2345-lgbt.md'); ?>
