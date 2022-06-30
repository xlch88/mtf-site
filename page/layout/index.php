<!DOCTYPE html>
<html lang="cn">
	<head>
		<meta charset="UTF-8" />
		<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport" />
		<title>QwQ !</title>
		<link href="/assets/style/index.css?v=<?=$assetsVersion; ?>" rel="stylesheet" />
	</head>
	<body>
		<section id="main">
			<div></div><div></div><div></div><div></div><div></div>
		</section>
		
		<section id="readme" style="opacity: 0">
			<div class="text">
				<h1>这不是空壳网站 :)</h1>
				<p>这个域名是用来做网址缩短( 类似 t.cn / url.cn )，以及部分静态资源的存放，<b>故没有做首页的必要</b>。</p>
				<p>请XX云备案审核人员、通讯管理局备案审核人员，高抬贵手。您工作辛苦了。这真的不是空壳网站。</p>
				
				<h1>备案号在右下角 :)</h1>
				<p>虽然我想让这个页面什么内容都不要有。但是按照规定，所有备案的网站都需要添加备案号，并且链接至工信部网站。</p>
				<p>虽然在页面加上这些东西会显得很丑、很突兀，但是我还是不得不加上了。</p>
				<p>嗯，按照你们的规定，备案号不需要后缀序号，并且要指向工信部网站，我已经按要求做了。</p>
				
				<h1>感谢您看完这些废话 :)</h1>
				<p>希望我说的这些废话能起点作用。</p>
				<p>每次网站备案都让我感到身心俱疲，希望这次能顺利一点。</p>
				
				<center>
					<button onclick="removeTips();">关闭并移除提示条</button>
				</center>
			</div>
		</section>
		
		<footer>
			<div class="links">
				<a href="https://beian.miit.gov.cn/" target="_blank">粤ICP备20071575号</a>
				<a href="javascript:switchReadme()">⚠ 备案工作人员请阅</a>
			</div>
		</footer>
		
		<script>
			(() => {
				let s = false;
				window.switchReadme = () => {
					s = !s;
					document.getElementById("readme").style.opacity = s ? 1 : 0;
				};
		
				window.removeTips = () => {
					document.getElementById("readme").remove();
					document.getElementsByTagName('footer')[0].remove();
				};
			})();
		</script>
	</body>
</html>
