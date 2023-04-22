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

    public function logarEmail(UsuarioDTO $usuarioDTO){
        try{
            $sql = "SELECT * FROM usuario WHERE nome=? and loginEmail=? and senha=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1,$usuarioDTO->getNome());//associa o valor senha a 1a interrogação
            $stmt->bindValue(2,$usuarioDTO->getLoginEmail());//associa o valor senha a 2a interrogação
            $stmt->bindValue(3,$usuarioDTO->getSenha());//associa o valor senha a 3a interrogação
            $stmt->execute();//executa comando sql

            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        }catch(PDOException $exc){
            echo $exc->getMessage();
        }

    }//fim do metodo logarEmail

    public function cadastrarUsuario(UsuarioDTO $usuarioDTO) {
        try {
            $sql = "INSERT INTO usuario (nome, cpf_cnpj, endereco, numero,complemento, bairro, cidade, uf, cep, loginEmail, senha, perfil, situacao) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql); //prepara sql a ser executada
            $stmt->bindValue(1,$usuarioDTO->getNome()); //associa o valor senha a 1a interrogação
            $stmt->bindValue(2, $usuarioDTO->getCpf_cnpj()); //associa o valor senha a 2a interrogação
            $stmt->bindValue(3,$usuarioDTO->getEndereco()); //associa o valor senha a 3a interrogação
            $stmt->bindValue(4,$usuarioDTO->getNumero()); //associa o valor senha a 4a interrogação
            $stmt->bindValue(5,$usuarioDTO->getComplemento()); //associa o valor senha a 5a interrogação
            $stmt->bindValue(6,$usuarioDTO->getBairro()); //associa o valor senha a 6a interrogação
            $stmt->bindValue(7,$usuarioDTO->getCidade()); //associa o valor senha a 7a interrogação
            $stmt->bindValue(8,$usuarioDTO->getUf()); //associa o valor senha a 8a interrogação
            $stmt->bindValue(9,$usuarioDTO->getCep()); //associa o valor senha a 9a interrogação
            $stmt->bindValue(10,$usuarioDTO->getLoginEmail()); //associa o valor senha a 10a interrogação
            $stmt->bindValue(11,$usuarioDTO->getSenha()); //associa o valor senha a 11a interrogação
            $stmt->bindValue(12,$usuarioDTO->getPerfil()); //associa o valor senha a 12a interrogação
            $stmt->bindValue(13,$usuarioDTO->getSituacao()); //associa o valor senha a 13a interrogação
            $stmt->execute();//executa comando sql

            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }//fim do metodo cadastrarUsuario

    public function listarUsuarios($filtro) {
        try {
            $sql = "SELECT * FROM usuario";
            $stmt = $this->pdo->prepare($sql); //prepara sql a ser executada
            $stmt->execute(); //executa comando sql

            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }//fim do metodo listarUsuario

//metodo para excluir usuario pela chave primária (id_usuario)
    public function excluirPorID($id) {
        try {
            $sql = "DELETE FROM usuario WHERE id_usuario=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1,$id); //associa o valor senha a 1a interrogação
            $retorno = $stmt->execute(); //executa comando sql
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }//fim do excluirPorID  

    public function recuperarPorID($id) {
        try {
            $sql = "SELECT * FROM usuario WHERE id_usuario=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1,$id); //associa o valor senha a 1a interrogação
            $stmt->execute(); //executa comando sql
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }//fim do recuperarPorID 

    public function atualizarUsuarioPorID(UsuarioDTO $usuarioDTO) {
        try {
            $sql = "UPDATE usuario SET nome=?, cpf_cnpj=?, endereco=?, numero=?,complemento=?, bairro=?, cidade=?, uf=?, cep=?, loginEmail=?, perfil=?, situacao=? WHERE id_usuario=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1,$usuarioDTO->getNome()); //associa o valor senha a 1a interrogação
            $stmt->bindValue(2, $usuarioDTO->getCpf_cnpj()); //associa o valor senha a 2a interrogação
            $stmt->bindValue(3,$usuarioDTO->getEndereco()); //associa o valor senha a 3a interrogação
            $stmt->bindValue(4,$usuarioDTO->getNumero()); //associa o valor senha a 4a interrogação
            $stmt->bindValue(5,$usuarioDTO->getComplemento()); //associa o valor senha a 5a interrogação
            $stmt->bindValue(6,$usuarioDTO->getBairro()); //associa o valor senha a 6a interrogação
            $stmt->bindValue(7,$usuarioDTO->getCidade()); //associa o valor senha a 7a interrogação
            $stmt->bindValue(8,$usuarioDTO->getUf()); //associa o valor senha a 8a interrogação
            $stmt->bindValue(9,$usuarioDTO->getCep()); //associa o valor senha a 9a interrogação
            $stmt->bindValue(10,$usuarioDTO->getLoginEmail());//associa o valor senha a 10a interrogação
            $stmt->bindValue(11,$usuarioDTO->getPerfil()); //associa o valor senha a 11a interrogação
            $stmt->bindValue(12,$usuarioDTO->getSituacao()); //associa o valor senha a 12a interrogação
            $stmt->bindValue(13,$usuarioDTO->getId_usuario()); //associa o valor senha a 13a interrogação

            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }//fim do metodo atualizarUsuarioPorID

}
