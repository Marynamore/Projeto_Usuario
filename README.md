# Projeto Usuario

Este projeto em PHP utiliza Programação Orientada a Objetos (POO) para criar um sistema CRUD (Create, Read, Update, Delete) que envolve três tipos de usuários: usuário comum, administrador e moderador.

O objetivo do projeto é permitir que os usuários realizem operações de criação, leitura, atualização e exclusão de informações em um banco de dados, fornecendo diferentes funcionalidades e permissões de acordo com o tipo de usuário logado.

## Funcionalidades

O sistema oferece as seguintes funcionalidades:

- [x] Cadastro de usuários: Permite que novos usuários se registrem no sistema.

- [x] Login e autenticação: Os usuários podem fazer login e autenticar-se para acessar as funcionalidades do sistema.

- [x] Permissões de acesso: Cada tipo de usuário (usuário comum, administrador e moderador) possui diferentes permissões e níveis de acesso no sistema.

- [x] Operações CRUD: Os usuários podem realizar operações de criação, leitura, atualização e exclusão de informações no banco de dados.

- [x] Os pilares do Banco de Dados são aplicados para garantir consistência, integridade referencial e eficiência nas consultas.

## Requisitos

Certifique-se de ter os seguintes requisitos instalados em seu ambiente de desenvolvimento:

- **IDE:** escolha um editor de texto simples para escrever seus scripts PHP;
- **PHP:** É necessário ter o interpretador PHP instalado;
- **XAMPP:** Ele fornece um servidor web Apache para executar seus scripts, o interpretador PHP, o banco de dados MySQL e o servidor de banco de dados MariaDB, juntamente com outras ferramentas e utilitários.
- **Configuração do servidor:**
  - Ao instalar o XAMPP, um diretório será criado no seu computador para armazenar todos os arquivos e componentes.
      O diretório padrão é "C:\xampp" no Windows e "/opt/lampp" no Linux.
  - Dentro desse diretório, você encontrará subdiretórios para cada componente, como "apache" para o servidor web Apache, "php" para o interpretador PHP e "mysql" para o banco de dados MySQL/MariaDB.
  - O diretório "htdocs" é onde você deve colocar seus arquivos PHP para que possam ser executados pelo servidor web.
  - Depois de instalar e configurar o XAMPP, inicie o servidor Apache e o servidor MySQL/MariaDB para começar a desenvolver e testar seus scripts PHP.
  - Acesse "http://localhost" em seu navegador para acessar seus arquivos PHP.

## Se você preferir executar um servidor PHP embutido diretamente no terminal Linux
1. **Verifique se o PHP está instalado:**
   - Digite o seguinte comando:
     ```shel
     php -v
      ```
2. **Inicie o servidor embutido:**
   - No terminal navegue até o diretório onde você salvou o arquivo PHP: (utilize o comando cd)
     ```shel
       php -S localhost:8000
      ```
     OBS:  Você pode substituir "8000" por qualquer outra porta de sua preferência.
     
3. **Acesse o servidor web:**
    - Abra o seu navegador e digite http://localhost:8000 na barra de endereço.
      OBS:  Você também pode especificar um arquivo PHP específico para ser executado no servidor embutido, fornecendo o caminho para o arquivo após a porta!
   ```shel
     php -S localhost:8000 arquivo.php
    ```

## Configuração

Siga as etapas abaixo para configurar e executar o projeto em seu ambiente local:

1. Clone este repositório em seu ambiente local.
2. Configure as informações de conexão com o banco de dados no arquivo `config.php`.
3. Importe o arquivo `database.sql` para criar a estrutura do banco de dados.
4. Inicie um servidor local ou configure o ambiente de desenvolvimento de sua preferência.
5. Acesse o projeto em seu navegador e comece a utilizar as funcionalidades.

## Contribuição

Contribuições são bem-vindas! Se você deseja contribuir para este projeto, siga as etapas abaixo:

1. Faça um fork deste repositório.
2. Crie um branch para a sua contribuição.
3. Faça as alterações desejadas.
4. Envie um pull request descrevendo suas alterações.

Todas as contribuições passarão por uma revisão antes de serem incorporadas ao projeto.

## Licença

Este projeto está licenciado sob a [MIT](LICENSE).

## Contato

Se você tiver alguma dúvida ou sugestão sobre este projeto, sinta-se à vontade para entrar em contato comigo
