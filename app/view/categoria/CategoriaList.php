<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\view\categoria;

/**
 * Description of CategoriaList
 *
 * @author João Lucas Farias
 */
class CategoriaList extends \core\mvc\view\HtmlPage {

    public function __construct($model = null) {
        $this->model = $model;
    }

    public function show() {
        $this->drawTop();
        require_once 'categoria-list.phtml';
        $this->drawBottom();
    }

}
