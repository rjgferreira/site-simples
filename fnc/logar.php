<?php
session_start();
if($_POST['login']!='' && $_POST['senha']!=''){
    require_once"conexaoDB.php";
    $conn = conexaoDB();
    $stmt = $conn->prepare("SELECT usu_login, usu_senha FROM usuarios WHERE usu_login = :login");
    $stmt->bindParam(":login",$_POST['login']);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$user){
        $_SESSION['err'] = utf8_encode("Usuário não identificado. Por favor, verifique.");
        header('Location: ../login');
    }else{
        if (password_verify($_POST['senha'], $user['usu_senha'])){
            // Usuário existe
            $_SESSION['vld'] = utf8_encode('Bem-vindo à central admin.');
            $_SESSION['LGN'] = TRUE;
            header('Location: ../admin');
        } else {
            $_SESSION['err'] = utf8_encode("Login ou senha não confere. Por favor, verifique.");
            header('Location: ../login');
        }
    }

}else if(isset($_POST['sair'])&&$_POST['sair']==TRUE) {
    unset($_SESSION['LGN']);
    $_SESSION['vld'] = utf8_encode('A sessão administrativa foi encerrada.');
    header('Location: ../login');
}else{
    $_SESSION['err'] = utf8_encode('Por favor, informe seus dados de acesso.');
    header('Location: ../login');
}
