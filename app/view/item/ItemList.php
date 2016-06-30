<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\view\item;

/**
 * Description of ItemList
 *
 * @author João
 */
class ItemList extends \core\mvc\view\HtmlPage {

    public function __construct($model = null) {
        $this->model = $model;
    }

    public function show() {
        $this->drawTop();
        require_once 'item-list.phtml';
        $this->drawBottom();
    }

}
