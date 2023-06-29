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
    <title>Meu Projeto</title>
</head>
<body>
  <!-- MENU CONFORME LOGIN -->
    <header class="main_header">
        <div class="main_header_content">
            <a href="#" class="logo">
                <img src="img/logo.png" alt="Bem vindo ao projeto prático Html5 e Css3 Essentials" title="Bem vindo ao projeto prático Html5 e Css3 Essentials">
            </a>
            <nav class="main_header_content_menu">
                <ul>
                    <li><a href="">Home</a></li>
                    <?php
                        if (!empty($usuarioLogado)) {
                            if ($id_perfil == 1) {
                                echo '<a href="./view/dashboard/painel_adm.php"><i class="fa-solid fa-user"></i>Painel Administrador</a>';
                                echo '<a class="border1" href="./control/control_sair.php" class="item_menu"><i class="fa-solid fa-right-from-bracket"></i>SAIR</a>';
                            } elseif ($id_perfil == 2) {
                                echo '<a href="./view/dashboard/painel_moderador.php"><i class="fa-solid fa-users"></i> PAINEL MODERADOR</a>';
                                echo '<a class="border1" href="./control/control_sair.php" class="item_menu"><i class="fa-solid fa-right-from-bracket"></i>SAIR</a>';
                            } elseif ($id_perfil == 3 || $id_perfil == 4) {
                                echo '<a href="./view/perfil_usuario.php?id_usuario=' . $id_usuarioLogado . '" onclick="funcPerfil()"><i class="fa-solid fa-user"></i>' . $usuarioLogado . '</a>';
                                echo '<a class="border1" href="./control/control_sair.php" class="item_menu"><i class="fa-solid fa-right-from-bracket"></i>SAIR</a>';
                            }
                        } else {
                            echo '<a href="./view/cadastro_usuario.php"><i class="fa-solid fa-user"></i>CADASTRO</a>';
                            echo '<a href="" class="modal-link"><i class="fa-solid fa-user"></i>LOGIN</a>';
                            echo '<a href="#contato">Contato</a>';
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
        <h2>Bem-vindo ao Meu Projeto</h2>
        <p>Esta é a página inicial do projeto. Aqui você pode adicionar seu conteúdo principal.</p>
    </main>

    <footer>
        <section class="main_optin_footer">
            <div class="main_optin_footer_content" >
                <header>
                    <h1>Quer receber nosso conteúdo exclusivo? Assina nossa lista VIP :)</h1>
                </header>
                <article>
                    <header>
                        <h2><a href="#" class="btn">Entrar para a lista VIP</a></h2>
                    </header>
                </article>
            </div>
        </section>

        <section class="main_footer">
            <header>
                <h1>Quer saber mais?</h1>
            </header>
            <article class="main_footer_our_pages">
                <header>
                    <h2>Nossas Páginas</h2>
                </header>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">A Escola</a></li>
                    <li><a href="#">Contato</a></li>
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
                <p>Aprenda a trabalhar com HTML5 e CSS3 para desenvolver seus projetos e entregar páginas que estejam dentro
                    dos padrões da WEB seguindo as boas práticas</p>
            </article>
        </section>
        <p>&copy; 2023 Meu Projeto. Todos os direitos reservados.</p>
    </footer>
    <script>
        // Seleciona o link e a janela modal
        var link = document.querySelector('.modal-link');
        var modal = document.querySelector('.modal');
        var overlay = document.querySelector('.overlay');

        // Adiciona um listener de evento para o link
        link.addEventListener('click', function (event) {
            event.preventDefault(); // previne o comportamento padrão do link (navegar para outra página)

            overlay.style.display = 'block'; // exibe a camada escura
            modal.style.display = 'block'; // exibe a janela modal
        });

        // Adiciona um listener de evento para a camada escura
        overlay.addEventListener('click', function () {
            overlay.style.display = 'none'; // oculta a camada escura
            modal.style.display = 'none'; // oculta a janela modal
        });
    </script>
</body>
</html>

