<?php
session_start();
require_once '../model/usuarioDAO.php';

$usuarioDAO = new UsuarioDAO();

if (isset($_SESSION["id_usuario"])) {
    $nome_usuario = $_SESSION["nome_usu"];
    $id = $_SESSION["id_usuario"];
    $id_perfil = $_SESSION["id_perfil"];

    
    $usuarioFoto = $usuarioDAO->mostrarFoto($id);
} else {
    $nome_usuario = "";
    header("Location: ../index.php?msg=warning&action=perfil");
    exit();
}

// Verifica se o formulário de pesquisa foi enviado
@$nome_usu = $_POST["nome_usu"];

if($nome_usu){
    $usuario = $usuarioDAO->pesquisarUsuario($nome_usu);
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
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
        <script>
        function exibirAlerta(tipo, mensagem) {
            let title;
            if (tipo === 'success') {
                if (mensagem === 'Login realizado com Sucesso!') {
                    title = 'Login realizado com Sucesso!';
                } else if (mensagem === 'Usuário realizado com Sucesso!') {
                    title = 'Usuário realizado com Sucesso!';
                } else if (mensagem === 'Cadastro realizado com Sucesso!') {
                    title = 'Cadastro realizado com Sucesso!';
                }
            } else {
                title = 'OPS! Email e/ou Senha Inválidos';
            }

            Swal.fire({
                icon: tipo,
                title: title,
                text: mensagem,
            });
        }
    </script>
</head>
<body onload="definirConteudoInicial()">
    <header class="main_header">
        <a href="../index.php" class="logo">
            <img src="../assets/Logo.png" alt="Bem vindo ao projeto usuário">
        </a>
        <div class="search-box">
            <form method="POST">
                <input type="text" name="nome_usu" placeholder="Pesquisar usuário">
                <button type="submit" name="pesquisar"><i class="fa-solid fa-search"></i></button>
            </form>
        </div>
        <nav class="navbar">
            <a href="../index.php"><i class="fa-solid fa-house"></i>HOME</a></li>
            <?php
                if (!empty($nome_usuario)) {
                    if ($usuarioFoto) {
                        if ($id_perfil == 1) {
                            $foto = $usuarioFoto['foto'] ?? "";
                            echo '<a href="perfil_usu.php">';
                            if ($foto) {
                                echo '<img src="../assets/pessoas/'.$foto.'" alt="Foto do Cliente">';
                            } else {
                                echo '<i class="fa-solid fa-user"></i>'; // Ícone no lugar da foto
                            }
                            echo 'Painel Administrador</a>';

                            echo '<a class="border1" href="../control/control_sair.php" class="item_menu"><i class="fa-solid fa-right-from-bracket"></i>SAIR</a>';
                        }   
                    } 
                }
            ?>
        </nav>
    </header>
    <header>
        <h1>Dashboard</h1>
    </header>
    <?php
        if (isset($_GET['msg'])) {
            if ($_GET['msg'] === 'success') {
                $tipo = 'success';
                if ($_GET['action'] === 'alterar') {
                    $mensagem = 'Atualização feita com Sucesso!';
                } elseif ($_GET['action'] === 'excluir') {
                    $mensagem = 'Usuário excluido com Sucesso!';
                } elseif ($_GET['action'] === 'cadastro') {
                    $mensagem = 'Cadastro realizado com Sucesso!';
                }elseif($_GET['action'] === 'login'){
                    $mensagem = 'Login realizado com Sucesso!';
                }
            }else if ($_GET['msg'] === 'warning') {
                $tipo = 'warning';
                if ($_GET['action'] === 'perfil') {
                    $mensagem = 'OPS! É necessário fazer Login';
                }
            }else if ($_GET['msg'] === 'error') {
                $tipo = 'error';
                if ($_GET['action'] === 'login') {
                    $mensagem = 'ERRO! Email e/ou Senha Inválidos';
                } elseif ($_GET['action'] === 'alterar') {
                    $mensagem = 'ERRO ao altera Usuário!';
                } elseif ($_GET['action'] === 'cadastro') {
                    $mensagem = 'ERRO ao altera Usuário!';
                }elseif ($_GET['action'] === 'excluir') {
                    $mensagem = 'ERRO ao excluir Usuário!';
                }
            }
        } else {
            // $_GET['msg'] não está definida
            $tipo = null;
            $mensagem = null;
        }
    ?>
    <script>
        function exibirAlerta(tipo, titulo, mensagem) {
            Swal.fire({
                icon: tipo,
                title: titulo,
                text: mensagem,
            });
        }
        // Verifica se o tipo e a mensagem estão definidos e chama a função exibirAlerta
        <?php if ($tipo && $mensagem): ?>
        exibirAlerta("<?php echo $tipo; ?>", "<?php echo $mensagem; ?>");
        <?php endif; ?>
    </script>
    <nav class="sidebar">
        <div class='painel_adm'>
            <div class="menu-item ativo" id="botao-dashboard">
                <button onclick="mostrarConteudo('dashboard')">Dashboard</button>
            </div>
            <div class="menu-item">
                <button onclick="mostrarConteudo('usuario')">Usuários</button>
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
        <?php
            if (isset($_POST['pesquisar'])) {
                $nome_usu = $_POST["nome_usu"];
                $pesquisa_usu = $usuarioDAO->pesquisarUsuario($nome_usu);

                if (empty($pesquisa_usu)) {
                    echo '<p>Nenhum usuário encontrado!</p>';
                } else {
                    echo '<script>';
                    echo "exibirAlerta('success', 'Usuário encontrado com sucesso!');";
                    echo '</script>';
                    ?>
                    <div class="conteudo" id="usuario">
                        <h2>Usuários</h2>
                        <?php
                        require_once '../model/usuarioDAO.php';
                        $usuarioDAO = new UsuarioDAO();

                        $usuario = $usuarioDAO->listarUsuarios();
                        
                        ?>
                        <table id="dataTable">
                            <thead>
                                <tr>
                                    <th>Perfil</th>
                                    <th>Foto</th>
                                    <th>Nome do Cliente</th>
                                    <th>E-mail</th>
                                    <th>CPF</th>
                                    <th>Telefone</th>
                                    <th>Data de Nascimento</th>
                                    <th>Sexo</th>
                                    <th>Situação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pesquisa_usu as $usuarioFetch) { ?>
                                <tr>
                                    <td><?= $usuarioFetch->getId_Perfil()?></td>
                                    <td><img src="../assets/pessoas/<?= $usuarioFetch->getFoto()?>" alt="Foto do Cliente"></td>
                                    <td><?= $usuarioFetch->getNome_usu() ?></td>
                                    <td><?= $usuarioFetch->getEmail() ?></td>
                                    <td><?= $usuarioFetch->getCpf()?></td>
                                    <td><?= $usuarioFetch->getTelefone()?></td>
                                    <td><?= $usuarioFetch->getDt_nascimento()?></td>
                                    <td><?= $usuarioFetch->getSexo()?></td>
                                    <td><?= $usuarioFetch->getSituacao()?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <thead>
                                <tr>
                                    <th>Endereço</th>
                                    <th>Número</th>
                                    <th>Complemento</th>
                                    <th>Bairro</th>
                                    <th>Cidade</th>
                                    <th>UF</th>
                                    <th>CEP</th>
                                    <th>Observação</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pesquisa_usu as $usuarioFetch) { ?>
                                <tr>
                                    <td><?= $usuarioFetch->getEndereco()?></td>
                                    <td><?= $usuarioFetch->getNumero()?></td>
                                    <td><?= $usuarioFetch->getComplemento()?></td>
                                    <td><?= $usuarioFetch->getBairro()?></td>
                                    <td><?= $usuarioFetch->getCidade()?></td>
                                    <td><?= $usuarioFetch->getUf()?></td>
                                    <td><?= $usuarioFetch->getCep()?></td>
                                    <td><?= $usuarioFetch->getObs()?></td>
                                    <td>
                                        <a href="alterar_adm_usu.php?id_usuario=<?= $usuarioFetch->getId_usuario()?>" title="ALTERAR"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="../control/excluir_adm.php?id_usuario=<?= $usuarioFetch->getId_usuario()?>" title="EXCLUIR" onclick="return confirm('Deseja excluir esse usuário?')"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
            <?php }  
            } else {
                ?>
                <div class="conteudo" id="usuario">
                    <h2>Usuários</h2>
                    <?php
                    require_once '../model/usuarioDAO.php';
                    $usuarioDAO = new UsuarioDAO();

                    $usuario = $usuarioDAO->listarUsuarios();
                    
                    ?>
                    <table id="dataTable">
                        <thead>
                            <tr>
                                <th>Perfil</th>
                                <th>Foto</th>
                                <th>Nome do Cliente</th>
                                <th>E-mail</th>
                                <th>CPF</th>
                                <th>Telefone</th>
                                <th>Data de Nascimento</th>
                                <th>Sexo</th>
                                <th>Situação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuario as $usuarioFetch) { ?>
                            <tr>
                                <td><?= $usuarioFetch["nome_perfil"] ?></td>
                                <td><img src="../assets/pessoas/<?= $usuarioFetch["foto"]?>" alt="Foto do Cliente"></td>
                                <td><?= $usuarioFetch["nome_usu"] ?></td>
                                <td><?= $usuarioFetch["email"] ?></td>
                                <td><?= $usuarioFetch["cpf"] ?></td>
                                <td><?= $usuarioFetch["telefone"] ?></td>
                                <td><?= $usuarioFetch["dt_nascimento"]?></td>
                                <td><?= $usuarioFetch["sexo"] ?></td>
                                <td><?= $usuarioFetch["situacao"] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <thead>
                            <tr>
                                <th>Endereço</th>
                                <th>Número</th>
                                <th>Complemento</th>
                                <th>Bairro</th>
                                <th>Cidade</th>
                                <th>UF</th>
                                <th>CEP</th>
                                <th>Observação</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuario as $usuarioFetch) { ?>
                            <tr>
                                <td><?= $usuarioFetch["endereco"] ?></td>
                                <td><?= $usuarioFetch["numero"] ?></td>
                                <td><?= $usuarioFetch["complemento"] ?></td>
                                <td><?= $usuarioFetch["bairro"] ?></td>
                                <td><?= $usuarioFetch["cidade"] ?></td>
                                <td><?= $usuarioFetch["uf"] ?></td>
                                <td><?= $usuarioFetch["cep"] ?></td>
                                <td><?= $usuarioFetch["obs"] ?></td>
                                <td>
                                    <a href="alterar_adm_usu.php?id_usuario=<?= $usuarioFetch["id_usuario"]?>" title="ALTERAR"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="../control/excluir_adm.php?id_usuario=<?= $usuarioFetch["id_usuario"]?>" title="EXCLUIR" onclick="return confirm('Deseja excluir esse usuário?')"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
        <?php } ?> 
    </main>   
</body>
<script>
    document.getElementById('pesquisar').addEventListener('input', function() {
        var searchValue = this.value.toLowerCase();
        var table = document.getElementById('dataTable');
        var rows = table.getElementsByTagName('tr');

        for (var i = 0; i < rows.length; i++) {
            var rowData = rows[i].getElementsByTagName('td');
            var foundMatch = false;

            for (var j = 0; j < rowData.length; j++) {
                var cellData = rowData[j].textContent.toLowerCase();

                if (cellData.indexOf(searchValue) > -1) {
                    foundMatch = true;
                    break;
                }
            }

            rows[i].style.display = foundMatch ? '' : 'none';
        }
    });
</script>
</html>

