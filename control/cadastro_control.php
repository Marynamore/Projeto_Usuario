<?php 
session_start();
// Valida se existe SESSÃO aberta
if(!isset($_SESSION["id_usuario"])){
    header ( "location:../index.php?msg=Usuário e/ou senha inválidos" );	
    exit; 
}
require_once '../model/usuarioDTO.php';
require_once '../model/usuarioDAO.php';

// recuperei os dados do formulario
$nome           = strip_tags($_POST["nome_usu"]);
$cpf            = strip_tags($_POST["cpf"]);
$telefone = strip_tags($_POST["telefone"]);
if(isset($_POST["sexo"])){
    $sexo = strip_tags($_POST["sexo"]);
} else {
$sexo = "";
}   
$dt_nascimento  = $_POST["dt_nascimento"];
$endereco       = strip_tags($_POST["endereco"]);
$numero         = strip_tags($_POST["numero"]);
$complemento    = strip_tags($_POST["complemento"]); 
$bairro         = strip_tags($_POST["bairro"]); 
$cidade         = strip_tags($_POST["cidade"]); 
$uf             = strip_tags($_POST["uf"]); 
$cep            = strip_tags($_POST["cep"]); 
$email          = strip_tags($_POST["email"]); 
$senha          = $_POST["senha"];
$situacao       = $_POST["situacao"];
$id_perfil         = $_POST["id_perfil"];

$usuarioDTO = new UsuarioDTO($nome,$email,$senha);  
$usuarioDTO->setNome_usu($nome);
$usuarioDTO->setCpf($cpf);
$usuarioDTO->setTelefone($telefone);
$usuarioDTO->setCpf($cpf);
$usuarioDTO->setSexo($sexo);
$usuarioDTO->setDt_nascimento($dt_nascimento);
$usuarioDTO->setEndereco($endereco);
$usuarioDTO->setNumero($numero);
$usuarioDTO->setComplemento($complemento);
$usuarioDTO->setBairro($bairro);
$usuarioDTO->setCidade($cidade);
$usuarioDTO->setUF($uf);
$usuarioDTO->setCep($cep);
$usuarioDTO->setEmail($email);
$usuarioDTO->setSenha($senha);
$usuarioDTO->setSituacao($situacao);
$usuarioDTO->setId_perfil($id_perfil);


$usuarioDAO = new UsuarioDAO(); // criando objeto DAO de usuario
$usuarioCadastrado = $usuarioDAO->cadastrarUsuario($usuarioDTO);

if($usuarioCadastrado){
    $msg = "Usuário Cadastrado com sucesso!";
    echo "<script>";
        echo"window.location.href='../view/cadastrarUsuario.php?msg={$msg}' ";
    echo "</script> ";
 //header("location:../visao/formCadastroUsuario.php?msg={$msg}");
}else{
    //se der errado redireciona para o formulario de registro
    $msg = "ERROR ao cadastrar Usuário!";
    echo "<script>";
        echo"window.location.href='../view/cadastrarUsuario.php?msg={$msg}' ";
    echo "</script> ";
    //header("location:../visao/registro.php?msg=Erro");
}
 
?>