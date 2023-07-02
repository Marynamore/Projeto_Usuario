<?php
session_start();

if (isset($_SESSION["id_usuario"])) {
    $usuarioLogado = $_SESSION["nome_usu"];
    $id_usuarioLogado = $_SESSION["id_usuario"];
    $id_perfil = $_SESSION["id_perfil"];
} else {
    $usuarioLogado = null;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="css/login.css" rel="stylesheet">
    <script type="text/javascript" src="js/modal.js"></script>
    <link href="css/modal.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <title>Meu Projeto</title>
    <script>
        function exibirAlerta(tipo, mensagem) {
            let title = tipo === 'success' ? 'Login realizado com Sucesso!' : 'OPS! Email e/ou Senha Inválidos';
            Swal.fire({
                icon: tipo,
                title: title,
                text: mensagem,
            });
        }
    </script>

</head>
<body>
  <!-- MENU CONFORME LOGIN -->
    <header class="main_header">
        <a href="" class="logo">
            <img src="./assets/Logo.png" alt="Bem vindo ao projeto usuário">
        </a>
        <nav class="navbar">
            <a href="index.php"><i class="fa-solid fa-house"></i>HOME</a></li>
            <?php
                if (!empty($usuarioLogado)) {
                    if ($id_perfil == 1) {
                        echo '<a href="./view/perfil_adm.php"><i class="fa-solid fa-user"></i>Painel Administrador</a>';
                        echo '<a class="border1" href="./control/control_sair.php" class="item_menu"><i class="fa-solid fa-right-from-bracket"></i>SAIR</a>';
                    } elseif ($id_perfil == 3) {
                        echo '<a href="./view/perfil_moderador.php"><i class="fa-solid fa-users"></i>PAINEL MODERADOR</a>';
                        echo '<a class="border1" href="./control/control_sair.php" class="item_menu"><i class="fa-solid fa-right-from-bracket"></i>SAIR</a>';
                    } elseif ($id_perfil == 2) {
                        echo '<a href="./view/perfil_cliente.php?id_usuario=' . $id_usuarioLogado . '" onclick="funcPerfil()"><i class="fa-solid fa-user"></i>' . $usuarioLogado . '</a>';
                        echo '<a class="border1" href="./control/control_sair.php" class="item_menu"><i class="fa-solid fa-right-from-bracket"></i>SAIR</a>';
                    }
                } else {
                    echo '<a href="./view/cadastro_usuario.php"><i class="fa-solid fa-user"></i>CADASTRO</a>';
                    echo '<a href="" class="modal-link"><i class="fa-solid fa-user"></i>LOGIN</a>';
                    echo '<a href="https://marynamore.github.io/profile/" target="_blank"><i class="fa-solid fa-users"></i>CONTATO</a>';
                }
            ?>
        </nav>
    </header>
    <?php
    if (isset($_GET['msg'])) {
        if ($_GET['msg'] === 'success') {
            $tipo = 'success';
            $mensagem = 'Login realizado com Sucesso!';
        } elseif ($_GET['msg'] === 'error') {
            $tipo = 'error';
            $mensagem = 'OPS! Email e/ou Senha Inválidos';
        }

        echo '<script>exibirAlerta("' . $tipo . '", "' . $mensagem . '");</script>';
    }
    ?>

<!--POP LOGIN-->
    <div class="overlay"></div>
        <div class="modal">
            <div class="div_login">
                <form action="./control/login_control.php" method="POST">
                <h1>Login</h1><br>
                <input type="text" placeholder="Email" name="email" class="input">
                <br><br>
                <input type="password" placeholder="Senha" name="senha" class="input">
                <br><br>
                <button class="button">Enviar</button>
            </form>
        </div>
    </div>
<!--FIM POP LOGIN-->
    <main>
        <section class="main_cta">
            <article class="main_cta_content">
                <div class="main_cta_content_spacer">
                    <header>
                        <h1>Bem-vindo ao Meu Projeto</h1>
                    </header>
                    <p>Aqui você encontrará recursos exclusivos para clientes, administradores e moderadores.</p>
                </div>
            </article>
        </section>
        <section class="main_blog" id="seuespaco">
            <header class="main_blog_header">
                <h1>Seu espaço</h1>
            </header>
            <aside>
                <div class="imagens_acesso">
                    <img src="https://images.unsplash.com/photo-1556741533-6e6a62bd8b49?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fGNsaWVudGV8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=400&q=60" alt="Imagem post" title="Cliente" class="imagem1">
                    <p class="category">Área do Cliente</p><br>
                    <p>Acesse aqui os recursos exclusivos disponíveis para clientes.</p>
                    <br>
                    <a href="./view/perfil_cliente.php" class="btn">Acesse</a>
                </div>
            </aside>
            <aside>
                <div class="imagens_acesso">
                    <img src="https://images.unsplash.com/photo-1631624215749-b10b3dd7bca7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGFkbWluaXN0cmFkb3J8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=400&q=60" alt="Imagem post" title="Moderador" class="imagem1">
                    <p class="category">Área do Moderador</p><br>
                    <p>Acesse aqui os recursos exclusivos disponíveis para moderadores.</p>
                    <br>
                    <a href="./view/pagina_moderador.php" class="btn">Acesse</a>
                </div>
            </aside>
            <aside>
                <div class="imagens_acesso">
                    <img src="https://media.istockphoto.com/id/1438634414/pt/foto/business-women-laptop-and-and-happy-team-in-office-for-web-design-collaboration-and-training.webp?b=1&s=170667a&w=0&k=20&c=m-3MLU7IDG5AP3QNwhfv5kXNhPS0gTlevT_M7kCAe5c=" alt="Imagem post" title="Administrador" class="imagem1">
                    <p class="category">Área do Administrador</p><br>
                    <p>Acesse aqui os recursos exclusivos disponíveis para administradores.</p>
                    <br>
                    <a href="./view/dashboard_adm.php" class="btn">Acesse</a>
                </div>
            </aside>
        </section>
    </main>
    <hr>
    <footer>
        <section class="main_footer">
            <article class="main_footer_our_pages">
                <header>
                    <h2>Meu Cartão Postal</h2>
                </header>
                <ul>
                    <li><a href="https://marynamore.github.io/profile/">Minha Landing Page</a></li>
                </ul>
            </article>

            <article class="main_footer_links">
                <header>
                    <h2>Links Úteis</h2>
                </header>
                <ul>
                    <li><a href="#">Política de Privacidade</a></li>
                    <li><a href="#">Aviso Legal</a></li>
                    <li><a href="#">Termos de Uso</a></li>
                </ul>
            </article>

            <article class="main_footer_about">
                <header>
                    <h2>Sobre o Projeto</h2>
                </header>
                <p>O objetivo é permitir que os usuários realizem operações de criação, leitura, atualização e exclusão de informações em um banco de dados, fornecendo diferentes funcionalidades e permissões de acordo com o tipo de usuário logado.</p>
            </article>
        </section>
        <hr>
        <p>&copy; 2023 Meu Projeto. Todos os direitos reservados.</p>
    </footer>
    <script src="./js/script.js"></script>
</body>
</html>

