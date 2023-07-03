<?php 
session_start();
require_once '../model/usuarioDTO.php';
require_once '../model/usuarioDAO.php';

// Valida se existe SESSÃO aberta
if(isset($_SESSION["id_perfil"]) && ($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 2 || $_SESSION['id_perfil'] == 3)){

// recuperei os dados do formulario
$id             = $_POST["id_usuario"];
$nome           = strip_tags($_POST["nome_usu"]);
$cpf            = strip_tags($_POST["cpf"]);
$telefone       = strip_tags($_POST["telefone"]);
$sexo           = $_POST['sexo'];
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
$obs            = $_POST["obs"];
$id_perfil      = $_POST["fk_id_perfil"];
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
$usuarioDTO->setId_usuario($id);

$usuarioDAO = new UsuarioDAO(); // criando objeto DAO de usuario
$usuarioCadastrado = $usuarioDAO->atualizarUsuarioPorID($usuarioDTO);

    // Verificar se o usuário é administrador, moderador, colecionador ou usuário comum
    if ($success) {
        $msg = "Usuário alterado com sucesso!";
    } else {
        $msg = "Erro ao alterar o usuário";
    }


    // Exibir saída específica para cada perfil
    if ($_SESSION['id_perfil'] == 1) {
        header("Location: ../view/dashboard_adm.php?msg=" . urlencode($msg));
    } elseif ($_SESSION['id_perfil'] == 2) {
        header("Location: ../index.php?msg=" . urlencode($msg));
    } elseif ($_SESSION['id_perfil'] == 3) {
        header("Location: ../index.php?msg=" . urlencode($msg));
    }
}
} else {
// Redirecionar para a página do administrador com mensagem de erro
header("location:../view/dashboard/listausuarioadm.php?msg=" . urlencode("Erro ao alterar o usuário"));
}