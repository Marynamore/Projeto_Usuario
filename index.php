<?php
session_start();


if (isset($_SESSION["id_usuario"])) {
    $usuarioLogado = $_SESSION["nickname_usu"];
    $id_usuarioLogado = $_SESSION["id_usuario"];
    $id_perfil = $_SESSION["id_perfil"];
} else {
    $usuarioLogado = "";
}
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    // Limpe a mensagem da sessão para que ela não seja exibida novamente na atualização da página
    unset($_SESSION['msg']);
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Meu Projeto</title>
</head>
<body>
  <!-- MENU CONFORME LOGIN -->
    <header class="main_header">
        <div class="main_header_content">
            <a href="#" class="logo">
                <img src="img/logo.png" alt="Bem vindo ao projeto usuário">
            </a>
            <nav class="main_header_content_menu">
                <ul>
                    <li><a href=""><i class="fa-solid fa-house"></i>HOME</a></li>
                    <?php
                        if (!empty($usuarioLogado)) {
                            if ($id_perfil == 1) {
                                echo '<li><a href="./view/dashboard/painel_adm.php"><i class="fa-solid fa-user"></i>Painel Administrador</a></li>';
                                echo '<li><a class="border1" href="./control/control_sair.php" class="item_menu"><i class="fa-solid fa-right-from-bracket"></i>SAIR</a></li>';
                            } elseif ($id_perfil == 2) {
                                echo '<li><a href="./view/dashboard/painel_moderador.php"><i class="fa-solid fa-users"></i> PAINEL MODERADOR</a></li>';
                                echo '<li><a class="border1" href="./control/control_sair.php" class="item_menu"><i class="fa-solid fa-right-from-bracket"></i>SAIR</a></li>';
                            } elseif ($id_perfil == 3 || $id_perfil == 4) {
                                echo '<li><a href="./view/perfil_usuario.php?id_usuario=' . $id_usuarioLogado . '" onclick="funcPerfil()"><i class="fa-solid fa-user"></i>' . $usuarioLogado . '</a></li>';
                                echo '<li><a class="border1" href="./control/control_sair.php" class="item_menu"><i class="fa-solid fa-right-from-bracket"></i>SAIR</a></li>';
                            }
                        } else {
                            echo '<li><a href="./view/cadastro_usuario.php"><i class="fa-solid fa-user"></i>CADASTRO</a></li>';
                            echo '<li><a href="" class="modal-link"><i class="fa-solid fa-user"></i>LOGIN</a></li>';
                            echo '<li><a href="#contato">CONTATO</a></li>';
                        }
                    ?>
                </ul>
            </nav>
        </div>
    </header>
<!--POP LOGIN-->
    <div class="overlay"></div>
        <div class="modal">
            <div class="div_login">
                <form action="control/login_control.php" method="POST">
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
                    <img src="assets/img/cliente.png" alt="Imagem post" title="Cliente" class="imagem1">
                    <p class="category">Área do Cliente</p><br>
                    <p>Acesse aqui os recursos exclusivos disponíveis para clientes.</p>
                    <br>
                    <p><a href="telascliente.php" class="btn">Acesse</a></p>
                </div>
            </aside>
            <aside>
                <div class="imagens_acesso">
                    <img src="assets/img/moderador.png" alt="Imagem post" title="Moderador" class="imagem1">
                    <p class="category">Área do Moderador</p><br>
                    <p>Acesse aqui os recursos exclusivos disponíveis para moderadores.</p>
                    <br>
                    <p><a href="telamoderador.php" class="btn">Acesse</a></p>
                </div>
            </aside>
            <aside>
                <div class="imagens_acesso">
                    <img src="assets/img/administrador.png" alt="Imagem post" title="Administrador" class="imagem1">
                    <p class="category">Área do Administrador</p><br>
                    <p>Acesse aqui os recursos exclusivos disponíveis para administradores.</p>
                    <br>
                    <p><a href="telaadministrador.php" class="btn">Acesse</a></p>
                </div>
            </aside>
        </section>
    </main>
    <hr>
    <footer>
        <section class="main_footer">
            <header>
                <h1>Quer saber mais?</h1>
            </header>
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
        <p>&copy; 2023 Meu Projeto. Todos os direitos reservados.</p>
    </footer>
    <script src="./js/script.js"></script>
</body>
</html>

