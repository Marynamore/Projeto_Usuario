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

    //Função de logar no sistema
    public function logarEmail($email, $senha){
        try{
            $sql = "SELECT u.id_usuario, u.nome_usu, u.email, u.senha, u.fk_id_perfil, p.nome_perfil FROM usuario u INNER JOIN perfil p ON u.fk_id_perfil = p.id_perfil WHERE email=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1,$email);//associa o valor email a 1a interrogação
            $stmt->execute();//executa comando sql
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($retorno && $retorno['senha'] === MD5($senha)) {
                return $retorno;
            } else {
                return false;
            }
        }catch(PDOException $exc){
            echo $exc->getMessage();
        }

    }//fim do metodo logarEmail

    public function cadastrarUsuario(UsuarioDTO $usuarioDTO) {
        try {
            $sql = "INSERT INTO usuario (nome_usu, email, senha, cpf, telefone, sexo, dt_nascimento, endereco, numero, complemento, bairro, cidade, uf, cep,  fk_id_perfil, situacao,foto, obs) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql); //prepara sql a ser executada
            $stmt->bindValue(1,$usuarioDTO->getNome_usu()); //associa o valor nome usuario a 1a interrogação
            $stmt->bindValue(2,$usuarioDTO->getEmail()); //associa o valor email a 2a interrogação
            $stmt->bindValue(3,MD5($usuarioDTO->getSenha())); //associa o valor senha a 3a interrogação
            $stmt->bindValue(2, $usuarioDTO->getCpf()); //associa o valor cpf a 2a interrogação
            $stmt->bindValue(4, $usuarioDTO->getTelefone()); //associa o valor telefone a 4a interrogação
            $stmt->bindValue(5, $usuarioDTO->getSexo()); //associa o valor sexo a 5a interrogação
            $stmt->bindValue(6, $usuarioDTO->getDt_nascimento()); //associa o valor data de nascimento a 6a interrogação
            $stmt->bindValue(7,$usuarioDTO->getEndereco()); //associa o valor endereço a 7a interrogação
            $stmt->bindValue(8,$usuarioDTO->getNumero()); //associa o valor senha a 8a interrogação
            $stmt->bindValue(9,$usuarioDTO->getComplemento()); //associa o valor complemento a 9a interrogação
            $stmt->bindValue(10,$usuarioDTO->getBairro()); //associa o valor bairro a 10a interrogação
            $stmt->bindValue(11,$usuarioDTO->getCidade()); //associa o valor cidade a 11a interrogação
            $stmt->bindValue(12,$usuarioDTO->getUf()); //associa o valor uf a 12a interrogação
            $stmt->bindValue(13,$usuarioDTO->getCep()); //associa o valor cep a 13a interrogação
            $stmt->bindValue(14,$usuarioDTO->getId_Perfil()); //associa o valor id_perfil a 14a interrogação
            $stmt->bindValue(15,$usuarioDTO->getSituacao()); //associa o valor situação a 15a interrogação
            $stmt->bindValue(16,$usuarioDTO->getFoto()); //associa o valor foto a 16a interrogação
            $stmt->bindValue(17,$usuarioDTO->getObs()); //associa o valor da Observação a 16a interrogação
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
            if ($stmt->rowCount() > 0) {
                $usuarioFetch = $stmt->fetch(PDO::FETCH_ASSOC);

                $usuarioDTO = new UsuarioDTO();
                $usuarioDTO->setId_usuario($usuarioFetch["id_usuario"]);
                $usuarioDTO->setNome_usu($usuarioFetch["nome_usu"]);
                $usuarioDTO->setEmail($usuarioFetch["email"]);
                $usuarioDTO->setSenha($usuarioFetch["senha"]);
                $usuarioDTO->setCpf($usuarioFetch["cpf"]);
                $usuarioDTO->setTelefone($usuarioFetch["telefone"]);
                $usuarioDTO->setSexo($usuarioFetch["sexo"]);
                $usuarioDTO->setDt_nascimento($usuarioFetch["dt_nascimento"]);
                $usuarioDTO->setEndereco($usuarioFetch["endereco"]);
                $usuarioDTO->setNumero($usuarioFetch["numero"]);
                $usuarioDTO->setComplemento($usuarioFetch["complemento"]);
                $usuarioDTO->setBairro($usuarioFetch["bairro"]);
                $usuarioDTO->setCidade($usuarioFetch["cidade"]);
                $usuarioDTO->setUf($usuarioFetch["uf"]);
                $usuarioDTO->setCep($usuarioFetch["cep"]);
                $usuarioDTO->setSituacao($usuarioFetch["situacao"]);
                $usuarioDTO->setFoto($usuarioFetch["foto"]);
                $usuarioDTO->setObs($usuarioFetch["obs"]);
                $usuarioDTO->setId_Perfil($usuarioFetch["fk_id_perfil"]);
                return $usuarioDTO;
            }
            return false;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die();
        }
    }//fim do buscarPorID 

    public function atualizarUsuarioPorID(UsuarioDTO $usuarioDTO) {
        try {
            $sql = "UPDATE usuario SET nome_usu=?, email=?, senha=?, cpf=?, telefone=?, sexo=?, dt_nascimento=?, endereco=?, numero=?,complemento=?, bairro=?, cidade=?, uf=?, cep=?, fk_id_perfil=?, situacao=?, foto=? obs=? WHERE id_usuario=?";
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindValue(1,$usuarioDTO->getNome_usu()); //associa o valor nome a 1a interrogação
            $stmt->bindValue(2,$usuarioDTO->getEmail()); //associa o valor email a 2a interrogação
            $stmt->bindValue(3,$usuarioDTO->getSenha()); //associa o valor senha a 3a interrogação
            $stmt->bindValue(4, $usuarioDTO->getCpf()); //associa o valor cpf a 4a interrogação
            $stmt->bindValue(5, $usuarioDTO->getTelefone()); //associa o valor telefone a 5a interrogação
            $stmt->bindValue(6, $usuarioDTO->getSexo()); //associa o valor sexo a 6a interrogação
            $stmt->bindValue(7, $usuarioDTO->getDt_nascimento()); //associa o valor data de nascimento a 7a interrogação
            $stmt->bindValue(8,$usuarioDTO->getEndereco()); //associa o valor endereço a 8a interrogação
            $stmt->bindValue(9,$usuarioDTO->getNumero()); //associa o valor número a 9a interrogação
            $stmt->bindValue(10,$usuarioDTO->getComplemento()); //associa o valor complemento a 10a interrogação
            $stmt->bindValue(11,$usuarioDTO->getBairro()); //associa o valor bairro a 11a interrogação
            $stmt->bindValue(12,$usuarioDTO->getCidade()); //associa o valor cidade a 12a interrogação
            $stmt->bindValue(13,$usuarioDTO->getUf()); //associa o valor uf a 13a interrogação
            $stmt->bindValue(14,$usuarioDTO->getCep()); //associa o valor cep a 14a interrogação
            $stmt->bindValue(15,$usuarioDTO->getId_Perfil()); //associa o valor Id_perfil a 15a interrogação
            $stmt->bindValue(16,$usuarioDTO->getSituacao()); //associa o valor situação a 16a interrogação
            $stmt->bindValue(17,$usuarioDTO->getFoto()); //associa o valor foto a 17a interrogação
            $stmt->bindValue(18,$usuarioDTO->getObs()); //associa o valor foto a 18a interrogação
            $stmt->bindValue(19,$usuarioDTO->getId_usuario()); //associa o valor id_usuario a 19a interrogação

            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            die();
        }
    }//fim do metodo atualizarUsuarioPorID


    public function listarUsuarios() {
        try{
            $sql = "SELECT * FROM usuario u INNER JOIN perfil p ON u.fk_id_perfil = p.id_perfil ORDER BY id_usuario DESC";
   
           $stmt = $this->pdo->prepare($sql);
           $stmt->execute();
   
           $usuarios = array();
           if($stmt->rowCount() > 0){
               while ($usuarioFetch = $stmt->fetch(PDO::FETCH_ASSOC)) {
                   $usuarioDTO = new usuarioDTO();
                   $usuarioDTO->setId_usuario($usuarioFetch['id_usuario']);
                   $usuarioDTO->setFoto($usuarioFetch['foto']);
                   $usuarioDTO->setNome_usu($usuarioFetch['nome_usu']);
                   $usuarioDTO->setDt_nascimento($usuarioFetch['dt_nascimento']);
                   $usuarioDTO->setSexo($usuarioFetch['sexo']);
                   $usuarioDTO->setEmail($usuarioFetch['email']);
                   $usuarioDTO->setTelefone($usuarioFetch['telefone']);
                   $usuarioDTO->setEndereco($usuarioFetch['endereco']);
                   $usuarioDTO->setComplemento($usuarioFetch['complemento']);
                   $usuarioDTO->setNumero($usuarioFetch['numero']);
                   $usuarioDTO->setCpf($usuarioFetch['cpf']);
                   $usuarioDTO->setBairro($usuarioFetch['bairro']);
                   $usuarioDTO->setCidade($usuarioFetch['cidade']);
                   $usuarioDTO->setCep($usuarioFetch['cep']);
                   $usuarioDTO->setUf($usuarioFetch['uf']);
                   $usuarioDTO->setObs($usuarioFetch['obs']);
                   $usuarioDTO->setId_perfil($usuarioFetch['nome_perfil']);
                   $usuarios[] = $usuarioFetch;
                   
               } return $usuarios;
           }else{
               echo '<p>Nenhum usuario adicionado ainda!</p>';
           }
           }catch(PDOException $exc){
           echo $exc->getMessage();
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
