<?php
use League\CommonMark\GithubFlavoredMarkdownConverter;

function template_src($url, $author = false, $type = 0){
	include('page/template/src.php');
}

function template_markdown($file){ ?>
	<div class="markdown-body">
		<?php
		echo (new GithubFlavoredMarkdownConverter([
			'html_input' => 'strip',
			'allow_unsafe_links' => false,
		]))->convert(file_get_contents('assets/markdown/' . $file));
		?>
	</div>
<?php }
