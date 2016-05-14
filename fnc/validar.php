<?php
	session_start();
	if($_POST['nome']!=''){
		$nome = $_POST['nome'];
		$_SESSION['N'] = $nome;
	}else{
		$_SESSION['err'] = urlencode("Por favor, digite o seu nome.");
		header("Location: ../contato");
		exit;
	}
	if($_POST['email']!=''){
		$email = $_POST['email'];
		$_SESSION['E'] = $email;
	}else{
		$_SESSION['err'] = urlencode("Por favor, digite o seu e-mail.");
		header("Location: ../contato");
		exit;
	}
	if($_POST['assunto']!=''){
		$assunto = $_POST['assunto'];
		$_SESSION['A'] = $assunto;
	}else{
		$_SESSION['err'] = urlencode("Por favor, digite o assunto da mensagem.");
		header("Location: ../contato");
		exit;
	}
	if($_POST['mensagem']!=''){
		$mensagem = $_POST['mensagem'];
		$_SESSION['M'] = $mensagem;
	}else{
		$_SESSION['err'] = urlencode("Por favor, digite a sua mensagem.");
		header("Location: ../contato");
		exit;
	}
	$_SESSION['dds'] = urlencode("<strong>Dados enviados com sucesso!</strong><br>Abaixo seguem os dados que você enviou:<br><br><strong>Nome:</strong> $nome<br><strong>E-mail:</strong> $email<br><strong>Assunto:</strong> $assunto<br><strong>Mensagem:</strong> $mensagem");
	header("Location: ../contato");