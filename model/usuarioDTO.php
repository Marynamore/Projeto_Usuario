<?php 

class UsuarioDTO{
    private $id_usuario;
    private $nome;
    private $cpf_cnpj;
    private $endereco;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $uf;
    private $cep;
    private $loginEmail;
    private $senha;
    private $perfil;
    private $situacao;

    //construtor
    public function __construct($nome, $loginEmail,$senha){
        $this->nome = $nome;
        $this->loginEmail = $loginEmail;
        $this->senha = $senha;
    }

    /**
     * Pegar o valor de id_usuario
     */ 

    public function getId_usuario(){
        return $this->id_usuario;
    }

    /**
     * Defina o valor de id_usuario
     *
     * @return  self
     */ 
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    /**
     * Pegar o valor de nome
     */ 
    public function getNome(){
        return $this->nome;
    }

    /**
     * Defina o valor de nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = ucwords(trim($nome));

        return $this;
    }

    /**
     * Pegar o valor de cpf_cnpj
     */ 

    public function getCpf_cnpj(){
        return $this->cpf_cnpj;
    }

    /**
     * Defina o valor de cpf_cnpj
     *
     * @return  self
     */ 
    public function setCpf_cnpj($cpf_cnpj)
    {
        $this->cpf_cnpj = $cpf_cnpj;

        return $this;
    }

    /**
     * Pegar o valor de endereco
     */ 

    public function getEndereco(){
        return $this->endereco;
    }

    /**
     * Defina o valor de endereco
     *
     * @return  self
     */ 
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Pegar o valor de numero
     */ 

    public function getNumero(){
        return $this->numero;
    }

    /**
     * Defina o valor de numero
     *
     * @return  self
     */ 
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Pegar o valor de complemento
     */ 

    public function getComplemento(){
        return $this->complemento;
    }

    /**
     * Defina o valor de complemento
     *
     * @return  self
     */ 
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Pegar o valor de bairro
     */ 

    public function getBairro(){
        return $this->bairro;
    }

    /**
     * Defina o valor de bairro
     *
     * @return  self
     */ 
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Pegar o valor de cidade
     */ 

    public function getCidade(){
        return $this->cidade;
    }

    /**
     * Defina o valor de cidade
     *
     * @return  self
     */ 
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Pegar o valor de uf
     */ 

    public function getUf(){
        return $this->uf;
    }

    /**
     * Defina o valor de uf
     *
     * @return  self
     */ 
    public function setUf($uf)
    {
        $this->uf = $uf;

        return $this;
    }

    /**
     * Pegar o valor de cep
     */ 

    public function getCep(){
        return $this->cep;
    }

    /**
     * Defina o valor de cep
     *
     * @return  self
     */ 
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Pegar o valor de loginEmail
     */ 
    public function getLoginEmail()
    {
        return $this->loginEmail;
    }

    /**
     * Defina o valor de loginEmail
     *
     * @return  self
     */ 
    public function setLoginEmail($loginEmail)
    {
        $this->loginEmail = strtolower(trim($loginEmail));

        return $this;
    }

    /**
     * Pegar o valor de senha
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Defina o valor de senha
     *
     * @return  self
     */ 
    public function setSenha($senha)
    {
        $this->senha = strtolower(trim($senha));

        return $this;
    }

    /**
     * Pegar o valor de perfil
     */ 
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * Defina o valor de perfil
     *
     * @return  self
     */ 
    public function setPerfil($perfil)
    {
        $this->perfil = trim($perfil);

        return $this;
    }

    /**
     * Pegar o valor de situacao
     */ 

    public function getSituacao(){
        return $this->situacao;
    }

    /**
     * Defina o valor de situacao
     *
     * @return  self
     */ 
    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;

        return $this;
    }

}