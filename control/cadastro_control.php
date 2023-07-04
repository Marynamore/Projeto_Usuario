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
$telefone       = strip_tags($_POST["telefone"]);
$sexo           = $_POST["sexo"];
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
$id_perfil      = $_POST["id_perfil"];
$obs            = $_POST["obs"];
$foto           = $_FILES['foto'];

// Verifica se o campo de upload de arquivo foi enviado e se não há erros
if ($foto['error'] === UPLOAD_ERR_OK){
    $nome_arquivo = $foto['name'];
    $caminho_temporario = $foto['tmp_name'];
    $caminho_destino = '../assets/pessoas/' . $nome_arquivo;
    move_uploaded_file($caminho_temporario, $caminho_destino);

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
$usuarioDTO->setFoto($nome_arquivo);
$usuarioDTO->setEmail($email);
$usuarioDTO->setSenha($senha);
$usuarioDTO->setSituacao($situacao);
$usuarioDTO->setId_perfil($id_perfil);
$usuarioDTO->setObs($obs);

$usuarioDAO = new UsuarioDAO(); // criando objeto DAO de usuario
$cadastrado_sucesso = $usuarioDAO->cadastrarUsuario($usuarioDTO);

    if ($cadastrado_sucesso) {
        $id_perfil = $_SESSION["id_perfil"];

        if (in_array($id_perfil, [2, 3])) {
            header("location:../index.php?msg=success&action=cadastro");
            exit;
        } elseif (in_array($id_perfil, [1])) {
            header("location:../view/dashboard_adm.php?msg=success&action=cadastro");
            exit;
        }
    }
} else {
// Redirecionar para a página do administrador com mensagem de erro
header("location:../view/dashboard_adm.php?msg=error&action=cadastro");
}
?>
