window.onload = function () {
	const content_viewers = [];
	document.querySelectorAll(".img-preview-list").forEach((dom) => {
		content_viewers.push(new Viewer(dom));
	});

	if (history.length <= 1) {
		document.getElementById("back").remove();
	}

	console.log(
		"%c\r\n MtF-Site 🏳️‍⚧️ MtF小站 \r\n\r\n%cDeveloped by Dark495 / 悦咚 © 2022\r\n\r\n%cAuthor\t: https://dark495.me\r\nTwitter\t: https://twitter.com/YueDongQwQ\r\nGithub\t: https://github.com/xlch88/mtf-site\r\n",
		"padding:10px 0;font-size:50px;color:#fff;font-weight:bold;background-image:linear-gradient(316deg, #83cbff, #ffb2ff);font-family:'Microsoft JHengHei'",
		"color:deepskyblue;font-size:26px;font-family:'Microsoft JHengHei'",
		"color:#000;font-size:20px;font-family:'Microsoft YaHei'"
	);
};
