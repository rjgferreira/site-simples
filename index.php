<?php
	session_start();
	if(isset($_GET['pg'])){
		switch($_GET['pg']){
			case 'home':
			case 'empresa':
			case 'produtos':
			case 'servicos':
			case 'contato':
				$pagina = $_GET['pg'];
			break;
			default:
				$pagina = 'home';
		}
	}else
		$pagina = 'home';
	require_once('req/header.php');
	require_once('req/menu.php');
	require_once("pgs/$pagina.php");
	require_once('req/footer.php');
