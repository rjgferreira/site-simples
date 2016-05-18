<?php
session_start();
require_once"conexaoDB.php";
if($_POST['busca']!=''){
    $conexao = conexaoDB();
    $sql = "SELECT pag_botao, pag_titulo, pag_chamada
            FROM paginas
            WHERE pag_conteudo_html LIKE '%$_POST[busca]%'";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $_SESSION['RESULT'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header("Location: ../$_POST[pg]");
}else {
    $_SESSION['RESULT']='Digite um temo para a pesquisa.';
    header("Location: ../$_POST[pg]");
}