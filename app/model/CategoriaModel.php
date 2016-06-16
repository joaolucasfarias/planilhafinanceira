<?php

namespace app\model;

/**
 * Classe modelo para categorias
 *
 * @author João Lucas Farias
 */
final class CategoriaModel extends \core\mvc\Model {

    /**
     * Nome da categoria.
     * @var String 
     */
    private $nome;

    /**
     * Operação da categoria C para crédito (adição) e D para débito (subtração).
     * @var char 
     */
    private $operacao;

    /**
     * Valor total da categoria. É a soma de todos os seus itens.
     * @var Double 
     */
    private $total;

    /**
     * Método construtor.
     * @param Integer $id id da categoria.
     * @param String $nome Nome da categoria.
     * @param char $operacao Operação da categoria.
     * @param Double $total Valor total da categoria.
     */
    public function __construct($id = null, $nome = null, $operacao = null, $total = null) {
        parent::__construct($id);
        $this->nome = $nome;
        $this->operacao = $operacao;
        $this->total = $total;
    }

    public function show() {
        
    }

    /**
     * Retorna o nome da categoria.
     * @return String
     */
    function getNome() {
        return $this->nome;
    }

    /**
     * Retorna a operação da categoria.
     * @return char
     */
    function getOperacao() {
        return $this->operacao;
    }

    /**
     * Retorna o total da categoria.
     * @return Double
     */
    function getTotal() {
        return $this->total;
    }

    /**
     * Modifica o nome da categoria.
     * @param String $nome nome a ser modificado.
     */
    function setNome($nome) {
        $this->nome = $nome;
    }

    /**
     * Modifica a operação da categoria.
     * @param char $operacao operação a ser modificada.
     */
    function setOperacao($operacao) {
        $this->operacao = $operacao;
    }

    /**
     * Modifica o valor total da categoria.
     * @param Double $total valor total da categoria.
     */
    function setTotal($total) {
        $this->total = $total;
    }

}
