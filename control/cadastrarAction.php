<?php 

require_once '../model/usuarioDTO.php';
require_once '../model/usuarioDAO.php';

// recuperei os dados do formulario
$nome = $_POST["nome"];
$cpf_cnpj = $_POST["cpf_cnpj"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"]; 
$bairro = $_POST["bairro"]; 
$cidade = $_POST["cidade"]; 
$uf = $_POST["uf"]; 
$cep = $_POST["cep"]; 
$loginEmail = $_POST["loginEmail"]; 
$senha = md5($_POST["senha"]);//criptografa senha
$perfil = $_POST["perfil_idperfil"];

$usuarioDTO = new UsuarioDTO($nome,$loginEmail,$senha);  
$usuarioDTO->setNome($nome);
$usuarioDTO->setcpf_cnpj($cpf_cnpj);
$usuarioDTO->setEndereco($endereco);
$usuarioDTO->setNumero($numero);
$usuarioDTO->setComplemento($complemento);
$usuarioDTO->setBairro($bairro);
$usuarioDTO->setCidade($cidade);
$usuarioDTO->setUF($uf);
$usuarioDTO->setCep($cep);
$usuarioDTO->setLoginEmail($loginEmail);
$usuarioDTO->setSenha($senha);
$usuarioDTO->setPerfil($perfil);


$usuarioDAO = new UsuarioDAO(); // criando objeto DAO de usuario
$retorno = $usuarioDAO->cadastrarUsuario($usuarioDTO);

if(isset($retorno)){
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