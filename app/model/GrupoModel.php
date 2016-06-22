<?php

namespace app\model;

/**
 * Classe modelo para grupos
 *
 * @author João Lucas Farias
 */
final class GrupoModel extends \core\mvc\Model {

    /**
     * Nome do grupo
     * @var String 
     */
    private $nome;

    /**
     * Método construtor
     * @param Integer $id id do grupo
     * @param String $nome nome do grupo
     */
    public function __construct($id = null, $nome = null) {
        parent::__construct($id);
        $this->nome = $nome;
    }

    public function show() {
        
    }

    /**
     * Retorna o nome do grupo.
     * @return String
     */
    function getNome() {
        return $this->nome;
    }

    /**
     * Modifica o nome do grupo.
     * @param String $nome
     */
    function setNome(type $nome) {
        $this->nome = $nome;
    }

}
