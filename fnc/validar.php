<?php
	session_start();
	if($_POST['nome']!=''){
		$nome = $_POST['nome'];
		$_SESSION['N'] = $nome;
	}else{
		$_SESSION['err'] = utf8_encode("Por favor, digite o seu nome.");
		header("Location: ../Contato");
		exit;
	}
	if($_POST['email']!=''){
		$email = $_POST['email'];
		$_SESSION['E'] = $email;
	}else{
		$_SESSION['err'] = utf8_encode("Informe o seu e-mail.");
		header("Location: ../Contato");
		exit;
	}
	if($_POST['assunto']!=''){
		$assunto = $_POST['assunto'];
		$_SESSION['A'] = $assunto;
	}else{
		$_SESSION['err'] = utf8_encode("O assunto é requerido.");
		header("Location: ../Contato");
		exit;
	}
	if($_POST['mensagem']!=''){
		$mensagem = $_POST['mensagem'];
		$_SESSION['M'] = $mensagem;
	}else{
		$_SESSION['err'] = utf8_encode("Por favor, digite a sua mensagem.");
		header("Location: ../Contato");
		exit;
	}
	$_SESSION['dds'] = utf8_encode("<strong>Sua mensagem foi enviada com sucesso!</strong><br>Abaixo seguem os dados que você enviou:<br><br><strong>Nome:</strong> $nome<br><strong>E-mail:</strong> $email<br><strong>Assunto:</strong> $assunto<br><strong>Mensagem:</strong> $mensagem");
	header("Location: ../Contato");