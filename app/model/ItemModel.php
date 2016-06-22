<?php

namespace app\model;

/**
 * Classe modelo para itens
 *
 * @author João Lucas Farias
 */
final class ItemModel extends \core\mvc\Model {

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
     * Grupo que o item pertence
     * @var app\model\GrupoModel 
     */
    private $grupo;

    /**
     * Método construtor.
     * @param Integer $id id do item
     * @param String $nome nome do item
     * @param Double $valorBase valor base do item
     * @param CategoriaModel $categoria categoria que se encaixa o item
     * @param app\model\GrupoModel $grupo grupo que o item pertence
     */
    public function __construct($id = null, $nome = null, $valorBase = null, CategoriaModel $categoria = null, app\model\GrupoModel $grupo = null) {
        parent::__construct($id);
        $this->nome = $nome;
        $this->valorBase = $valorBase;
        is_null($categoria) ? $this->categoria = new CategoriaModel() : $this->categoria = $categoria;
        is_null($grupo) ? $this->grupo = new GrupoModel() : $this->grupo = $grupo;
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
     * Retorna o grupo do item
     * @return app\model\GrupoModel
     */
    function getGrupo() {
        return $this->grupo;
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

    /**
     * Modifica o grupo do item
     * @param \app\model\GrupoModel $grupo
     */
    function setGrupo(app\model\GrupoModel $grupo) {
        $this->grupo = $grupo;
    }

}
