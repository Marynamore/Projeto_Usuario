<?php
session_start();

require_once '../model/usuarioDAO.php';

if(isset($_GET['id_usuario'])){
    $id = $_GET['id_usuario'];

    $usuarioDAO = new UsuarioDAO();
    $excluir_sucesso = $usuarioDAO->excluirUsuarioPorID($id);

    if($excluir_sucesso){

        $id_perfil = $_SESSION["id_perfil"];
        // Encerrar a sessão do usuário
        session_unset();
        
        if (in_array($id_perfil, [2, 3])) {
            header("location:../index.php?msg=success&action=excluir");
            exit();
        } elseif (in_array($id_perfil, [1])) {
            header("location:../view/dashboard_adm.php?msg=success&action=excluir");
            exit();
        }
    }
} else {
// Redirecionar para a página do administrador com mensagem de erro
header("location:../view/dashboard_adm.php?msg=error&action=excluir");
}
