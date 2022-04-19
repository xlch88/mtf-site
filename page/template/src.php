<div class="block block-pink">
	来源：<a href="<?=$url; ?>" target="_blank"><?=$url; ?></a><br/>
	<?php if($author){ ?>作者：<?=$author; ?><br/><br/><?php } ?>
	
	<?php if($type == 0){ ?>经原作者授权，本站对该内容进行转载。<?php } ?>
	<?php if($type == 1){ ?>经原作者授权，本站对该内容进行重新排版、收录并备份。<?php } ?>
	<?php if($type == 2){ ?>应原作者要求，本站对该内容进行重新排版、收录并备份。<?php } ?>
</div>