<?php
use League\CommonMark\GithubFlavoredMarkdownConverter;

function template_src($url, $author = false, $type = 0){
	include('page/template/src.php');
}

function template_markdown($file, $type = 'file'){ ?>
	<div class="markdown-body">
		<?php
		echo (new GithubFlavoredMarkdownConverter([
			'html_input' => 'strip',
			'allow_unsafe_links' => false,
		]))->convert($type == 'file' ? file_get_contents('assets/markdown/' . $file) : $file);
		?>
	</div>
<?php }
