<?php
	session_start();
	require_once"fnc/conexaoDB.php";
	$_SESSION['STTS_URL']=FALSE;
	$rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	$path = urldecode(substr($rota['path'], 1));
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Site Simples</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="css/css.css">
</head>
<body>
<div class="container">
	<nav class="navbar navbar-default">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Site simpes</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav" style="margin-top:7px;">
				<?php
				$conexao = conexaoDB();
				$sql = "SELECT pag_botao FROM paginas";
				$stmt = $conexao->prepare($sql);
				$stmt->execute();
				$pgs = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach($pgs as $btn){
					echo "\t\t\t\t\t".'<li class="'.($btn['pag_botao']==$path?'active':'').'"><a href="/'.$btn['pag_botao'].'">'.$btn['pag_botao'].'</a></li>';
				}
				?>
			</ul>
			<form class="navbar-form navbar-right" role="search" action="fnc/pesquisar.php" method="post">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Pesquisar" name="busca">
					<input type="hidden" name="pg" value="<?=$path?>">
				</div>
				<button type="submit" class="btn btn-default">OK</button>
			</form>
		</div>
	</nav>

<?php
// Verifica e trata resultados de pesquisa
if(isset($_SESSION['RESULT'])) {
	if(is_array($_SESSION['RESULT'])){
		if(!empty($_SESSION['RESULT'])) {
			echo '<h3>Resultados da pesquisa</h3>';
			foreach ($_SESSION['RESULT'] as $result) {
				echo '<p class="bg-info" style="padding:10px;"><a href="/' . $result['pag_botao'] . '">' . $result['pag_titulo'] . '</a><br><span>' . $result['pag_chamada'] . '</span></p>';
			}
		}else{
			echo "<div class=\"alert alert-warning\">A pesquisa não obteve resultado para o termo utilizado. Por favor, tente novamente.</div>";
		}
	}else{
		echo '<div class="alert alert-warning">'.$_SESSION['RESULT'].'</div>';
	}
	unset($_SESSION['RESULT']);
}
// Verifica a URL solicitada para leitura do conteúdo correspondente
if($path!='') {
	$vrfy = function ($v) use ($path) {
		if ($v['pag_botao'] == $path) {
			$_SESSION['STTS_URL'] = TRUE;
		}else{
			return false;
		}
		return false;
	};

	array_walk($pgs, $vrfy);

	if($_SESSION['STTS_URL']==FALSE) {
		require_once("pgs/404.php");
	}else{
		$sql = "SELECT pag_titulo, pag_chamada, pag_conteudo_html FROM paginas WHERE pag_botao = :btn";
		$stmt = $conexao->prepare($sql);
		$stmt->bindParam(":btn",$path);
		$stmt->execute();
		$pg = $stmt->fetch(PDO::FETCH_ASSOC);
		?>
	<div class="jumbotron">
		<h1><strong><?=$pg['pag_titulo']?></strong></h1>
		<p class="lead"><?=$pg['pag_chamada']?></p>
	</div>
<?php
		if($path=='Contato'){
			if(isset($_SESSION['dds'])){
				echo '<div class="alert alert-info">'.urldecode($_SESSION['dds']).'</div>';
				unset($_SESSION['N'],$_SESSION['E'],$_SESSION['A'],$_SESSION['M'],$_SESSION['err'],$_SESSION['dds']);
			}
			if(isset($_SESSION['err'])) {
				echo '<div class="alert alert-danger">' . urldecode($_SESSION['err']) . '</div>';
				unset($_SESSION['err']);
			}
		}
		echo $pg['pag_conteudo_html'];
	}
}else{
	$sql = "SELECT pag_titulo, pag_chamada, pag_conteudo_html FROM paginas WHERE pag_id = 1";
	$stmt = $conexao->prepare($sql);
	$stmt->execute();
	$pg = $stmt->fetch(PDO::FETCH_ASSOC);
	?>
	<div class="jumbotron">
		<h1><strong><?=$pg['pag_titulo']?></strong></h1>
		<p class="lead"><?=$pg['pag_chamada']?></p>
	</div>
<?php
	echo $pg['pag_conteudo_html'];
}
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