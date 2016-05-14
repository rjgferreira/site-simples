<?php
	session_start();
	$rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	$path = substr($rota['path'], 1);
	require_once('req/header.php');
	require_once('req/menu.php');
	$pgs = array('home','empresa','produtos','servicos','contato');
	$_SESSION['X']=0;
	$vrfy = function($v) use($path){
		if($path==''){
			$_SESSION['X']++;
			require_once("pgs/home.php");
		}else if($v==$path && is_file("pgs/".$path.".php")){
			$_SESSION['X']++;
			require_once("pgs/".$path.".php");
		}
		return false;
	};
	array_walk($pgs, $vrfy);
	if($_SESSION['X']==0)
		require_once("pgs/404.php");
	require_once('req/footer.php');