<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php

require_once"conexaoDB.php";
echo "********** Executando fixture 'paginas'<br>";

$conn = conexaoDB();

echo "********** Removendo tabela 'paginas'<br>";
$conn->query("DROP TABLE IF EXISTS paginas");
echo "********** Feito!<br>";

echo "********** Criando tabela 'paginas'<br>";
$conn->query("CREATE TABLE paginas (
	pag_id INT NOT NULL AUTO_INCREMENT,
	pag_botao VARCHAR(20) CHARACTER SET 'utf8' NOT NULL,
	pag_titulo VARCHAR(100) CHARACTER SET 'utf8' NOT NULL,
	pag_chamada VARCHAR(255) CHARACTER SET 'utf8' NULL,
	pag_conteudo_html TEXT CHARACTER SET 'utf8' NULL,
	PRIMARY KEY (pag_id));");
echo "********** Feito!<br>";

echo "********** Inserindo dados...<br>";
$botao = ['Home','Empresa','Produtos','Serviços','Contato'];
$titulo = ["Você está na Home!","Conheça nossa empresa!","Veja nossa linha de produtos!","Conte com nossos serviços especializados!","Fale com a gente!"];
$chamada = ['Maecenas sed diam eget risus varius blandit sit amet non magna.','Maecenas sed diam eget risus varius blandit sit amet non magna.','Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.','Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.','Maecenas sed diam eget risus varius blandit sit amet non magna.'];
$conteudo = array(
  '<div class="row marketing">
        <div class="col-lg-6">
          <h4>Esta é a Home</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
          <h4>A primeira página</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>
          <h4>O início da história</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>
        <div class="col-lg-6">
          <h4>Onde tudo começa</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
          <h4>O ponto de partida</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>
          <h4>Deu-se a largada</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>
      </div>',
  '<div class="row marketing">
        <div class="col-lg-6">
          <h4>Esta é a nossa empresa</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
          <h4>A segunda página</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>
          <h4>O desenrolar da história</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>
        <div class="col-lg-6">
          <h4>Onde tudo começou</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
          <h4>O ponto de confiança</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>
          <h4>A sua melhor escolha</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>
      </div>',
      '<div class="row marketing">
        <div class="col-lg-6">
          <h4>Nosso produtos são de arrazar</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>Tudo o que você precisa</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4>Sua melhor opção</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>

        <div class="col-lg-6">
          <h4>Preços imbatíveis</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>Qualidade acima de tudo</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4>Devolvemos os seu dinheiro</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>
      </div>',
      '<div class="row marketing">
        <div class="col-lg-6">
          <h4>Subheading</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>Subheading</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4>Subheading</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>

        <div class="col-lg-6">
          <h4>Subheading</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>Subheading</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4>Subheading</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>
      </div>',
      '<form class="form-signin" action="fnc/validar.php" method="post">
        <h2 class="form-signin-heading">Escreva pra gente!</h2>
        <label for="nome" class="sr-only">Nome</label>
        <input class="form-control" type="text" name="nome" placeholder="Nome" value=""><br>
        <label for="email" class="sr-only">E-mail</label>
        <input class="form-control" type="email" name="email" placeholder="E-mail" value=""><br>
        <label for="assunto" class="sr-only">Assunto</label>
        <input class="form-control" type="text" name="assunto" placeholder="Assunto" value=""><br>
        <label for="mensagem" class="sr-only">Mensagem</label>
        <textarea class="form-control" name="mensagem" cols="10" rows="4" placeholder="Mensagem"></textarea><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
      </form>'
  );

for($x=0;$x<=4;$x++){
	$smt = $conn->prepare("INSERT INTO paginas (
								pag_botao,
								pag_titulo,
								pag_chamada,
								pag_conteudo_html)
							VALUE (
								:botao,
								:titulo,
								:chamada,
								:conteudo);");
	//$smt->bindParam(":nome",$nome);
	$smt->execute(array(
		':botao' => $botao[$x],
		':titulo' => $titulo[$x],
		':chamada' => $chamada[$x],
		':conteudo' => $conteudo[$x]
	));
}
echo "********** Feito!<br>";
echo "********** Executando fixture 'usuarios'<br>";

echo "********** Removendo tabela 'usuarios'<br>";
$conn->query("DROP TABLE IF EXISTS usuarios");
echo "********** Feito!<br>";

echo "********** Criando tabela 'usuarios'<br>";
$conn->query("CREATE TABLE usuarios (
	usu_id INT NOT NULL AUTO_INCREMENT,
	usu_login VARCHAR(20) NOT NULL,
	usu_senha VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
	PRIMARY KEY (usu_id),
	UNIQUE(usu_id));");
echo "********** Feito!<br>";
echo "********** Inserindo dados...<br>";

$usuario = 'admin';
$options = [
    'salt' => md5('384jksdo%783*'),
    'cost' => 10
];
$senha = password_hash('admin', PASSWORD_DEFAULT, $options);
$smt = $conn->prepare("INSERT INTO usuarios (
                            usu_login,
                            usu_senha)
                        VALUE (
                            :login,
                            :senha);");
$smt->execute(array(
    ':login' => $usuario,
    ':senha' => $senha
));

echo "********** Concluído.".$senha;
?>
</body>
</html>
