<?php
	session_start();
	$rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	$path = urldecode(substr($rota['path'], 1));
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Administra&ccedil;&atilde;o - Site Simples</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/css.css">
</head>
<body>
<div class="container">
	<nav class="navbar navbar-default">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">ADM Site simples</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="/admin">Listar p&aacute;ginas</a></li>
			</ul>
			<form action="../fnc/logar.php" method="post" style="float:right;margin-top:8px;">
				<button type="submit" class="btn btn-warning" >Sair</button>
				<input type="hidden" name="sair" value="TRUE">
			</form>
		</div>
	</nav>

<?php
	if($path=='admin')
		require_once("pgs/listar.php");
	else if($path=='admin/editar')
		require_once("pgs/editar.php");
?>
	<footer class="footer">
		<p>Todos os direitos resevados - <?php echo date('Y'); ?></p>
	</footer>
</div>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script>
	<?php if($path=='') echo '$("ul li").eq(0).addClass("active");'; ?>
	<?php if($path=='Contato')
	 		if(isset($_SESSION['N']))
	 			echo "$('input[name*=\"nome\"]').val('".$_SESSION['N']."');";
	 		if(isset($_SESSION['E']))
	 			echo "$('input[name*=\"email\"]').val('".$_SESSION['E']."');";
	 		if(isset($_SESSION['A']))
	 			echo "$('input[name*=\"assunto\"]').val('".$_SESSION['A']."');";
	 		if(isset($_SESSION['M']))
	 			echo "$('input[name*=\"mensagem\"]').val('".$_SESSION['M']."');";
	 ?>
</script>
</body>
</html>