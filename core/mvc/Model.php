<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace core\mvc;

/**
 * Classe que servirá como base a todas as models.
 *
 * @author João Lucas Farias
 */
abstract class Model {

    /**
     * O id do objeto
     * @var int
     */
    protected $id;

    /**
     * Construtor
     * @param type int O valor do id do objeto.
     */
    public function __construct($id = null) {
        $this->id = $id;
    }

    /**
     * Retorna o id do objeto
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Atribui o id do objeto
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * exibe o modelo (abstrato, pois cada herdeiro terá uma implementação diferente)
     */
    public abstract function show();
}
