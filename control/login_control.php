<?php
session_start();
if(!isset($_POST["senha"]) || empty($_POST["senha"])){
    header ( "location:../index.php?msg=Usuário e/ou senha inválidos" );	
    exit; 
}

require_once '../model/usuarioDTO.php';
require_once '../model/usuarioDAO.php';

$email = strip_tags($_POST["email"]);
$senha = $_POST["senha"];

$usuarioDAO = new UsuarioDAO();
$usuarioLogado = $usuarioDAO->logarEmail($email,$senha);

if(!empty($usuarioLogado)){
    
    $_SESSION["id_usuario"] = $usuarioLogado["id_usuario"];
    $_SESSION["email"] = $usuarioLogado["email"];
    $_SESSION["nome_usu"] = $usuarioLogado["nome_usu"];
    $_SESSION["id_perfil"] = $usuarioLogado["id_perfil"];
    
    header ( "location:../index.php" );	
    exit; 

} else {
    header ( "location:../index.php?msg=Usuário e/ou senha inválidos" );	
    exit; 
}
