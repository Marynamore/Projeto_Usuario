<?php 

class UsuarioDTO{
    private $id_usuario;
    private $nome_usu;
    private $email;
    private $senha;
    private $cpf;
    private $telefone;
    private $sexo;
    private $dt_nascimento;
    private $endereco;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $uf;
    private $cep;
    private $situacao;
    private $foto;
    private $obs;
    private $id_perfil;

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
     * Pegar o valor de nome_usu
     */ 
    public function getNome_usu(){
        return $this->nome_usu;
    }

    /**
     * Defina o valor de nome_usu
     *
     * @return  self
     */ 
    public function setNome_usu($nome_usu)
    {
        $this->nome_usu = ucwords(trim($nome_usu));

        return $this;
    }

    /**
     * Pegar o valor de email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Defina o valor de email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = strtolower(trim($email));

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
     * Pegar o valor de cpf
     */ 

    public function getCpf(){
        return $this->cpf;
    }

    /**
     * Defina o valor de cpf
     *
     * @return  self
     */     
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Pegar o valor de telefone
     */ 

    public function getTelefone(){
        return $this->telefone;
    }
    /**
     * Defina o valor de telefone
     *
     * @return  self
     */     
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    /**
     * Pegar o valor de sexo
     */ 
    public function getSexo(){
        return $this->sexo;
    }
    /**
     * Defina o valor de telefone
     *
     * @return  self
     */  
    public function setSexo($sexo){
        $this->sexo = $sexo;
    }   

    /**
     * Pegar o valor de dt_nascimento
     */ 
    public function getDt_nascimento(){
        return $this->dt_nascimento;
    }
    /**
     * Defina o valor de dt_nascimento
     *
     * @return  self
     */ 
    public function setDt_nascimento($dt_nascimento){
        $this->dt_nascimento = $dt_nascimento;
    } 

    /**
     * Pegar o valor de foto
     */ 
    public function getFoto(){
        return $this->foto;
    }
    /**
     * Defina o valor de foto
     *
     * @return  self
     */
    public function setFoto($foto){
        $this->foto = $foto;
    }    

    /**
     * Pegar o valor de Observação
     */ 
    public function getObs(){
        return $this->obs;
    }
    /**
     * Defina o valor de Observação
     *
     * @return  self
     */
    public function setObs($obs){
        $this->obs = $obs;
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

    public function getId_perfil(){
        return $this->id_perfil;
    }

    /**
     * Defina o valor de id_perfil
     *
     * @return  self
     */ 
    public function setId_perfil($id_perfil)
    {
        $this->id_perfil = $id_perfil;

        return $this;
    }

}