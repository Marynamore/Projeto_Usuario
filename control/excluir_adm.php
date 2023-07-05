<?php
session_start();

require_once '../model/usuarioDAO.php';

if (isset($_SESSION['id_usuario'])) {
    $id = $_SESSION['id_usuario'];
    $id_perfil = $_SESSION['id_perfil'];

    if (isset($_GET['id_usuario'])) {
        $id_cliente = $_GET['id_usuario'];

        $usuarioDAO = new UsuarioDAO();
        $usuario = $usuarioDAO->buscarPorID($id_cliente);

        if ($usuario) {
            $excluir_sucesso = $usuarioDAO->excluirUsuarioPorID($id_cliente);

            if ($excluir_sucesso) {

                if (in_array($id_perfil, [1])) {
                    header("Location: ../view/dashboard_adm.php?msg=success&action=excluir");
                    exit();
                }

            } else {
                // Redirecionar para a página do administrador com mensagem de erro
                header("Location: ../view/dashboard_adm.php?msg=error&action=excluir");
                exit();
            }
        } else {
            // Redirecionar para a página do administrador com mensagem de erro
            header("Location: ../view/dashboard_adm.php?msg=error&action=excluir");
            exit();
        }
    } else {
        // Redirecionar para a página do administrador com mensagem de erro
        header("Location: ../view/dashboard_adm.php?msg=error&action=excluir");
        exit();
    }
} else {
    header("Location: ../index.php?msg=Usuário não encontrado");
    exit();
}
