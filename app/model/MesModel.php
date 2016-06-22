<?php

namespace app\model;

/**
 * Classe modelo para Meses
 *
 * @author João Lucas Farias
 */
final class MesModel extends \core\mvc\Model {

    /**
     * Nome do mês.
     * @var String 
     */
    private $nome;

    /**
     * Valor total do mês.
     * @var Double 
     */
    private $totalGeral;

    /**
     * Valor total pago no mês.
     * @var Double 
     */
    private $totalPago;

    /**
     * Valor total de saldo do mês.
     * @var Double 
     */
    private $totalSaldo;

    /**
     * Grupo que o mês pertence
     * @var app\model\GrupoModel 
     */
    private $grupo;

    /**
     * Método construtor.
     * @param Integer $id id do mês.
     * @param String $nome nome do mês.
     * @param Double $totalGeral total geral do mês.
     * @param Double $totalPago total pago do mês.
     * @param Double $totalSaldo total de saldo do mês.
     * @param app\model\GrupoModel $grupo grupo do mês.
     */
    public function __construct($id = null, $nome = null, $totalGeral = null, $totalPago = null, $totalSaldo = null, app\model\GrupoModel $grupo = null) {
        parent::__construct($id);
        $this->nome = $nome;
        $this->totalGeral = $totalGeral;
        $this->totalPago = $totalPago;
        $this->totalSaldo = $totalSaldo;
        is_null($grupo) ? $this->grupo = new GrupoModel() : $this->grupo = $grupo;
    }

    public function show() {
        
    }

    /**
     * Retorna o nome do mês.
     * @return String
     */
    function getNome() {
        return $this->nome;
    }

    /**
     * Retorna o total geral do mês.
     * @return Double
     */
    function getTotalGeral() {
        return $this->totalGeral;
    }

    /**
     * Retorna o total pago do mês.
     * @return Double
     */
    function getTotalPago() {
        return $this->totalPago;
    }

    /**
     * Retorna o total de saldo do mês.
     * @return Double
     */
    function getTotalSaldo() {
        return $this->totalSaldo;
    }

    /**
     * Retorna o grupo do mês
     * @return app\model\GrupoModel
     */
    function getGrupo() {
        return $this->grupo;
    }

    /**
     * Modifica o nome do mês.
     * @param String $nome
     */
    function setNome(type $nome) {
        $this->nome = $nome;
    }

    /**
     * Modifica o total geral do mês.
     * @param Double $totalGeral
     */
    function setTotalGeral(type $totalGeral) {
        $this->totalGeral = $totalGeral;
    }

    /**
     * Modifica o total pago do mês.
     * @param Double $totalPago
     */
    function setTotalPago(type $totalPago) {
        $this->totalPago = $totalPago;
    }

    /**
     * Modifica o total de saldo do mês.
     * @param Double $totalSaldo
     */
    function setTotalSaldo(type $totalSaldo) {
        $this->totalSaldo = $totalSaldo;
    }

    /**
     * Modifica o grupo do mês
     * @param \app\model\GrupoModel $grupo
     */
    function setGrupo(app\model\GrupoModel $grupo) {
        $this->grupo = $grupo;
    }

}
