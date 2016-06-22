<?php

namespace app\model;

/**
 * Classe modelo para itens de um determinado mês
 *
 * @author João Lucas Farias
 */
final class ItensMesModel extends \core\mvc\Model {

    /**
     * Valor do item no mês.
     * @var Double 
     */
    private $valor;

    /**
     * Valor baixado do item.
     * @var Double 
     */
    private $baixa;

    /**
     * Valor de saldo do item.
     * @var Double 
     */
    private $saldo;

    /**
     * Item do mês.
     * @var \app\model\ItemModel 
     */
    private $item;

    /**
     * Mês que recebe o item.
     * @var \app\model\MesModel 
     */
    private $mes;

    /**
     * Método construtor
     * @param Integer $id id do item
     * @param Double $valor valor do item no mês.
     * @param Double $baixa valor baixado do item.
     * @param Double $saldo valor de saldo do item.
     * @param \app\model\ItemModel $item Item do mês.
     * @param \app\model\MesModel $mes mês do item.
     */
    public function __construct($id = null, $valor = null, $baixa = null, $saldo = null, \app\model\ItemModel $item = null, \app\model\MesModel $mes = null) {
        parent::__construct($id);
        $this->valor = $valor;
        $this->baixa = $baixa;
        $this->saldo = $saldo;
        is_null($item) ? $this->item = new ItemModel() : $this->item = $item;
        is_null($mes) ? $this->mes = new MesModel() : $this->mes = $mes;
    }

    public function show() {
        
    }

    /**
     * Retorna o valor do item no mês.
     * @return Double
     */
    function getValor() {
        return $this->valor;
    }

    /**
     * Retorna o a baixa do item no mês
     * @return Double
     */
    function getBaixa() {
        return $this->baixa;
    }

    /**
     * Retorna o saldo do item no mês
     * @return Double
     */
    function getSaldo() {
        return $this->saldo;
    }

    /**
     * Retorna o item do mês
     * @return \app\model\ItemModel
     */
    function getItem() {
        return $this->item;
    }

    /**
     * Retorna o mês do item
     * @return \app\model\MesModel
     */
    function getMes() {
        return $this->mes;
    }

    /**
     * Modifica o valor do item no mês
     * @param Double $valor
     */
    function setValor(type $valor) {
        $this->valor = $valor;
    }

    /**
     * Modifica a baixa do item no mês
     * @param Double $baixa
     */
    function setBaixa(type $baixa) {
        $this->baixa = $baixa;
    }

    /**
     * Modifica o saldo do item no mês
     * @param Double $saldo
     */
    function setSaldo(type $saldo) {
        $this->saldo = $saldo;
    }

    /**
     * Modifica o item do mês
     * @param \app\model\ItemModel $item
     */
    function setItem(\app\model\ItemModel $item) {
        $this->item = $item;
    }

    /**
     * Modifica o mês do item
     * @param \app\model\MesModel $mes
     */
    function setMes(\app\model\MesModel $mes) {
        $this->mes = $mes;
    }

}
