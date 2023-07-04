<?php
session_start();
require_once '../model/usuarioDAO.php';

$usuarioDAO = new UsuarioDAO();

if (isset($_SESSION["id_usuario"])) {
    $nome_usuario = $_SESSION["nome_usu"];
    $id = $_SESSION["id_usuario"];
    $id_perfil = $_SESSION["id_perfil"];

    $usuario = $usuarioDAO->buscarPorID($id);
    $usuarioFetch = $usuarioDAO->mostrarFoto($id);
} else {
    $nome_usuario = "";
    header("Location: ../index.php?msg=Usuário não encontrado");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/styleLog.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <title>Perfil</title>
</head>
<body>
    <header class="main_header">
        <a href="../index.php" class="logo">
            <img src="../assets/Logo.png" alt="Bem vindo ao projeto usuário">
        </a>
        <nav class="navbar">
            <a href="../index.php"><i class="fa-solid fa-house"></i>HOME</a></li>
            <a href="http://" target="_blank"><i class="fa-solid fa-headphones"></i>AJUDA</a>
            <?php
                if (!empty($nome_usuario)) {
                    if ($id_perfil == 1 || $id_perfil == 2 || $id_perfil == 3) {
                        $foto = $usuarioFetch['foto'] ?? "";
                        echo '<a href="perfil_usu.php">';
                        if ($foto) {
                                echo '<img src="../assets/pessoas/'.$foto.'" alt="Foto do Cliente">';
                            } else {
                                echo '<i class="fa-solid fa-user"></i>'; // Ícone no lugar da foto
                            }
                        echo $nome_usuario.'</a>';
                        echo '<a class="border1" href="../control/control_sair.php" class="item_menu"><i class="fa-solid fa-right-from-bracket"></i>SAIR</a>';
                    }
                }
            ?>
        </nav>
    </header>    
    <h1>Confira seus dados:</h1>
    <main id="container">
        <div class="dados">
            <fieldset class="grupo">
                <legend><strong>Dados Pessoais</strong></legend>
                <div class="field">
                    <?php if (!empty($usuario)) { ?>
                        <img class='profile' src="../assets/pessoas/<?= $usuario->getFoto(); ?>" alt="">
                    <?php } ?>
                </div>
                <p class="field"><strong>Nome:</strong> <br><?= $usuario->getNome_usu() ?></p>
                <p class="field"><strong>Sexo:</strong> <br><?= $usuario->getSexo() ?></p>
                <p class="field"><strong>Data de Nascimento:</strong> <br><?= $usuario->getDt_nascimento() ?></p>
                <p class="field"><strong>Telefone:</strong> <br><?= $usuario->getTelefone() ?></p>
                <p class="field"><strong>Email:</strong> <br><?= $usuario->getEmail() ?></p>
                <!-- <p class="field"><strong>Senha:</strong> <br><?= $usuario->getSenha() ?></p> -->
                <p class="field"><strong>CPF:</strong> <br><?= $usuario->getCpf() ?></p>
            </fieldset>
            <fieldset class="grupo">
                <legend>Endereço</legend>
                <p class="field"><strong>Endereço:</strong> <br><?= $usuario->getEndereco() ?></p>
                <p class="field"><strong>Nº:</strong> <br><?= $usuario->getNumero() ?></p>
                <p class="field"><strong>Complemento:</strong> <?= $usuario->getComplemento() ?></p>
                <p class="field"><strong>Bairro:</strong> <br><?= $usuario->getBairro() ?></p>
                <p class="field"><strong>Cidade:</strong> <br><?= $usuario->getCidade() ?></p>
                <p class="field"><strong>CEP:</strong> <br><?= $usuario->getCep() ?></p>
                <p class="field"><strong>UF:</strong> <br><?= $usuario->getUF() ?></p>
                <p class="field"><strong>Observação:</strong> <br><?= $usuario->getObs() ?></p>
            </fieldset>
            <a class="botao" href="./alterar_usu.php?id_usuario=<?= $usuario->getId_usuario() ?>">ALTERAR</a>
            <a class="botao" href="../control/excluir.php?id_usuario=<?= $usuario->getId_usuario() ?>" onclick="return confirm('Tem certeza de que deseja excluir o usuário?')">EXCLUIR</a>
        </div>
    </main>
</body>
</html>

