<?php
session_start();
require_once '../model/usuarioDAO.php';

$usuarioDAO = new UsuarioDAO();

if (isset($_SESSION["id_usuario"])) {
    $usuarioLogado = $_SESSION["nome_usu"];
    $id = $_SESSION["id_usuario"];
    $id_perfil = $_SESSION["id_perfil"];

    $usuario = $usuarioDAO->buscarPorID($id);
} else {
    $usuarioLogado = "";
    header("Location: ../index.php?msg=Usuário não encontrado");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Perfil</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/perfil_usuario.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
</head>
<body>
<button onclick="javascript:history.go(-1)" class="alterar">Voltar</button>
<a class="alterar" href="./view/filmefavorito.php?id_usuario=' . $id_usuarioLogado . '" onclick="funcPerfil()"><i class="fa-regular fa-camcorder">Filmes Favoritos</i></a>
    <h2>Confira seus dados:</h2>
    <div class="container">
        <div class="item-details">
            <div class="item-address">
                <fieldset>
                    <legend>Dados Pessoais</legend>
                    <?php if (!empty($usuario)) { ?>
                        <img class='profile' src="../assets/pessoas/<?= $usuario->getFoto(); ?>" alt="">
                    <?php } ?>
                    <p><strong>Nome:</strong> <?= $usuario->getNome_usu() ?></p>
                    <p><strong>Gênero:</strong> <?= $usuario->getSexo() ?></p>
                    <p><strong>Data de Nascimento:</strong> <?= $usuario->getDt_nascimento() ?></p>
                    <p><strong>Telefone:</strong> <?= $usuario->getTelefone() ?></p>
                    <p><strong>Email:</strong> <?= $usuario->getEmail() ?></p>
                    <p><strong>CPF ou CNPJ:</strong> <?= $usuario->getCpf() ?></p>
                </fieldset>
                <fieldset>
                    <legend>Endereço</legend>
                    <p><strong>Endereço:</strong> <?= $usuario->getEndereco() ?></p>
                    <p><strong>Nº:</strong> <?= $usuario->getNumero() ?></p>
                    <p><strong>Complemento:</strong> <?= $usuario->getComplemento() ?></p>
                    <p><strong>Bairro:</strong> <?= $usuario->getBairro() ?></p>
                    <p><strong>Cidade:</strong> <?= $usuario->getCidade() ?></p>
                    <p><strong>CEP:</strong> <?= $usuario->getCep() ?></p>
                    <p><strong>UF:</strong> <?= $usuario->getUF() ?></p>
                </fieldset>
                <button><a class="alterar" href="./alterar_usuario.php?id_usuario=<?= $usuario->getId_usuario() ?>">ALTERAR</a></button>
                <button><a class="alterar" href="../control/excluir.php?id_usuario=<?= $usuario->getId_usuario() ?>" onclick="return confirm('Tem certeza de que deseja excluir o usuário?')">EXCLUIR</a></button>

            </div>
        </div>
    </div>

    <script src="" async defer></script>
</body>
</html>
