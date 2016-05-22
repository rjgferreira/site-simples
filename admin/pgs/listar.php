<h2>Listando p&aacute;ginas</h2>
<table class="table">
    <thead>
        <th>ID</th>
        <th>Bot&atilde;o</th>
        <th>T&iacute;tulo</th>
        <th></th>
    </thead>
    <tbody>
<?php
require_once"../fnc/conexaoDB.php";
$conexao = conexaoDB();
$sql = "SELECT pag_id, pag_botao, pag_titulo FROM paginas";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$pgs = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($pgs as $btn){
    echo '<tr><td>'.$btn['pag_id'].'</td><td>'.$btn['pag_botao'].'</td><td>'.$btn['pag_titulo'].'</td><td><form action="admin/fnc/resgatar.php" method="post"><input type="hidden" name="id" value="'.$btn['pag_id'].'"><button type="submit"><img src="../img/edit.png"></button></form></td></tr>';
}
?>
    </tbody>
</table>




