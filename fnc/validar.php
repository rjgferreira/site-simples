<?php
	session_start();
	if($_POST['nome']!=''){
		$nome = $_POST['nome'];
		$_SESSION['N'] = $nome;
	}else{
		$err = urlencode("Por favor, digite o seu nome.");
		header("Location: ../?pg=contato&err=$err");
		exit;
	}
	if($_POST['email']!=''){
		$email = $_POST['email'];
		$_SESSION['E'] = $email;
	}else{
		$err = urlencode("Por favor, digite o seu e-mail.");
		header("Location: ../?pg=contato&err=$err");
		exit;
	}
	if($_POST['assunto']!=''){
		$assunto = $_POST['assunto'];
		$_SESSION['A'] = $assunto;
	}else{
		$err = urlencode("Por favor, digite o assunto da mensagem.");
		header("Location: ../?pg=contato&err=$err");
		exit;
	}
	if($_POST['mensagem']!=''){
		$mensagem = $_POST['mensagem'];
		$_SESSION['M'] = $mensagem;
	}else{
		$err = urlencode("Por favor, digite a sua mensagem.");
		header("Location: ../?pg=contato&err=$err");
		exit;
	}
	$dds = urlencode("<strong>Dados enviados com sucesso!</strong><br>Abaixo seguem os dados que você enviou:<br><br><strong>Nome:</strong> $nome<br><strong>E-mail:</strong> $email<br><strong>Assunto:</strong> $assunto<br><strong>Mensagem:</strong> $mensagem");
	session_destroy();
	header("Location: ../?pg=contato&dds=$dds");