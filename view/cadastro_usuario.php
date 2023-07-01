<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro.css">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <title>Cadastro Usuário</title>
</head>
<body>
    <header class="main_header">
        <a href="../index.php" class="logo">
            <img src="../assets/Logo.png" alt="Bem vindo ao projeto usuário">
        </a>
        <nav class="navbar">
            <a href="../index.php"><i class="fa-solid fa-house"></i>HOME</a><i class="fa-solid fa-grip-lines-vertical"></i><a href="http://" target="_blank"><i class="fa-solid fa-headphones"></i>AJUDA</a>
        </nav>
    </header>
    <hr>
    <main id="container">
        <h1>Cadastre-se</h1>
        <!-- Início do formulário -->
        <form action="../control/cadastro_control.php" method="post" enctype="multipart/form-data">
            <fieldset class="grupo">
                <legend><strong>Dados Pessoais</strong></legend>
                <!-- Campo do nome com legenda "nome" e css de classe "campo" -->
                <div class="field">
                    <label for="foto"><strong>Foto de Perfil:</strong></label>
                    <input type="file" name="foto" class="input" required>
                </div>
                <div class="field">
                    <label for="nome_usu"><strong>Nome Completo:</strong><br></label>
                    <input type="text" name="nome_usu" placeholder="Digite seu nome completo" class="input" required>
                </div>
                <div class="field">
                    <label for="cpf"><strong>CPF:</strong><br></label>
                    <input type="text" name="cpf" placeholder="000.000.000-00" class="input">
                </div>  
                <div class="field">
                    <label for="email"><strong>Email:</strong><br></label>
                    <input type="text" name="email" placeholder="Digite seu email válido" class="input">
                </div>
                <div class="field">
                    <label for="senha"><strong>Senha:</strong><br></label>
                    <input type="text" name="senha" placeholder="Digite sua Senha" class="input">
                </div>
                <div class="field">
                    <label for="telefone"><strong>Telefone:</strong><br></label>
                    <input type="tel" name="telefone" placeholder="(00) 0000-0000" class="input">
                </div>
                <div class="field">
                    <label for="dt_nascimento"><strong>Data de Nascimento:</strong><br></label>
                    <input type="date" name="dt_nascimento" class="input">
                </div>
                <div class="field">
                    <label for="sexo"><strong>Gênero:</strong></label><br>
                    <select id="estado" name="sexo" required>
                        <option value="" selected disabled>Selecione seu Sexo</option>
                        <option value="feminino">Feminino</option>
                        <option value="masculino">Masculino</option>
                        <option value="naoBinario">Não Binário</option>
                        <option value="naoDeclarar">Prefiro não declarar</option>
                    </select>
                </div>
            </fieldset>
            <fieldset class="grupo">
                <legend><strong>Endereço</strong></legend>
                <div class="field">
                    <label for="endereco"><strong>Endereço:</strong><br></label>
                    <input type="text" name="endereco" placeholder="SH Campus Santos Rua ABC Casa 123" class="input">
                </div>
                <div class="field">
                    <label for="numero"><strong>Nº:</strong><br></label>
                    <input type="number" name="numero" placeholder="123" class="input">
                </div>
                <div class="field">
                    <label for="cidade"><strong>Cidade:</strong><br></label>
                    <input type="text" name="cidade" placeholder="Digite sua Cidade" class="input">
                </div>
                <div class="field">
                    <label for="bairro"><strong>Bairro:</strong><br></label>
                    <input type="text" name="bairro" placeholder="Digite seu Bairro" class="input">
                </div>
                <div class="field">
                    <label for="cep"><strong>CEP:</strong><br></label>
                    <input type="text" name="cep" placeholder="00000-000" class="input">
                </div>
                <div class="field">
                    <label for="complemento"><strong>Complemento:</strong><br></label>
                    <input type="text" name="complemento" placeholder="Complemento Opcional" class="input">
                </div>
                <div class="field">   
                    <label for="uf"><strong>UF:</strong></label><br>                     
                    <select id="estado" name="uf" required>
                        <option value="" selected disabled>Selecione um Estado</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                        <option value="EX">Estrangeiro</option>
                    </select><br><br><br>
                </div>
                <div class="field">
                    <label for="obs"><strong>Observações:</strong><br></label>
                    <textarea rows="6" style="width: 26em" placeholder="Se tiver alguma observação pode adicionar a esse campo" name="obs"></textarea>
                </div>
            </fieldset> <br><br><br>
            <input type="submit" value="Enviar" name="submit" class="botao">
            <input type="reset" name="reset" id="reset" value="Limpar" class="botao">
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

