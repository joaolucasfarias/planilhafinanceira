<?php

namespace app\model;

/**
 * Classe modelo para usuários
 *
 * @author João Lucas Farias
 */
final class UsuarioModel extends \core\mvc\Model {

    /**
     * Nome do usuário
     * @var String 
     */
    private $nome;

    /**
     * Login do usuário
     * @var String 
     */
    private $login;

    /**
     * Senha do usuário
     * @var String 
     */
    private $senha;

    /**
     * Tipo do usuário. Define o acesso dele.
     * @var char 
     */
    private $tipo;

    /**
     * Método construtor.
     * @param Integer $id id do usuário
     * @param String $login login do usuário
     * @param String $senha senha do usuário
     * @param char $tipo tipo do usuário
     */
    public function __construct($id = null, $login = null, $senha = null, $tipo = null) {
        parent::__construct($id);
        $this->login = $login;
        $this->senha = $senha;
        $this->tipo = $tipo;
    }

    public function show() {
        
    }

    /**
     * Retorna o nome do usuário.
     * @return String
     */
    function getNome() {
        return $this->nome;
    }

    /**
     * Retorna o login do usuário.
     * @return String
     */
    function getLogin() {
        return $this->login;
    }

    /**
     * Retorna a senha do usuário.
     * @return String
     */
    function getSenha() {
        return $this->senha;
    }

    /**
     * Retorna o tipo do usuário.
     * @return char
     */
    function getTipo() {
        return $this->tipo;
    }

    /**
     * Modifica o nome do usuário.
     * @param String $nome
     */
    function setNome(type $nome) {
        $this->nome = $nome;
    }

    /**
     * Modifica o login do usuário.
     * @param String $login
     */
    function setLogin(type $login) {
        $this->login = $login;
    }

    /**
     * Modifica a senha do usuário.
     * @param String $senha
     */
    function setSenha(type $senha) {
        $this->senha = $senha;
    }

    /**
     * Modifica o tipo do usuário.
     * @param char $tipo
     */
    function setTipo(type $tipo) {
        $this->tipo = $tipo;
    }

}
