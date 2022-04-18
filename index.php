<?php
$page = $_GET['page'] ?? 'dir';
$pageDatabase = include('page-database.php');

if(!($pageInfo = ($pageDatabase[$page] ?? false))){
	die('404 not found.');
}

include('page/layout/content.php');