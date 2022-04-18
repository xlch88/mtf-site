<?php
$search = $_GET['search'] ?? '';

$pageDatabase = array_filter($pageDatabase, function($info, $key)use($search){
	if($key === 'dir') return false;
	if(!$search) return true;
	
	if(
		strpos($info['title'], $search) !== FALSE || 
		strpos($info['sub-title'], $search) !== FALSE || 
		strpos($info['time'], $search) !== FALSE
	){
		return true;
	}
	
	return false;
}, ARRAY_FILTER_USE_BOTH);
?>
<div class="search">
	<form>
		<input name="search" value="<?=htmlspecialchars($search); ?>" placeholder="在此键入内容以搜索..." />
		<button><i class="iconfont icon-search"></i></button>
	</form>
</div>
<?php if($pageDatabase){ ?>
	<div class="page-list">
		<?php foreach($pageDatabase as $key => $info){ ?>
		<div class="item">
			<a href="?page=<?=$key; ?>">
				<span class="page-list-title"><?=$info['title']; ?></span>
				<span class="page-list-sub-title"><?=strip_tags($info['sub-title']); ?></span>
				<span class="page-list-time">写于 <?=$info['time']; ?></span>
			</a>
		</div>
		<?php }  ?>
	</div>
<?php }else{ ?>
	<h1 style="text-align:center; padding:30px 0; ">_(:з)∠)_ 什么都没找到鸭...</h1>
<?php } ?>