<?php
session_start();
require_once"../../fnc/conexaoDB.php";
$conexao = conexaoDB();
$sql = "UPDATE paginas SET pag_botao=:botao, pag_titulo=:titulo, pag_chamada=:chamada, pag_conteudo_html=:conteudo WHERE pag_id=:id";
$stmt = $conexao->prepare($sql);
$stmt->execute(array(
    ':id'=>$_POST['id'],
    ':botao'=>$_POST['botao'],
    ':titulo'=>$_POST['titulo'],
    ':chamada'=>$_POST['chamada'],
    ':conteudo'=>$_POST['conteudo']
));
$_SESSION['vld'] = "A p&aacute;gina foi alterada com sucesso!";
header("Location: /admin");