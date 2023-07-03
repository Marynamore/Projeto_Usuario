<?php
session_start();
$usuarioLogado = "";
$id_usuarioLogado = "";
$id_perfil = "";

if (isset($_SESSION["id_usuario"])) {
    $usuarioLogado = $_SESSION["nome_usu"];
    $id_usuarioLogado = $_SESSION["id_usuario"];
    $id_perfil = $_SESSION["id_perfil"];
} else {
    $usuarioLogado = "";
    header("Location: ../index.php?msg=Usuário não encontrado");
    exit();
}

// Verifica se a página foi atualizada
if (isset($_POST['refresh'])) {
    // Define o conteúdo do dashboard como a opção selecionada
    $_SESSION['pagina_inicial'] = 'dashboard';
}

// Obtém a página inicial da sessão ou define como dashboard por padrão
$paginaInicial = isset($_SESSION['pagina_inicial']) ? $_SESSION['pagina_inicial'] : 'dashboard';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_adm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon_io/favicon-16x16.png">
    <link rel="manifest" href="../site.webmanifest">
    <title>Dashboard</title>
    <script>
    // Função para exibir o conteúdo do botão clicado e armazenar a seleção
    function mostrarConteudo(id) {
        // Oculta todos os conteúdos
        var conteudos = document.getElementsByClassName('conteudo');
        for (var i = 0; i < conteudos.length; i++) {
            conteudos[i].style.display = 'none';
        }

        // Remove a classe 'ativo' de todos os botões
        var a = document.getElementsByClassName('menu-item');
        for (var i = 0; i < a.length; i++) {
            a[i].classList.remove('ativo');
        }

        // Exibe o conteúdo correspondente ao ID do botão clicado
        var conteudo = document.getElementById(id);
        if (conteudo) {
            conteudo.style.display = 'block';
        }

        // Adiciona a classe 'ativo' ao botão clicado
        var a = document.getElementById('a-' + id);
        if (a) {
            a.classList.add('ativo');
        }

        // Armazena a seleção no Local Storage
        localStorage.setItem('pagina_inicial', id);
    }

    // Função para definir o conteúdo inicial ao carregar a página
    function definirConteudoInicial() {
        var paginaInicial = localStorage.getItem('pagina_inicial');
        if (paginaInicial) {
            mostrarConteudo(paginaInicial);
        }
    }
    </script>
</head>
<body onload="definirConteudoInicial()">
    <header class="main_header">
        <a href="../index.php" class="logo">
            <img src="../assets/Logo.png" alt="Bem vindo ao projeto usuário">
        </a>
        <nav class="navbar">
            <a href="../index.php"><i class="fa-solid fa-house"></i>HOME</a></li>
            <?php
                if (!empty($usuarioLogado)) {
                    if ($id_perfil == 1) {
                        echo '<a href="perfil_adm.php"><i class="fa-solid fa-user"></i>Painel Administrador</a>';
                        echo '<a class="border1" href="../control/control_sair.php" class="item_menu"><i class="fa-solid fa-right-from-bracket"></i>SAIR</a>';
                    }
                }
            ?>
        </nav>
    </header>
    <header>
        <h1>Dashboard</h1>
    </header>
    <nav class="sidebar">
        <div class='painel_adm'>
            <div class="menu-item ativo" id="botao-dashboard">
                <button onclick="mostrarConteudo('dashboard')">Dashboard</button>
            </div>
            <div class="menu-item">
                <button onclick="mostrarConteudo('administrador')">Administrador</button>
            </div>
            <div class="menu-item">
                <button onclick="mostrarConteudo('cliente')">Cliente</button>
            </div>
            <div class="menu-item">
                <button onclick="mostrarConteudo('moderador')">Moderador</button>
            </div>
            <div class="menu-item">
                <button onclick="mostrarConteudo('denuncia')">Usuários Denunciados</button>
            </div>
        </div>
    </nav>
    <main class="painel_adm">
        <div class="conteudo" id="dashboard">
            <h2>Olá, <?php echo $_SESSION["nome_usu"]; ?>!</h2>
        </div>
        <div class="conteudo" id="administrador">
            <h2>Usuários</h2>
            <?php
            require_once '../model/usuarioDAO.php';
            $usuarioDAO = new UsuarioDAO();

            $usuario = $usuarioDAO->listarUsuarios();
            
            ?>

            <table id="dataTable">
                <thead>
                    <tr>
                        <th>Id</th> 
                        <th>Foto</th>
                        <th>Nome do Cliente</th>
                        <th>E-mail</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Data de Nascimento</th>
                        <th>Sexo</th>
                        <th>Situação</th>
                        <th>Observação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuario as $usuarioFetch) { ?>
                    <tr>
                        <td><?= $usuarioFetch["id_usuario"] ?></td>
                        <td><img src="../assets/pessoas/<?= $usuarioFetch["foto"]?>" alt="Foto do Cliente" width="200px"></td>
                        <td><?= $usuarioFetch["nome_usu"] ?></td>
                        <td><?= $usuarioFetch["email"] ?></td>
                        <td><?= $usuarioFetch["cpf"] ?></td>
                        <td><?= $usuarioFetch["telefone"] ?></td>
                        <td><?= $usuarioFetch["dt_nascimento"]?></td>
                        <td><?= $usuarioFetch["sexo"] ?></td>
                        <td><?= $usuarioFetch["situacao"] ?></td>
                        <td><?= $usuarioFetch["obs"] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                <thead>
                    <tr>
                        <th>Id</th> 
                        <th>Endereço</th>
                        <th>Número</th>
                        <th>Complemento</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>UF</th>
                        <th>CEP</th>
                        <th>Perfil</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuario as $usuarioFetch) { ?>
                    <tr>
                        <td><?= $usuarioFetch["id_usuario"] ?></td>
                        <td><?= $usuarioFetch["endereco"] ?></td>
                        <td><?= $usuarioFetch["numero"] ?></td>
                        <td><?= $usuarioFetch["complemento"] ?></td>
                        <td><?= $usuarioFetch["bairro"] ?></td>
                        <td><?= $usuarioFetch["cidade"] ?></td>
                        <td><?= $usuarioFetch["uf"] ?></td>
                        <td><?= $usuarioFetch["cep"] ?></td>
                        <td><?= $usuarioFetch["nome_perfil"] ?></td>
                        <td>
                            <a href="../alterar_usuario.php?id_usuario=<?= $usuarioFetch["id_usuario"] ?>" title="ALTERAR"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="../../control/excluir.php?id_usuario=<?= $usuarioFetch["id_usuario"] ?>" title="EXCLUIR" onclick="return confirm('Deseja excluir esse usuário?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="conteudo" id="cliente">
            <h2>Usuários</h2>
            <?php
            require_once '../model/usuarioDAO.php';
            $usuarioDAO = new UsuarioDAO();

            $usuario = $usuarioDAO->listarUsuarios();
            ?>
            <table id="dataTable">
                <thead>
                    <tr>
                        <th>Id</th> 
                        <th>Foto</th>
                        <th>Nome do Cliente</th>
                        <th>E-mail</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Data de Nascimento</th>
                        <th>Sexo</th>
                        <th>Situação</th>
                        <th>Observação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuario as $usuarioFetch) { ?>
                    <tr>
                        <td><?= $usuarioFetch["id_usuario"] ?></td>
                        <td><img src="../assets/pessoas/<?= $usuarioFetch["foto"]?>" alt="Foto do Cliente" width="200px"></td>
                        <td><?= $usuarioFetch["nome_usu"] ?></td>
                        <td><?= $usuarioFetch["email"] ?></td>
                        <td><?= $usuarioFetch["cpf"] ?></td>
                        <td><?= $usuarioFetch["telefone"] ?></td>
                        <td><?= $usuarioFetch["dt_nascimento"]?></td>
                        <td><?= $usuarioFetch["sexo"] ?></td>
                        <td><?= $usuarioFetch["situacao"] ?></td>
                        <td><?= $usuarioFetch["obs"] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                <thead>
                    <tr>
                        <th>Id</th> 
                        <th>Endereço</th>
                        <th>Número</th>
                        <th>Complemento</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>UF</th>
                        <th>CEP</th>
                        <th>Perfil</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuario as $usuarioFetch) { ?>
                    <tr>
                        <td><?= $usuarioFetch["id_usuario"] ?></td>
                        <td><?= $usuarioFetch["endereco"] ?></td>
                        <td><?= $usuarioFetch["numero"] ?></td>
                        <td><?= $usuarioFetch["complemento"] ?></td>
                        <td><?= $usuarioFetch["bairro"] ?></td>
                        <td><?= $usuarioFetch["cidade"] ?></td>
                        <td><?= $usuarioFetch["uf"] ?></td>
                        <td><?= $usuarioFetch["cep"] ?></td>
                        <td><?= $usuarioFetch["nome_perfil"] ?></td>
                        <td>
                            <a href="../alterar_usuario.php?id_usuario=<?= $usuarioFetch["id_usuario"] ?>" title="ALTERAR"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="../../control/excluir.php?id_usuario=<?= $usuarioFetch["id_usuario"] ?>" title="EXCLUIR" onclick="return confirm('Deseja excluir esse usuário?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="conteudo" id="moderador">
            <h2>Usuários</h2>
            <?php
            require_once '../model/usuarioDAO.php';
            $usuarioDAO = new UsuarioDAO();

            $usuario = $usuarioDAO->listarUsuarios();
            ?>

            <table id="dataTable">
                <thead>
                    <tr>
                        <th>Id</th> 
                        <th>Foto</th>
                        <th>Nome do Cliente</th>
                        <th>E-mail</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Data de Nascimento</th>
                        <th>Sexo</th>
                        <th>Situação</th>
                        <th>Observação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuario as $usuarioFetch) { ?>
                    <tr>
                        <td><?= $usuarioFetch["id_usuario"] ?></td>
                        <td><img src="../assets/pessoas/<?= $usuarioFetch["foto"]?>" alt="Foto do Cliente" width="200px"></td>
                        <td><?= $usuarioFetch["nome_usu"] ?></td>
                        <td><?= $usuarioFetch["email"] ?></td>
                        <td><?= $usuarioFetch["cpf"] ?></td>
                        <td><?= $usuarioFetch["telefone"] ?></td>
                        <td><?= $usuarioFetch["dt_nascimento"]?></td>
                        <td><?= $usuarioFetch["sexo"] ?></td>
                        <td><?= $usuarioFetch["situacao"] ?></td>
                        <td><?= $usuarioFetch["obs"] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                <thead>
                    <tr>
                        <th>Id</th> 
                        <th>Endereço</th>
                        <th>Número</th>
                        <th>Complemento</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>UF</th>
                        <th>CEP</th>
                        <th>Perfil</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuario as $usuarioFetch) { ?>
                    <tr>
                        <td><?= $usuarioFetch["id_usuario"] ?></td>
                        <td><?= $usuarioFetch["endereco"] ?></td>
                        <td><?= $usuarioFetch["numero"] ?></td>
                        <td><?= $usuarioFetch["complemento"] ?></td>
                        <td><?= $usuarioFetch["bairro"] ?></td>
                        <td><?= $usuarioFetch["cidade"] ?></td>
                        <td><?= $usuarioFetch["uf"] ?></td>
                        <td><?= $usuarioFetch["cep"] ?></td>
                        <td><?= $usuarioFetch["nome_perfil"] ?></td>
                        <td>
                            <a href="../alterar_usuario.php?id_usuario=<?= $usuarioFetch["id_usuario"] ?>" title="ALTERAR"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="../../control/excluir.php?id_usuario=<?= $usuarioFetch["id_usuario"] ?>" title="EXCLUIR" onclick="return confirm('Deseja excluir esse usuário?')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</html>
