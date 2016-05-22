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
        $_SESSION['err'] = utf8_encode("Usu�rio n�o identificado. Por favor, verifique.");
        header('Location: ../login');
    }else{
        if (password_verify($_POST['senha'], $user['usu_senha'])){
            // Usu�rio existe
            $_SESSION['vld'] = utf8_encode('Bem-vindo � central admin.');
            $_SESSION['LGN'] = TRUE;
            header('Location: ../admin');
        } else {
            $_SESSION['err'] = utf8_encode("Login ou senha n�o confere. Por favor, verifique.");
            header('Location: ../login');
        }
    }

}else if(isset($_POST['sair'])&&$_POST['sair']==TRUE) {
    unset($_SESSION['LGN']);
    $_SESSION['vld'] = utf8_encode('A sess�o administrativa foi encerrada.');
    header('Location: ../login');
}else{
    $_SESSION['err'] = utf8_encode('Por favor, informe seus dados de acesso.');
    header('Location: ../login');
}
