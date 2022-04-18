window.onload = function(){
	const content_viewers = [];
	document.querySelectorAll('.img-preview-list').forEach(dom => {
		content_viewers.push(new Viewer(dom));
	});
	
	console.log('meow~');
}