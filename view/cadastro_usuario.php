<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <title>Cadastro Usuário</title>
</head>
<body>
    <h1>Cadastre-se</h1>
    <main id="container">
        <!-- Início do formulário -->
        <form action="../control/cadastro_control.php" method="post" enctype="multipart/form-data">
            <fieldset class="grupo">
                <!-- Campo do nome com legenda "nome" e css de classe "campo" -->
                <div class="filde">
                    <label for="foto">Foto de Perfil:</label>
                    <input type="file" name="foto" id="" required>
                </div>
                <div class="field">
                    <label for="nome_usu"><strong>Nome:</strong></label>
                    <input type="text" name="nome_usu" id="" required>
                </div>
                <div class="field">
                    <label for="sobrenome_usu"><strong>Sobrenome:</strong></label>
                    <input type="text" name="sobrenome_usu" id="">
                </div>

                <div class="field">
                    <label for="email"><strong>Email:</strong></label>
                    <input type="text" name="email" id="">
                </div>
            </fieldset>
            <fieldset class="grupo">
                <div class="field">
                    <label for="cpf"><strong>CPF:</strong></label>
                    <input type="text" name="cpf" id="">
                </div>

                <div class="field">
                    <label for="telefone"><strong>Telefone:</strong></label>
                    <input type="tel" name="telefone" id="">
                </div>
                <div class="field">
                    <label for="senha"><strong>Senha:</strong></label>
                    <input type="text" name="senha" id="">
                </div>
            </fieldset>
                <div class="field">
                    <label for="dt_nascimento"><strong>Data de Nascimento:</strong><br></label>
                    <input type="date" name="dt_nascimento" id="">
                </div>
                <div class="field">
                    <label for="sexo"><strong>Gênero:</strong></label><br>
                    <label for="sexo">
                        <input type="radio" id="feminino" name="sexo" value="F" checked> Feminino 
                    </label>
                    <label for="sexo">
                        <input type="radio" id="masculino" name="sexo" value="M"> Masculino
                    </label>
                    <label for="sexo">
                        <input type="radio" id="outro" name="sexo" value="NB"> Não Binário
                    </label>
                    <label for="sexo">
                        <input type="radio" id="outro" name="sexo" value="PD"> Prefiro não declarar
                    </label>
                </div>
            <br>
            <br>
            <fieldset class="grupo">
                <div class="field">
                    <label for="endereco"><strong>Endereço:</strong></label>
                    <input type="text" name="endereco" id="">
                </div>
                <div class="field">
                    <label for="cidade"><strong>Cidade:</strong></label>
                    <input type="text" name="cidade" id="">
                </div>
                <div class="field">
                    <label for="bairro"><strong>Bairro:</strong></label>
                    <input type="text" name="bairro" id="">
                </div>
            </fieldset>
            <fieldset class="grupo">
                <div class="field">
                    <label for="cep"><strong>CEP:</strong></label>
                    <input type="text" name="cep" id="">
                </div>
                <div class="field">
                    <label for="numero"><strong>Nº:</strong></label>
                    <input type="number" name="numero" id="">
                </div>
                <div class="field">
                    <label for="complemento"><strong>Complemento:</strong></label>
                    <input type="text" name="complemento" id="">
                </div>
                <div class="field">   
                    <label for="uf"><strong>UF:</strong></label>                     
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
                    <label for="obs"><strong>Observações:</strong></label>
                    <textarea rows="6" style="width: 26em" id="" name="obs"></textarea>
                </div>
                <input type="submit" value="Enviar" name="submit" class="botao">
                <input type="reset" name="reset" id="reset" value="Limpar" class="botao">
            </fieldset>
        </form>
    </main>
</body>
</html>

