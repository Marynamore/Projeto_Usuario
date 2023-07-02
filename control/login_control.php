<?php
session_start();
require_once '../model/conexao.php';
require_once '../model/usuarioDTO.php';
require_once '../model/usuarioDAO.php';

$email = strip_tags($_POST["email"]);
$senha = $_POST["senha"];

$usuarioDAO = new UsuarioDAO();
$usuarioLogado = $usuarioDAO->logarEmail($email, $senha);

if (!empty($usuarioLogado)) {
    $_SESSION["id_usuario"] = $usuarioLogado["id_usuario"];
    $_SESSION["email"] = $usuarioLogado["email"];
    $_SESSION["nome_usu"] = $usuarioLogado["nome_usu"];
    $_SESSION["id_perfil"] = $usuarioLogado["fk_id_perfil"];

    $id_perfil = $_SESSION["id_perfil"];

    if (in_array($id_perfil, [2, 3])) {
        header("location:../index.php?msg=success");
        exit;
    } elseif (in_array($id_perfil, [1])) {
        header("location:../view/dashboard_adm.php?msg=Login realizado com sucesso!");
        exit;
    }
} else {
    header("location:../index.php?msg=error");
    exit;
}
