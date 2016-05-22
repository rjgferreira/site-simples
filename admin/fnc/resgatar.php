<?php
session_start();
require_once"../../fnc/conexaoDB.php";
$conexao = conexaoDB();
$sql = "SELECT * FROM paginas WHERE pag_id=:id";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(":id",$_POST['id']);
$stmt->execute();
$_SESSION['pg'] = $stmt->fetch(PDO::FETCH_ASSOC);
header("Location: ../editar");