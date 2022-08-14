<?php
$fileExtIcon = [
	'.bmp .jpg .png .tif .gif .pcx .tga .exif .fpx .svg .cdr .pcd .dxf .ufo .eps .ai .raw .wmf .webp .psd'		=> 'image',
	'.3gpp .3gp .ts .mp4 .mpeg .mpg .mov .webm .flv .m4v .mng .asx .asf .wmv .avi .mkv'							=> 'video',
	'.mid .midi .kar .mp3 .ogg .m4a .ra .acc .flac .ape .wma'													=> 'music',
	'.rar .zip .7z .arj .bz2 .cab .gz .iso .lz .lzh .tar .uue .xz .z .zipx .001 .lzma .cpio .bzip2 .gzip .tpz'	=> 'zip',
	'.eot .otf .fon .font .ttf .ttc .woff .woff2'																=> 'font',
	'.txt .log'																									=> 'text',
	'.conf .config .ini .inf .nfo'																				=> 'config',
	'.php .js .jsm .css .json .cpp .h .c .hh .hpp .hxx .cxx .cc .m .mm .vcxproj .vcproj .props .vsprops .manifest .java .cs .pas .pp .inc .ino'	=> 'code1',	// {}
	'.html .htm .shtml .shtm .hta .asp .aspx .jsp .php .xml .xhtml .xaml .yaml'									=> 'code2',							// </>
	'.sh .bsh .bash .bat .cmd .exe .dll .py .lua .pl .pm .nsi .nsh .vb .vbs'									=> 'app',
	'.sql .db .sqlite'																							=> 'db',
	'.pdf'																										=> 'pdf',
	'.apk'																										=> 'apk',
	
	'.doc .docm .docx .rtf'																						=> 'office_word',
	'.csv .xls .xlsx .xlsb .xlsm'																				=> 'office_excel',
	'.ppt .pptx .pptm'																							=> 'office_powerpoint',
];

if(!($path = realpath($config['filePath'] . ($path ?? '')))){
	$tip = '文件不存在';
}elseif(realpath(substr($path, 0, strlen($config['filePath']))) . DIRECTORY_SEPARATOR != realpath($config['filePath']) . DIRECTORY_SEPARATOR){
	$tip = '不允许的目录';
}

if(!isset($tips) && is_file($path)){
	header('Location: ' . str_replace(ROOT_PATH, '', realpath($config['filePath'])) . '/' . substr($path, strlen($config['filePath'])));
	die();
}

function getFiles($path){
	global $config, $fileExtIcon;
	
	$urlPath	= substr($path, strlen($config['filePath']));
	$files		= scandir($path);
	$result		= [];
	$pathInfo	= is_file($path . '/.pathinfo.json') ? json_decode(file_get_contents($path . '/.pathinfo.json'), true) : [];
	
	foreach($files as $file){
		if($file == '.' || $file == '..' || $file == '.pathinfo.json'){
			continue;
		}
		
		if(substr($file, -14) === '.filelink.json'){
			$result[] = array_merge([
				'ext'		=> '.link',
				'extIcon'	=> 'default',
				'name'		=> $file,
				'file'		=> $file,
				'date'		=> date('Y-m-d H:i:s', filemtime("$path/$file")),
				'from'		=> '-',
				'top'		=> false,
				'size'		=> '未知',
				'url'		=> '/',
				'target'	=> '_blank'
			], json_decode(file_get_contents("$path/$file"), true));
			
			continue;
		}
		
		$ext = strtolower(is_dir("$path/$file") ? 'dir' : (strrpos($file, '.') === false ? '' : substr($file, strpos($file, '.'))));
		$extIcon = 'default';
		
		if($ext === 'dir'){
			$extIcon = 'folder';
		}else{
			foreach($fileExtIcon as $type => $icon){
				if(strpos($type, $ext) !== false){
					$extIcon = $icon;
					break;
				}
			}
		}
		
		$result[] = [
			'ext'		=> $ext,
			'extIcon'	=> $extIcon,
			'name'		=> $file,
			'file'		=> $file,
			'date'		=> date('Y-m-d H:i:s', filemtime("$path/$file")),
			'from'		=> $pathInfo['file'][$file]['from'] ?? '未知',
			'top'		=> $pathInfo['file'][$file]['top'] ?? false,
			'size'		=> $ext === 'dir' ? count(scandir("$path/$file")) - 2 . '个文件' : formatSize(filesize("$path/$file")),
			'url'		=> url(($urlPath ? "/$urlPath" : '') . "/$file", 'pan.qwq.pink'),
			'target'	=> '_self'
		];
	}
	
	usort($result, function($a, $b){
		return strtolower($a['name']) <=> strtolower($b['name']);
	});
	
	usort($result, function($a, $b)use($pathInfo){
		return $a['top'] ? -1 : ($b['top'] ? 1 : 0);
	});
	
	usort($result, function($a, $b)use($pathInfo){
		return $a['ext'] == 'dir' ? -1 : ($b['ext'] == 'dir' ? 1 : 0);
	});
	
	return $result;
}

if(!($files = getFiles($path))){
	$tips = '该目录为空';
}
?>
<?php if(isset($tips)){ ?>
<center style="font-size:6vw; margin:10vh;"><?=$tips;?></center>
<?php }else{ ?>
<div class="table-responsive">
	<table class="file-list">
		<thead>
			<tr>
				<th>文件名</th>
				<th>日期</th>
				<th>提供者</th>
				<th>大小</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($files as $file){ ?>
			<tr>
				<td class="name"><a href="<?=$file['url']; ?>" target="<?=$file['target']; ?>"><div class="filetype filetype-<?=$file['extIcon']; ?>"></div> <?=$file['name']; ?></a></td>
				<td class="date"><?=$file['date']; ?></td>
				<td class="from"><?=$file['from']; ?></td>
				<td class="size"><?=$file['size']; ?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>
<?php } ?>
