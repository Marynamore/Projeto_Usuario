<?php 

require_once 'conexao.php';
require_once 'usuarioDTO.php';

class UsuarioDAO{

    //atributo que guarda conexao
    public $pdo ;

    //cria conexão com o banco de dados
    public function __construct(){   
        $this->pdo = Conexao::getInstance();
    }

    public function logarEmail($email, $senha){
        try{
            $sql = "SELECT u.id_usuario,u.nome_usu,u.email,u.senha,u.id_perfil,p.nome_perfil FROM usuario u INNER JOIN perfil_usu p ON u.id_perfil = p.id_perfil WHERE email=? AND senha=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1,$email);//associa o valor senha a 1a interrogação
            $stmt->bindValue(2,$senha);//associa o valor senha a 2a interrogação
            $stmt->execute();//executa comando sql

            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        }catch(PDOException $exc){
            echo $exc->getMessage();
        }

    }//fim do metodo logarEmail

    public function cadastrarUsuario(UsuarioDTO $usuarioDTO) {
        try {
            $sql = "INSERT INTO usuario (nome_usu, email, senha, cpf, telefone, sexo, dt_nascimento, endereco, numero, complemento, bairro, cidade, uf, cep,  id_perfil, situacao) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql); //prepara sql a ser executada
            $stmt->bindValue(1,$usuarioDTO->getNome_usu()); //associa o valor senha a 1a interrogação
            $stmt->bindValue(2,$usuarioDTO->getEmail()); //associa o valor senha a 2a interrogação
            $stmt->bindValue(3,$usuarioDTO->getSenha()); //associa o valor senha a 3a interrogação
            $stmt->bindValue(2, $usuarioDTO->getCpf()); //associa o valor senha a 2a interrogação
            $stmt->bindValue(4, $usuarioDTO->getTelefone()); //associa o valor senha a 4a interrogação
            $stmt->bindValue(5, $usuarioDTO->getSexo()); //associa o valor senha a 5a interrogação
            $stmt->bindValue(6, $usuarioDTO->getDt_nascimento()); //associa o valor senha a 6a interrogação
            $stmt->bindValue(7,$usuarioDTO->getEndereco()); //associa o valor senha a 7a interrogação
            $stmt->bindValue(8,$usuarioDTO->getNumero()); //associa o valor senha a 8a interrogação
            $stmt->bindValue(9,$usuarioDTO->getComplemento()); //associa o valor senha a 9a interrogação
            $stmt->bindValue(10,$usuarioDTO->getBairro()); //associa o valor senha a 10a interrogação
            $stmt->bindValue(11,$usuarioDTO->getCidade()); //associa o valor senha a 11a interrogação
            $stmt->bindValue(12,$usuarioDTO->getUf()); //associa o valor senha a 12a interrogação
            $stmt->bindValue(13,$usuarioDTO->getCep()); //associa o valor senha a 13a interrogação
            $stmt->bindValue(14,$usuarioDTO->getId_Perfil()); //associa o valor senha a 14a interrogação
            $stmt->bindValue(15,$usuarioDTO->getSituacao()); //associa o valor senha a 15a interrogação
        
            $retorno = $stmt->execute();//executa comando sql
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die();
        }
    }//fim do metodo cadastrarUsuario

    public function buscarPorID($id) {
        try {
            $sql = "SELECT * FROM usuario WHERE id_usuario=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1,$id); //associa o valor senha a 1a interrogação
            $stmt->execute(); //executa comando sql
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die();
        }
    }//fim do recuperarPorID 

    public function atualizarUsuarioPorID(UsuarioDTO $usuarioDTO) {
        try {
            $sql = "UPDATE usuario SET nome_usu=?, email=?, senha=?, cpf=?, telefone=?, sexo=?, dt_nascimento=?, endereco=?, numero=?,complemento=?, bairro=?, cidade=?, uf=?, cep=?, id_perfil=?, situacao=? WHERE id_usuario=?";
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindValue(1,$usuarioDTO->getNome_usu()); //associa o valor senha a 1a interrogação
            $stmt->bindValue(2,$usuarioDTO->getEmail()); //associa o valor senha a 2a interrogação
            $stmt->bindValue(3,$usuarioDTO->getSenha()); //associa o valor senha a 3a interrogação
            $stmt->bindValue(4, $usuarioDTO->getCpf()); //associa o valor senha a 4a interrogação
            $stmt->bindValue(5, $usuarioDTO->getTelefone()); //associa o valor senha a 5a interrogação
            $stmt->bindValue(6, $usuarioDTO->getSexo()); //associa o valor senha a 6a interrogação
            $stmt->bindValue(7, $usuarioDTO->getDt_nascimento()); //associa o valor senha a 7a interrogação
            $stmt->bindValue(8,$usuarioDTO->getEndereco()); //associa o valor senha a 8a interrogação
            $stmt->bindValue(9,$usuarioDTO->getNumero()); //associa o valor senha a 9a interrogação
            $stmt->bindValue(10,$usuarioDTO->getComplemento()); //associa o valor senha a 10a interrogação
            $stmt->bindValue(11,$usuarioDTO->getBairro()); //associa o valor senha a 11a interrogação
            $stmt->bindValue(12,$usuarioDTO->getCidade()); //associa o valor senha a 12a interrogação
            $stmt->bindValue(13,$usuarioDTO->getUf()); //associa o valor senha a 13a interrogação
            $stmt->bindValue(14,$usuarioDTO->getCep()); //associa o valor senha a 14a interrogação
            $stmt->bindValue(15,$usuarioDTO->getId_Perfil()); //associa o valor senha a 15a interrogação
            $stmt->bindValue(16,$usuarioDTO->getSituacao()); //associa o valor senha a 16a interrogação
            $stmt->bindValue(17,$usuarioDTO->getId_usuario()); //associa o valor senha a 17a interrogação

            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die();
        }
    }//fim do metodo atualizarUsuarioPorID


    public function listarUsuarios() {
        try {
            $sql = "SELECT * FROM usuario ORDER BY nome_usu";
            $stmt = $this->pdo->prepare($sql); //prepara sql a ser executada
            $stmt->execute(); //executa comando sql

            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die();
        }
    }//fim do metodo listarUsuario

//metodo para excluir usuario pela chave primária (id_usuario)
    public function excluirUsuarioPorID($id) {
        try {
            $sql = "DELETE FROM usuario WHERE id_usuario=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1,$id); //associa o valor senha a 1a interrogação
            $retorno = $stmt->execute(); //executa comando sql
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die();
        }
    }//fim do excluirUsuarioPorID  

}
