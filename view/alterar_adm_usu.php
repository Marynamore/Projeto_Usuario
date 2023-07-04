<?php
session_start();

require_once '../model/usuarioDAO.php';

$usuarioDAO = new UsuarioDAO();

if(isset($_SESSION['id_usuario'])){
    $nome_usuario = $_SESSION['nome_usu'];
    $id = $_SESSION['id_usuario'];
    $id_perfil = $_SESSION['id_perfil'];

    $usuarioFetch = $usuarioDAO->mostrarFoto($id);
    
    if (isset($_GET['id_usuario'])) {
        $id_cliente = $_GET['id_usuario'];
        // Use o ID do cliente para buscar os dados corretos no banco de dados
        $usuario = $usuarioDAO->buscarPorID($id_cliente);
    } else {
        // Redirecione de volta para a lista de administrador ou exiba uma mensagem de erro, se necessário
    }
}else{
    $nome_usuario = "";
    header("Location: ../index.php?msg=Usuário não encontrado");
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <title>Alterar Cliente</title>
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
    <main id="container">
        <h1>Dados a serem Alterados!</h1>
        <!-- Início do formulário -->
        <form action="../control/alterar_cliente_control.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="situacao" value="<?= $usuario->getSituacao()?>">
            <input type="hidden" name="id_usuario" value="<?= $usuario->getId_usuario()?>">
            <fieldset class="grupo">
                <legend><strong>Dados Pessoais</strong></legend>
                <!-- Campo do nome com legenda "nome" e css de classe "campo" -->
                <div class="field">
                    <label for="foto"><strong>Foto de Perfil:</strong></label>
                    <input type="file" name="foto" class="input" value="<?= $usuario->getFoto()?>" required>
                </div>
                <div class="field">
                    <label for="nome_usu"><strong>Nome Completo:</strong><br></label>
                    <input type="text" name="nome_usu" class="input" value="<?= $usuario->getNome_usu()?>" required>
                </div>
                <div class="field">
                    <label for="cpf"><strong>CPF:</strong><br></label>
                    <input type="text" name="cpf" value="<?= $usuario->getCpf()?>" class="input">
                </div>  
                <div class="field">
                    <label for="email"><strong>Email:</strong><br></label>
                    <input type="text" name="email" value="<?= $usuario->getEmail()?>" class="input">
                </div>
                <div class="field">
                    <label for="senha"><strong>Senha:</strong><br></label>
                    <input type="password" name="senha" value="<?= $usuario->getSenha()?>" class="input">
                </div>
                <div class="field">
                    <label for="telefone"><strong>Telefone:</strong><br></label>
                    <input type="tel" name="telefone" value="<?= $usuario->getTelefone()?>" class="input">
                </div>
                <div class="field">
                    <label for="dt_nascimento"><strong>Data de Nascimento:</strong><br></label>
                    <input type="date" name="dt_nascimento" value="<?= $usuario->getDt_nascimento()?>" class="input">
                </div>
                <div class="field">
                    <label for="sexo"><strong>Gênero:</strong></label><br>
                    <select id="sexo" name="sexo" required>
                        <option value="" selected disabled>Selecione seu Sexo</option>
                        <option value="feminino" <?=($usuario->getSexo() == 'feminino') ? 'selected' : ''; ?>>Feminino</option>
                        <option value="masculino" <?=($usuario->getSexo() == 'masculino') ? 'selected' : ''; ?>>Masculino</option>
                        <option value="naoBinario" <?=($usuario->getSexo() == 'naoBinario') ? 'selected' : ''; ?>>Não Binário</option>
                        <option value="naoDeclarar" <?=($usuario->getSexo() == 'naoDeclarar') ? 'selected' : ''; ?>>Prefiro não declarar</option>
                    </select>
                </div>
            </fieldset>
            <fieldset class="grupo">
                <legend><strong>Endereço</strong></legend>
                <div class="field">
                    <label for="endereco"><strong>Endereço:</strong><br></label>
                    <input type="text" name="endereco" value="<?= $usuario->getEndereco()?>" class="input">
                </div>
                <div class="field">
                    <label for="numero"><strong>Nº:</strong><br></label>
                    <input type="number" name="numero" value="<?= $usuario->getNumero()?>" class="input">
                </div>
                <div class="field">
                    <label for="cidade"><strong>Cidade:</strong><br></label>
                    <input type="text" name="cidade" value="<?= $usuario->getCidade()?>" class="input">
                </div>
                <div class="field">
                    <label for="bairro"><strong>Bairro:</strong><br></label>
                    <input type="text" name="bairro" value="<?= $usuario->getBairro()?>" class="input">
                </div>
                <div class="field">
                    <label for="cep"><strong>CEP:</strong><br></label>
                    <input type="text" name="cep" value="<?= $usuario->getCep()?>" class="input">
                </div>
                <div class="field">
                    <label for="complemento"><strong>Complemento:</strong><br></label>
                    <input type="text" name="complemento" value="<?= $usuario->getComplemento()?>" class="input">
                </div>
                <div class="field">
                    <label for="sexo"><strong>Selecione seu perfil:</strong></label><br>
                    <select id="fk_id_perfil" name="fk_id_perfil" required>
                        <option value="1" <?=($usuario->getId_perfil() == '1') ? 'selected' : ''; ?>>Administrador</option>
                        <option value="2" <?=($usuario->getId_perfil() == '2') ? 'selected' : ''; ?>>Cliente</option>
                        <option value="3" <?=($usuario->getId_perfil() == '3') ? 'selected' : ''; ?>>Moderador</option>
                    </select>
                </div>
                <div class="field">   
                    <label for="uf"><strong>UF:</strong></label><br>                     
                    <select id="estado" name="uf" required>
                        <option value="" selected disabled>Selecione um Estado</option>
                        <option value="AC" <?=($usuario->getUf() == 'AC') ? 'selected' : ''; ?>>Acre</option>
                        <option value="AL" <?=($usuario->getUf() == 'AL') ? 'selected' : ''; ?>>Alagoas</option>
                        <option value="AP" <?=($usuario->getUf() == 'AP') ? 'selected' : ''; ?>>Amapá</option>
                        <option value="AM" <?=($usuario->getUf() == 'AM') ? 'selected' : ''; ?>>Amazonas</option>
                        <option value="BA" <?=($usuario->getUf() == 'BA') ? 'selected' : ''; ?>>Bahia</option>
                        <option value="CE" <?=($usuario->getUf() == 'CE') ? 'selected' : ''; ?>>Ceará</option>
                        <option value="DF" <?=($usuario->getUf() == 'DF') ? 'selected' : ''; ?>>Distrito Federal</option>
                        <option value="ES" <?=($usuario->getUf() == 'ES') ? 'selected' : ''; ?>>Espírito Santo</option>
                        <option value="GO" <?=($usuario->getUf() == 'GO') ? 'selected' : ''; ?>>Goiás</option>
                        <option value="MA" <?=($usuario->getUf() == 'MA') ? 'selected' : ''; ?>>Maranhão</option>
                        <option value="MT" <?=($usuario->getUf() == 'MT') ? 'selected' : ''; ?>>Mato Grosso</option>
                        <option value="MS" <?=($usuario->getUf() == 'MS') ? 'selected' : ''; ?>>Mato Grosso do Sul</option>
                        <option value="MG" <?=($usuario->getUf() == 'MG') ? 'selected' : ''; ?>>Minas Gerais</option>
                        <option value="PA" <?=($usuario->getUf() == 'PA') ? 'selected' : ''; ?>>Pará</option>
                        <option value="PB" <?=($usuario->getUf() == 'PB') ? 'selected' : ''; ?>>Paraíba</option>
                        <option value="PR" <?=($usuario->getUf() == 'PR') ? 'selected' : ''; ?>>Paraná</option>
                        <option value="PE" <?=($usuario->getUf() == 'PE') ? 'selected' : ''; ?>>Pernambuco</option>
                        <option value="PI" <?=($usuario->getUf() == 'PI') ? 'selected' : ''; ?>>Piauí</option>
                        <option value="RJ" <?=($usuario->getUf() == 'RJ') ? 'selected' : ''; ?>>Rio de Janeiro</option>
                        <option value="RN" <?=($usuario->getUf() == 'RN') ? 'selected' : ''; ?>>Rio Grande do Norte</option>
                        <option value="RS" <?=($usuario->getUf() == 'RS') ? 'selected' : ''; ?>>Rio Grande do Sul</option>
                        <option value="RO" <?=($usuario->getUf() == 'RO') ? 'selected' : ''; ?>>Rondônia</option>
                        <option value="RR" <?=($usuario->getUf() == 'RR') ? 'selected' : ''; ?>>Roraima</option>
                        <option value="SC" <?=($usuario->getUf() == 'SC') ? 'selected' : ''; ?>>Santa Catarina</option>
                        <option value="SP" <?=($usuario->getUf() == 'SP') ? 'selected' : ''; ?>>São Paulo</option>
                        <option value="SE" <?=($usuario->getUf() == 'SE') ? 'selected' : ''; ?>>Sergipe</option>
                        <option value="TO" <?=($usuario->getUf() == 'TO') ? 'selected' : ''; ?>>Tocantins</option>
                        <option value="EX" <?=($usuario->getUf() == 'EX') ? 'selected' : ''; ?>>Estrangeiro</option>
                    </select><br><br><br>
                </div>
                <div class="field">
                    <label for="obs"><strong>Observações:</strong><br></label>
                    <textarea rows="6" style="width: 26em" name="obs" value="<?= $usuario->getObs()?>" ></textarea>
                </div>
            </fieldset> <br><br><br>
            <input type="submit" value="Enviar" name="submit" class="botao">
        </form>
    </main>
    <script>
        $(document).ready(function() {
            // Máscara para telefone
            $('input[name="telefone"]').mask('(00) 0000-0000');
            
            // Máscara para CPF
            $('input[name="cpf"]').mask('000.000.000-00');
            
            // Máscara para CEP
            $('input[name="cep"]').mask('00000-000');
        });
    </script>
</body>
</html>

