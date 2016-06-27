<?php

namespace app\view\categoria;

/**
 * Classe que mostrará a página de categoria.
 *
 * @author João Lucas Farias
 */
class CategoriaView extends \core\mvc\view\HtmlPage {

    public function __construct(\app\model\CategoriaModel $model = null) {
        is_null($model) ? $this->model = new \app\model\CategoriaModel() : $this->model = $model;
    }

    public function show() {
        $this->drawTop();
        require_once 'categoria-view.phtml';
        $this->drawBottom();
    }

}
