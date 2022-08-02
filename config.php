<?php
return [
	'pageDatabase'	=>  [
		'index'			=> [
			'title'			=> '首页',
			'sub-title'		=> '蓝粉白旗帜/应付备案的首页',
			'time'			=> '2022-06-29'
		],
		'urls'			=> [
			'title'			=> '跨性别相关内容导航',
			'sub-title'		=> '收录跨性别相关网站/资料/链接',
			'time'			=> '2022-06-29'
		],
		'mtf-index'			=> [
			'title'			=> 'MtF小站 - 首页',
			'sub-title'		=> '这里是MtF小站~ 记录与存储跨性别相关内容',
			'time'			=> '2022-06-29'
		],
		'dir'			=> [
			'title'			=> 'MtF小站 - 文章',
			'sub-title'		=> '存储/备份跨性别相关文章',
			'time'			=> '2022-04-13'
		],
		'files'			=> [
			'title'			=> 'MtF小站 - 文件',
			'sub-title'		=> '存储/备份跨性别相关文件',
			'time'			=> '2022-06-29'
		],
		'how-to-be-trans-friendly'	=> [
			'title'			=> '如何跨性别友善',
			'sub-title'		=> '本文旨在给出一些基础的建议，将你友跨的愿望落实的实践之中',
			'time'			=> '2022-04-18'
		],
		'short-urls'	=> [
			'title'			=> '一些短链接',
			'sub-title'		=> '主站<a href="https://qwq.pink" target="_blank">qwq.pink</a>打开后可以快速的显示一个蓝粉白旗,不过颜色会柔一点',
			'time'			=> '2022-04-19 00:01:00'
		],
		'backup-zhihu-001'	=> [
			'title'			=> '知乎回答备份：如何看待蜜雪冰城违法雇佣童工被罚 1.25 万元？企业违法雇佣童工需要承担哪些法律责任？',
			'sub-title'		=> '作者：寒涟漪 于2022年4月19日备份自知乎',
			'time'			=> '2022-04-19 16:26:01'
		],
		'backup-zhihu-002'	=> [
			'title'			=> '知乎回答备份：mtf有上岸的吗？',
			'sub-title'		=> '作者：寒涟漪 于2022年4月19日备份自知乎',
			'time'			=> '2022-04-19 16:26:02'
		],
		'backup-zhihu-003'	=> [
			'title'			=> '知乎回答备份：跟抑郁症患者恋爱是什么感受？',
			'sub-title'		=> '作者：寒涟漪 于2022年4月19日备份自知乎',
			'time'			=> '2022-04-19 16:26:03'
		],
		'backup-zhihu-004'	=> [
			'title'			=> '知乎回答备份：如何更好去理解跨性别者 如何帮助跨性别者恢复正常?',
			'sub-title'		=> '作者：寒涟漪 于2022年4月19日备份自知乎',
			'time'			=> '2022-04-19 16:26:04'
		],
		'backup-zhihu-005'	=> [
			'title'			=> '知乎回答备份：如何看待未成年的跨性别女性?',
			'sub-title'		=> '作者：寒涟漪 于2022年4月19日备份自知乎',
			'time'			=> '2022-04-19 16:26:05'
		],
		'backup-zhihu-006'	=> [
			'title'			=> '知乎回答备份：跨性别者应该如何应对领导对你提出的形象要求?',
			'sub-title'		=> '作者：寒涟漪 于2022年4月19日备份自知乎',
			'time'			=> '2022-04-19 16:26:06'
		],
		'backup-zhihu-007'	=> [
			'title'			=> '知乎回答备份：为什么医学上对跨性别者的治疗倾向于改变生理性别，而不是改变心理性别？',
			'sub-title'		=> '作者：寒涟漪 于2022年4月19日备份自知乎',
			'time'			=> '2022-04-19 16:26:07'
		],
		'backup-zhihu-008'	=> [
			'title'			=> '社群危机（自杀）干预手册（持续更新）',
			'sub-title'		=> '作者：寒涟漪 于2022年4月19日备份自知乎',
			'time'			=> '2022-04-19 16:26:08'
		],
	],
	'urlRewrite'	=> [
		// 302 -------------------------------------------------------------------------------
		'/tsf'	=> [
			'type'	=> '302',
			'url'	=> 'https://mtf.qwq.pink/transfriendly'
		],
		'/wiki'	=> [
			'type'	=> '302',
			'url'	=> 'https://wiki.qwq.pink/'
		],
		'/mtf'	=> [
			'type'	=> '302',
			'url'	=> 'https://mtf.qwq.pink/'
		],
		'/sx'	=> [
			'type'	=> '302',
			'url'	=> 'https://wiki.qwq.pink/zh-cn/docs/useful-info/abbreviation/'
		],
		'/yy'	=> [
			'type'	=> '302',
			'url'	=> 'https://wiki.qwq.pink/zh-cn/docs/useful-info/colloquialism/'
		],
		'/hrt'	=> [
			'type'	=> '302',
			'url'	=> 'https://wiki.qwq.pink/zh-cn/docs/medicine/overview/'
		],
		
		// page -------------------------------------------------------------------------------
		'/transfriendly'	=> [
			'type'	=> 'args',
			'args'	=> [
				'page'	=> 'how-to-be-trans-friendly'
			]
		],
		'/pages'	=> [
			'type'	=> 'args',
			'args'	=> [
				'page'	=> 'dir'
			]
		],
		'/urls'	=> [
			'type'	=> 'args',
			'args'	=> [
				'page'	=> 'short-urls'
			]
		],
		'/危机干预'	=> [
			'type'	=> 'args',
			'args'	=> [
				'page'	=> 'backup-zhihu-008'
			]
		],
	],
	'domainDefaultPage'	=> [
		'qwq.pink'		=> 'index',
		'mtf.qwq.pink'	=> 'mtf-index',
		'doc.qwq.pink'	=> 'dir',
		'go.qwq.pink'	=> 'urls',
		'pan.qwq.pink'	=> 'files',
	],
	'filePath'			=> ROOT_PATH . '/assets/files/',
];
