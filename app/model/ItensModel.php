<?php

namespace app\model;

/**
 * Classe modelo para itens
 *
 * @author João Lucas Farias
 */
final class Itens extends \core\mvc\Model {

    /**
     * Nome do item.
     * @var String
     */
    private $nome;

    /**
     * Valor base para o item.
     * @var Double
     */
    private $valorBase;

    /**
     * Categoria em que se encaixa o item.
     * @var CategoriaModel
     */
    private $categoria;

    /**
     * Método construtor.
     * @param Integer $id id do item
     * @param String $nome nome do item
     * @param Double $valorBase valor base do item
     * @param CategoriaModel $categoria
     */
    public function __construct($id = null, $nome = null, $valorBase = null, CategoriaModel $categoria = null) {
        parent::__construct($id);
        $this->nome = $nome;
        $this->valorBase = $valorBase;
        is_null($categoria) ? $this->categoria = new CategoriaModel() : $this->categoria = $categoria;
    }

    public function show() {
        
    }

    /**
     * Retorna o nome do item.
     * @return String
     */
    function getNome() {
        return $this->nome;
    }

    /**
     * Retorna o valor base do item.
     * @return Double
     */
    function getValorBase() {
        return $this->valorBase;
    }

    /**
     * Retorna a categoria do item.
     * @return CategoriaModel
     */
    function getCategoria() {
        return $this->categoria;
    }

    /**
     * Modifica o nome do item.
     * @param String $nome
     */
    function setNome(String $nome) {
        $this->nome = $nome;
    }

    /**
     * Modifica o valor base do item.
     * @param Double $valorBase
     */
    function setValorBase(Double $valorBase) {
        $this->valorBase = $valorBase;
    }

    /**
     * Modifica a categoria do item.
     * @param CategoriaModel $categoria
     */
    function setCategoria(CategoriaModel $categoria) {
        $this->categoria = $categoria;
    }

}
